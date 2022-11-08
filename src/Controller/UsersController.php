<?php
namespace App\Controller;

use Cake\Event\Event;
use App\Controller\AppController;
use App\Controller\TypeRolesENUM;
use Cake\Http\Exception\BadRequestException;
use Exception;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 *
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
{
    public function beforeFilter(Event $event) {
        parent::beforeFilter($event);
        $this->Auth->allow(['register', 'logout', 'login']);
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Roles'],
        ];
        $users = $this->paginate($this->Users);

        $this->set(compact('users'));
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => ['Roles', 'DaysTimes', 'Schedules'],
        ]);

        $this->set('user', $user);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $roles = $this->Users->Roles->find('list', ['limit' => 200]);
        $daysTimes = $this->Users->DaysTimes->find('list', ['limit' => 200]);
        $this->set(compact('user', 'roles', 'daysTimes'));
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => ['DaysTimes'],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $roles = $this->Users->Roles->find('list', ['limit' => 200]);
        $daysTimes = $this->Users->DaysTimes->find('list', ['limit' => 200]);
        $this->set(compact('user', 'roles', 'daysTimes'));
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
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

    public function dashboard() { }

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

    public function editProfile() { }

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

    public function updatePassword() { }
}
