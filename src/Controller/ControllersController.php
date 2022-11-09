<?php
namespace App\Controller;

use App\Controller\AppController;
use Exception;

/**
 * Controllers Controller
 *
 * @property \App\Model\Table\ControllersTable $Controllers
 *
 * @method \App\Model\Entity\Controller[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ControllersController extends AppController {
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index() {
        try {
            $controllers = $this->paginate($this->Controllers);
            $this->set(compact('controllers'));
        } catch(Exception $exc) {
            $this->Flash->error(__('Entre em contato com o administrador!'));
            return $this->redirect($this->referer());
        }
    }

    /**
     * View method
     *
     * @param string|null $id Controller id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null) {
        try {
            $controller = $this->Controllers->get($id, ['contain' => ['Actions']]);
            $this->set('controller', $controller);
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
            $controller = $this->Controllers->newEntity();

            if ($this->request->is('post')) {
                $controller = $this->Controllers->patchEntity($controller, $this->request->getData());

                if ($this->Controllers->save($controller)) {
                    $this->Flash->success(__('O controller foi cadastrado com sucesso.'));
                    return $this->redirect(['controller' => 'Controllers', 'action' => 'index']);
                }
                $this->Flash->error(__('O controller não foi cadastrado! Por favor, tente novamente.'));
            }
            $this->set(compact('controller'));
        } catch(Exception $exc) {
            $this->Flash->error(__('Entre em contato com o administrador!'));
            return $this->redirect($this->referer());
        }
    }

    /**
     * Edit method
     *
     * @param string|null $id Controller id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null) {
        try {
            $controller = $this->Controllers->get($id);

            if ($this->request->is(['patch', 'post', 'put'])) {
                $controller = $this->Controllers->patchEntity($controller, $this->request->getData());

                if ($this->Controllers->save($controller)) {
                    $this->Flash->success(__('O controller foi editado com sucesso.'));
                    return $this->redirect(['controller' => 'Controllers', 'action' => 'index']);
                }
                $this->Flash->error(__('O controller não foi editado! Por favor, tente novamente.'));
            }
            $this->set(compact('controller'));
        } catch(Exception $exc) {
            $this->Flash->error(__('Entre em contato com o administrador!'));
            return $this->redirect($this->referer());
        }
    }

    /**
     * Delete method
     *
     * @param string|null $id Controller id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null) {
        try {
            $this->request->allowMethod(['post', 'delete']);
            $controller = $this->Controllers->get($id);

            $this->Controllers->delete($controller) ?
            $this->Flash->success(__('O controller foi apagado com sucesso.')) :
            $this->Flash->error(__('O controller não foi apagado! Por favor, tente novamente.'));

            return $this->redirect(['controller' => 'Controllers', 'action' => 'index']);
        } catch(Exception $exc) {
            $this->Flash->error(__('Entre em contato com o administrador!'.$exc));
            return $this->redirect($this->referer());
        }
    }
}
