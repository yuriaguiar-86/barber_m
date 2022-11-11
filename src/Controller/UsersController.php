<?php
namespace App\Controller;

use Cake\Event\Event;
use App\Controller\AppController;
use Cake\Http\Exception\BadRequestException;
use Exception;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 *
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersController extends AppController {

    public function beforeFilter(Event $event) {
        parent::beforeFilter($event);
        $this->Auth->allow(['register', 'logout', 'login']);
    }

    public function initialize() {
        $this->loadModel('DaysOfWeek');
        $this->loadModel('UsersDaysTimes');
        return parent::initialize();
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index() {
        try {
            $this->paginate = ['contain' => ['Roles']];
            $users = $this->paginate($this->Users);
            $this->set(compact('users'));
        } catch(Exception $exc) {
            $this->Flash->error(__('Entre em contato com o administrador!'));
            return $this->redirect($this->referer());
        }
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null) {
        try {
            $user = $this->Users->get($id, [
                'contain' => ['Roles', 'DaysTimes', 'Schedules'],
            ]);

            $this->set('user', $user);
        } catch(Exception $exc) {
            $this->Flash->error(__('Entre em contato com o administrador!'));
            return $this->redirect($this->referer());
        }
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add() {
        try {
            $user = $this->Users->newEntity();

            if ($this->request->is('post')) {
                $user = $this->Users->patchEntity($user, $this->request->getData(), [
                    'associated' => ['DaysTimes']
                ]);

                if ($this->Users->save($user, ['associated' => ['DaysTimes']])) {
                    $this->Flash->success(__('O usuário foi cadastrado com sucesso.'));
                    return $this->redirect(['controller' => 'Users', 'action' => 'index']);
                }
                $this->Flash->error(__('O usuário não foi cadastrado! Por favor, tente novamente.'));
            }
        } catch(Exception $exc) {
            $this->Flash->error(__('Entre em contato com o administrador!'));
            return $this->redirect($this->referer());
        } finally {
            $roles = $this->Users->Roles->find('list');
            $daysTimes = $this->DaysOfWeek->find('all', ['contain' => ['TimesOfDay']])->toList();
            $this->set(compact('user', 'roles', 'daysTimes'));
        }
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null) {
        try {
            $user = $this->Users->get($id, ['contain' => ['DaysTimes']]);

            if ($this->request->is(['patch', 'post', 'put'])) {
                $user = $this->Users->patchEntity($user, $this->request->getData(), [
                    'associated' => ['DaysTimes']
                ]);

                if ($this->Users->save($user, ['associated' => ['DaysTimes']])) {
                    $this->Flash->success(__('O usuário foi editado com sucesso.'));
                    return $this->redirect(['controller' => 'Users', 'action' => 'index']);
                }
                $this->Flash->error(__('O usuário não foi editado! Por favor, tente novamente.'));
            }
        } catch(Exception $exc) {
            $this->Flash->error(__('Entre em contato com o administrador!'));
            return $this->redirect($this->referer());
        } finally {
            $roles = $this->Users->Roles->find('list');
            $daysTimes = $this->DaysOfWeek->find('all', ['contain' => ['TimesOfDay']])->toList();
            $usersDays = $this->UsersDaysTimes->find('list', ['valueField' => 'days_time_id'])->where(['user_id' => $id])->toList();
            $this->set(compact('user', 'roles', 'daysTimes', 'usersDays'));
        }
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null) {
        try {
            $this->request->allowMethod(['post', 'delete']);
            $user = $this->Users->get($id);

            $this->Users->delete($user) ?
            $this->Flash->success(__('O usuário foi apagado com sucesso.')) :
            $this->Flash->error(__('O usuário não foi apagado! Por favor, tente novamente.'));

            return $this->redirect(['controller' => 'Users', 'action' => 'index']);
        } catch(Exception $exc) {
            $this->Flash->error(__('Entre em contato com o administrador!'));
            return $this->redirect($this->referer());
        }
    }

    public function login() {
        try {
            if ($this->request->is('post')) {
                $user = $this->Auth->identify();

                if ($user) {
                    $this->Auth->setUser($user);
                    return $this->redirect($this->Auth->redirectUrl());
                } else {
                    $this->Flash->error(__('Usuário ou senha incorreta!'));
                }
            }
        } catch(Exception $exc) {
            $this->Flash->error(__('Entre em contato com o administrador!'));
        }
    }

    public function logout() {
        $this->Flash->success(__('Deslogado com sucesso!'));
        return $this->redirect($this->Auth->logout());
    }

    public function register() {
        try {
            $client = $this->Users->newEntity();

            if ($this->request->is('post')) {
                $client = $this->Users->patchEntity($client, $this->request->getData());
                $client->role_id = 2;

                $this->confirmPassword();

                if ($this->Users->save($client)) {
                    $this->Flash->success(__('Conta criada com sucesso!'));
                    return $this->redirect(['controller' => 'Users', 'action' => 'login']);
                }
                $this->Flash->error(__('A conta não foi criada! Por favor, tente novamente.'));
            }
        } catch(BadRequestException $exc) {
            $this->Flash->error(__('A conta não foi criada! Por favor, revise as informações e tente novamente.'));
            $this->Flash->warning(__($exc->getMessage()));
        } catch(Exception $exc) {
            $this->Flash->error(__('Entre em contato com o administrador!'));
        } finally {
            $this->set(compact('client'));
        }
    }

    private function confirmPassword() {
        if($this->request->getData('password') !== $this->request->getData('confirm_password')) {
            throw new BadRequestException('A senha e a confirmação de senha estão diferentes!');
        }
    }

    public function dashboard() {
        try {

        } catch(Exception $exc) {
            $this->Flash->error(__('Entre em contato com o administrador!'));
            return $this->redirect($this->referer());
        }
    }

    public function profile() {
        try {
            $user = $this->Auth->user();
        } catch(Exception $exc) {
            $this->Flash->error(__('Entre em contato com o administrador!'));
            $this->redirect(['controller' => 'Users', 'action' => 'profile']);
        } finally {
            $this->set(compact('user'));
        }
    }

    public function editProfile() {
        try {
            $id = $this->getIdUserLogged();
            $user = $this->Users->get($id);

            if ($this->request->is(['patch', 'post', 'put'])) {
                $user = $this->Users->patchEntity($user, $this->request->getData(), [
                    'associated' => ['DaysTimes']
                ]);

                if ($this->Users->save($user, ['associated' => ['DaysTimes']])) {
                    $this->Flash->success(__('A conta foi editada com sucesso.'));
                    return $this->redirect(['controller' => 'Users', 'action' => 'index']);
                }
                $this->Flash->error(__('A conta não foi editada! Por favor, tente novamente.'));
            }
        } catch(Exception $exc) {
            $this->Flash->error(__('Entre em contato com o administrador!'));
            return $this->redirect($this->referer());
        } finally {
            $daysTimes = $this->DaysOfWeek->find('all', ['contain' => ['TimesOfDay']])->toList();
            $usersDays = $this->UsersDaysTimes->find('list', ['valueField' => 'days_time_id'])->where(['user_id' => $id])->toList();
            $this->set(compact('user', 'daysTimes', 'usersDays'));
        }
    }

    public function home() {
        try {
            $user = $this->Auth->user();
        } catch(Exception $exc) {
            $this->Flash->error(__('Entre em contato com o administrador!'));
            $this->redirect(['controller' => 'Users', 'action' => 'profile']);
        } finally {
            $this->set(compact('user'));
        }
    }

    public function updatePassword() {
        try {

        } catch(Exception $exc) {
            $this->Flash->error(__('Entre em contato com o administrador!'));
            return $this->redirect($this->referer());
        }
    }
}
