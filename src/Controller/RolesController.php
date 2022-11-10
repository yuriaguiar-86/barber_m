<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Http\Exception\BadRequestException;
use Exception;

/**
 * Roles Controller
 *
 * @property \App\Model\Table\RolesTable $Roles
 *
 * @method \App\Model\Entity\Role[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class RolesController extends AppController {

    public function initialize() {
        $this->loadModel('Actions_Roles');
        return parent::initialize();
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index() {
        try {
            $roles = $this->paginate($this->Roles);
            $this->set(compact('roles'));
        } catch(Exception $exc) {
            $this->Flash->error(__('Entre em contato com o administrador!'));
            return $this->redirect($this->referer());
        }
    }

    /**
     * View method
     *
     * @param string|null $id Role id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null) {
        try {
            $role = $this->Roles->get($id, ['contain' => ['Actions']]);
            $this->set('role', $role);
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
            $role = $this->Roles->newEntity();
            $controllers = $this->Roles->Actions->Controllers->find('all', ['contain' => ['Actions']])->toList();

            $this->validateExistActions();

            if ($this->request->is('post')) {
                $role = $this->Roles->patchEntity($role, $this->request->getData(), [
                    'associated' => ['Actions']
                ]);

                $this->isSelectActions();

                if ($this->Roles->save($role, ['associated' => ['Actions']])) {
                    $this->Flash->success(__('O tipo de perfil foi cadastrado com sucesso.'));
                    return $this->redirect(['controller' => 'Roles', 'action' => 'index']);
                }
                $this->Flash->error(__('O tipo de perfil não foi cadastrado! Por favor, tente novamente.'));
            }
        } catch(BadRequestException $exc) {
            $this->Flash->error(__('O tipo de perfil não foi criada! Por favor, revise as informações e tente novamente.'));
            $this->Flash->warning(__($exc->getMessage()));
        } catch(Exception $exc) {
            $this->Flash->error(__('Entre em contato com o administrador!'));
            return $this->redirect($this->referer());
        } finally {
            $this->set(compact('role', 'controllers'));
        }
    }

    private function validateExistActions() {
        $actions = $this->Roles->Actions->find('all', ['contain' => ['Controllers']])->toList();

        if(empty($actions)) {
            $this->Flash->warning(__('Para criar um novo perfil, primeiro é necessário que seja cadastrado a(s) funcionalidade(s)!'));
            return $this->redirect($this->referer());
        }
    }

    private function isSelectActions() {
        if (!isset($this->request->getData()['actions']) || empty($this->request->getData()['actions'])) {
            throw new BadRequestException('Selecione ao menos 01 (uma) funcionalidade a ser associada ao perfil.');
        }
    }

    /**
     * Edit method
     *
     * @param string|null $id Role id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null) {
        try {
            $role = $this->Roles->get($id, ['contain' => ['Actions']]);

            if ($this->request->is(['patch', 'post', 'put'])) {
                $role = $this->Roles->patchEntity($role, $this->request->getData(), [
                    'associated' => ['Actions']
                ]);

                $this->isSelectActions();

                if ($this->Roles->save($role, ['associated' => ['Actions']])) {
                    $this->Flash->success(__('O tipo de perfil foi editado com sucesso.'));
                    return $this->redirect(['controller' => 'Roles', 'action' => 'index']);
                }
                $this->Flash->error(__('O tipo de perfil não foi editado! Por favor, tente novamente.'));
            }
            $this->set(compact('role'));
        } catch(Exception $exc) {
            $this->Flash->error(__('Entre em contato com o administrador!'));
            return $this->redirect($this->referer());
        } finally {
            $actions = $this->Roles->Actions->find('all', ['contain' => ['Controllers']])->toList();
            $controllers = $this->Roles->Actions->Controllers->find('all', ['contain' => ['Actions']])->toList();
            $actions_roles = $this->Actions_Roles->find('list', ['valueField' => 'action_id'])->where(['role_id' => $id])->toList();
            $this->set(compact('actions', 'controllers', 'actions_roles'));
        }
    }

    /**
     * Delete method
     *
     * @param string|null $id Role id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null) {
        try {
            $this->request->allowMethod(['post', 'delete']);
            $role = $this->Roles->get($id);

            $this->Roles->delete($role) ?
            $this->Flash->success(__('O tipo de perfil foi apagado com sucesso.')) :
            $this->Flash->error(__('O tipo de perfil não foi apagado! Por favor, tente novamente.'));

            return $this->redirect(['controller' => 'Roles', 'action' => 'index']);
        } catch(Exception $exc) {
            $this->Flash->error(__('Entre em contato com o administrador!'));
            return $this->redirect($this->referer());
        }
    }
}
