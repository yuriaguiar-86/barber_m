<?php
namespace App\Controller;

use App\Controller\AppController;
use Exception;

/**
 * Actions Controller
 *
 * @property \App\Model\Table\ActionsTable $Actions
 *
 * @method \App\Model\Entity\Action[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ActionsController extends AppController {
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index() {
        try {
            $this->paginate = ['contain' => ['Controllers']];
            $actions = $this->paginate($this->Actions);
            $this->set(compact('actions'));
        } catch(Exception $exc) {
            $this->Flash->error(__('Entre em contato com o administrador!'));
            return $this->redirect($this->referer());
        }
    }

    /**
     * View method
     *
     * @param string|null $id Action id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null) {
        try {
            $action = $this->Actions->get($id, [
                'contain' => ['Controllers', 'Roles']
            ]);

            $this->set('action', $action);
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
            $action = $this->Actions->newEntity();

            if ($this->request->is('post')) {
                $action = $this->Actions->patchEntity($action, $this->request->getData());

                if ($this->Actions->save($action)) {
                    $this->Flash->success(__('A funcionalidade foi cadastrada com sucesso.'));
                    return $this->redirect(['controller' => 'Actions', 'action' => 'index']);
                }
                $this->Flash->error(__('A funcionalidade não foi cadastrada! Por favor, tente novamente.'));
            }
        } catch(Exception $exc) {
            $this->Flash->error(__('Entre em contato com o administrador!'));
            return $this->redirect($this->referer());
        } finally {
            $controllers = $this->Actions->Controllers->find('list');
            $this->set(compact('action', 'controllers'));
        }
    }

    /**
     * Edit method
     *
     * @param string|null $id Action id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null) {
        try {
            $action = $this->Actions->get($id, ['contain' => ['Roles']]);

            if ($this->request->is(['patch', 'post', 'put'])) {
                $action = $this->Actions->patchEntity($action, $this->request->getData());

                if ($this->Actions->save($action)) {
                    $this->Flash->success(__('A funcionalidade foi editada com sucesso.'));
                    return $this->redirect(['controller' => 'Actions', 'action' => 'index']);
                }
                $this->Flash->error(__('A funcionalidade não foi editada! Por favor, tente novamente.'));
            }
        } catch(Exception $exc) {
            $this->Flash->error(__('Entre em contato com o administrador!'));
            return $this->redirect($this->referer());
        } finally {
            $controllers = $this->Actions->Controllers->find('list');
            $this->set(compact('action', 'controllers'));
        }
    }

    /**
     * Delete method
     *
     * @param string|null $id Action id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null) {
        try {
            $this->request->allowMethod(['post', 'delete']);
            $action = $this->Actions->get($id);

            $this->Actions->delete($action) ?
            $this->Flash->success(__('A funcionalidade foi apagada com sucesso.')) :
            $this->Flash->error(__('A funcionalidade não foi apagada! Por favor, tente novamente.'));

            return $this->redirect(['controller' => 'Actions', 'action' => 'index']);
        } catch(Exception $exc) {
            $this->Flash->error(__('Entre em contato com o administrador!'));
            return $this->redirect($this->referer());
        }
    }
}
