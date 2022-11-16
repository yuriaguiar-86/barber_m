<?php
namespace App\Controller;

use App\Controller\AppController;
use Exception;

/**
 * TimesOfDay Controller
 *
 * @property \App\Model\Table\TimesOfDayTable $TimesOfDay
 *
 * @method \App\Model\Entity\TimesOfDay[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class TimesOfDayController extends AppController {
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index() {
        try {
            $timesOfDay = $this->paginate($this->TimesOfDay);
            $this->set(compact('timesOfDay'));
        } catch(Exception $exc) {
            $this->Flash->error(__('Entre em contato com o administrador!'));
            return $this->redirect($this->referer());
        }
    }

    /**
     * View method
     *
     * @param string|null $id Times Of Day id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null) {
        try {
            $timesOfDay = $this->TimesOfDay->get($id);
            $this->set('timesOfDay', $timesOfDay);
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
            $timesOfDay = $this->TimesOfDay->newEntity();

            if ($this->request->is('post')) {
                $timesOfDay = $this->TimesOfDay->patchEntity($timesOfDay, $this->request->getData());

                if ($this->TimesOfDay->save($timesOfDay)) {
                    $this->Flash->success(__('O horário foi cadastrado com sucesso.'));
                    return $this->redirect(['controller' => 'TimesOfDay', 'action' => 'index']);
                }
                $this->Flash->error(__('O horário não foi cadastrado! Por favor, tente novamente.'));
            }
            $this->set(compact('timesOfDay'));
        } catch(Exception $exc) {
            $this->Flash->error(__('Entre em contato com o administrador!'));
            return $this->redirect($this->referer());
        }
    }

    /**
     * Edit method
     *
     * @param string|null $id Times Of Day id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null) {
        try {
            $timesOfDay = $this->TimesOfDay->get($id);

            if ($this->request->is(['patch', 'post', 'put'])) {
                $timesOfDay = $this->TimesOfDay->patchEntity($timesOfDay, $this->request->getData());

                if ($this->TimesOfDay->save($timesOfDay)) {
                    $this->Flash->success(__('O horário foi editado com sucesso.'));
                    return $this->redirect(['controller' => 'TimesOfDay', 'action' => 'index']);
                }
                $this->Flash->error(__('O horário não foi editado! Por favor, tente novamente.'));
            }
            $this->set(compact('timesOfDay'));
        } catch(Exception $exc) {
            $this->Flash->error(__('Entre em contato com o administrador!'));
            return $this->redirect($this->referer());
        }
    }

    /**
     * Delete method
     *
     * @param string|null $id Times Of Day id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null) {
        try {
            $this->request->allowMethod(['post', 'delete']);
            $timesOfDay = $this->TimesOfDay->get($id);

            $this->TimesOfDay->delete($timesOfDay) ?
            $this->Flash->success(__('O horário foi apagado com sucesso.')) :
            $this->Flash->error(__('O horário não foi apagado! Por favor, tente novamente.'));

            return $this->redirect(['controller' => 'TimesOfDay', 'action' => 'index']);
        } catch(Exception $exc) {
            $this->Flash->error(__('Entre em contato com o administrador!'));
            return $this->redirect($this->referer());
        }
    }
}
