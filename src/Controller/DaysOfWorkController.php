<?php
namespace App\Controller;

use App\Controller\AppController;
use Exception;

/**
 * DaysOfWork Controller
 *
 * @property \App\Model\Table\DaysOfWorkTable $DaysOfWork
 *
 * @method \App\Model\Entity\DaysOfWork[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class DaysOfWorkController extends AppController {
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index() {
        try {
            $daysOfWork = $this->paginate($this->DaysOfWork);
            $this->set(compact('daysOfWork'));
        } catch(Exception $exc) {
            $this->Flash->error(__('Entre em contato com o administrador!'));
            return $this->redirect($this->referer());
        }
    }

    /**
     * View method
     *
     * @param string|null $id Days Of Work id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null) {
        try {
            $daysOfWork = $this->DaysOfWork->get($id, [
                'contain' => ['Schedules']
            ]);

            $this->set('daysOfWork', $daysOfWork);
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
            $daysOfWork = $this->DaysOfWork->newEntity();

            if ($this->request->is('post')) {
                $daysOfWork = $this->DaysOfWork->patchEntity($daysOfWork, $this->request->getData());

                if ($this->DaysOfWork->save($daysOfWork)) {
                    $this->Flash->success(__('O dia de trabalho foi cadastrado com sucesso.'));
                    return $this->redirect(['controller' =>'DaysOfWork', 'action' => 'index']);
                }
                $this->Flash->error(__('O dia de trabalho não foi cadastrado! Por favor, tente novamente.'));
            }
            $this->set(compact('daysOfWork'));
        } catch(Exception $exc) {
            $this->Flash->error(__('Entre em contato com o administrador!'));
            return $this->redirect($this->referer());
        }
    }

    /**
     * Edit method
     *
     * @param string|null $id Days Of Work id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null) {
        try {
            $daysOfWork = $this->DaysOfWork->get($id);

            if ($this->request->is(['patch', 'post', 'put'])) {
                $daysOfWork = $this->DaysOfWork->patchEntity($daysOfWork, $this->request->getData());

                if ($this->DaysOfWork->save($daysOfWork)) {
                    $this->Flash->success(__('O dia de trabalho foi editado com sucesso.'));
                    return $this->redirect(['controller' =>'DaysOfWork', 'action' => 'index']);
                }
                $this->Flash->error(__('O dia de trabalho não foi editado! Por favor, tente novamente.'));
            }
            $this->set(compact('daysOfWork'));
        } catch(Exception $exc) {
            $this->Flash->error(__('Entre em contato com o administrador!'));
            return $this->redirect($this->referer());
        }
    }

    /**
     * Delete method
     *
     * @param string|null $id Days Of Work id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null) {
        try {
            $this->request->allowMethod(['post', 'delete']);
            $daysOfWork = $this->DaysOfWork->get($id);

            $this->DaysOfWork->delete($daysOfWork) ?
            $this->Flash->success(__('O dia de trabalho foi apagado com sucesso.')) :
            $this->Flash->error(__('O dia de trabalho não foi apagado! Por favor, tente novamente.'));

            return $this->redirect(['controller' =>'DaysOfWork', 'action' => 'index']);
        } catch(Exception $exc) {
            $this->Flash->error(__('Entre em contato com o administrador!'));
            return $this->redirect($this->referer());
        }
    }
}
