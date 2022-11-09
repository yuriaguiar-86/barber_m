<?php
namespace App\Controller;

use App\Controller\AppController;
use Exception;

/**
 * Roles Controller
 *
 * @property \App\Model\Table\RolesTable $Roles
 *
 * @method \App\Model\Entity\Role[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class RolesController extends AppController {
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
            $role = $this->Roles->get($id, [
                'contain' => ['Actions', 'Users']
            ]);

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

            if ($this->request->is('post')) {
                $role = $this->Roles->patchEntity($role, $this->request->getData());

                if ($this->Roles->save($role)) {
                    $this->Flash->success(__('O tipo de perfil foi cadastrado com sucesso.'));
                    return $this->redirect(['controller' => 'Roles', 'action' => 'index']);
                }
                $this->Flash->error(__('O tipo de perfil não foi cadastrado! Por favor, tente novamente.'));
            }
            $actions = $this->Roles->Actions->find('list', ['limit' => 200]);
            $this->set(compact('role', 'actions'));
        } catch(Exception $exc) {
            $this->Flash->error(__('Entre em contato com o administrador!'));
            return $this->redirect($this->referer());
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
                $role = $this->Roles->patchEntity($role, $this->request->getData());

                if ($this->Roles->save($role)) {
                    $this->Flash->success(__('O tipo de perfil foi editado com sucesso.'));
                    return $this->redirect(['controller' => 'Roles', 'action' => 'index']);
                }
                $this->Flash->error(__('O tipo de perfil não foi editado! Por favor, tente novamente.'));
            }
            $actions = $this->Roles->Actions->find('list', ['limit' => 200]);
            $this->set(compact('role', 'actions'));
        } catch(Exception $exc) {
            $this->Flash->error(__('Entre em contato com o administrador!'));
            return $this->redirect($this->referer());
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
