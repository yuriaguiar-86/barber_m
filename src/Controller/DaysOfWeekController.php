<?php
namespace App\Controller;

use App\Controller\AppController;
use Exception;

/**
 * DaysOfWeek Controller
 *
 * @property \App\Model\Table\DaysOfWeekTable $DaysOfWeek
 *
 * @method \App\Model\Entity\DaysOfWeek[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class DaysOfWeekController extends AppController {
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index() {
        try {
            $daysOfWeek = $this->paginate($this->DaysOfWeek);
            $this->set(compact('daysOfWeek'));
        } catch(Exception $exc) {
            $this->Flash->error(__('Entre em contato com o administrador!'));
            return $this->redirect($this->referer());
        }
    }

    /**
     * View method
     *
     * @param string|null $id Days Of Week id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null) {
        try {
            $daysOfWeek = $this->DaysOfWeek->get($id);
            $this->set('daysOfWeek', $daysOfWeek);
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
            $daysOfWeek = $this->DaysOfWeek->newEntity();

            if ($this->request->is('post')) {
                $daysOfWeek = $this->DaysOfWeek->patchEntity($daysOfWeek, $this->request->getData());

                if ($this->DaysOfWeek->save($daysOfWeek)) {
                    $this->Flash->success(__('O dia da semana foi cadastrado com sucesso.'));
                    return $this->redirect(['controller' => 'DaysOfWeek', 'action' => 'index']);
                }
                $this->Flash->error(__('O dia da semana não foi cadastrado! Por favor, tente novamente.'));
            }
            $this->set(compact('daysOfWeek'));
        } catch(Exception $exc) {
            $this->Flash->error(__('Entre em contato com o administrador!'));
            return $this->redirect($this->referer());
        }
    }

    /**
     * Edit method
     *
     * @param string|null $id Days Of Week id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null) {
        try {
            $daysOfWeek = $this->DaysOfWeek->get($id);

            if ($this->request->is(['patch', 'post', 'put'])) {
                $daysOfWeek = $this->DaysOfWeek->patchEntity($daysOfWeek, $this->request->getData());

                if ($this->DaysOfWeek->save($daysOfWeek)) {
                    $this->Flash->success(__('O dia da semana foi editado com sucesso.'));
                    return $this->redirect(['controller' => 'DaysOfWeek', 'action' => 'index']);
                }
                $this->Flash->error(__('O dia da semana não foi editado! Por favor, tente novamente.'));
            }
            $this->set(compact('daysOfWeek'));
        } catch(Exception $exc) {
            $this->Flash->error(__('Entre em contato com o administrador!'));
            return $this->redirect($this->referer());
        }
    }

    /**
     * Delete method
     *
     * @param string|null $id Days Of Week id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null) {
        try {
            $this->request->allowMethod(['post', 'delete']);
            $daysOfWeek = $this->DaysOfWeek->get($id);

            $this->DaysOfWeek->delete($daysOfWeek) ?
            $this->Flash->success(__('O dia da semana foi apagado com sucesso.')) :
            $this->Flash->error(__('O dia da semana não foi apagado! Por favor, tente novamente.'));

            return $this->redirect(['controller' => 'DaysOfWeek', 'action' => 'index']);
        } catch(Exception $exc) {
            $this->Flash->error(__('Entre em contato com o administrador!'));
            return $this->redirect($this->referer());
        }
    }
}
