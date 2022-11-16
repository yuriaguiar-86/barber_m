<?php
namespace App\Controller;

use App\Controller\AppController;
use Exception;

/**
 * OpeningHours Controller
 *
 * @property \App\Model\Table\OpeningHoursTable $OpeningHours
 *
 * @method \App\Model\Entity\OpeningHour[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class OpeningHoursController extends AppController {
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index() {
        try {
            $this->paginate = ['contain' => ['TimesOfDay']];
            $openingHours = $this->paginate($this->OpeningHours);
            $this->set(compact('openingHours'));
        } catch(Exception $exc) {
            $this->Flash->error(__('Entre em contato com o administrador!'));
            return $this->redirect($this->referer());
        }
    }

    /**
     * View method
     *
     * @param string|null $id Opening Hour id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null) {
        try {
            $openingHour = $this->OpeningHours->get($id, ['contain' => ['TimesOfDay']]);
            $this->set('openingHour', $openingHour);
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
            $openingHour = $this->OpeningHours->newEntity();

            if ($this->request->is('post')) {
                $openingHour = $this->OpeningHours->patchEntity($openingHour, $this->request->getData(), [
                    'associated' => ['TimesOfDay']
                ]);

                if ($this->OpeningHours->save($openingHour, ['associated' => ['TimesOfDay']])) {
                    $this->Flash->success(__('O dia da semana foi cadastrado com sucesso.'));
                    return $this->redirect(['controller' => 'OpeningHours', 'action' => 'index']);
                }
                $this->Flash->error(__('O dia da semana não foi cadastrado! Por favor, tente novamente.'));
            }
            $times = $this->OpeningHours->TimesOfDay->find('all')->toList();
            $this->set(compact('openingHour', 'times'));
        } catch(Exception $exc) {
            $this->Flash->error(__('Entre em contato com o administrador!'));
            return $this->redirect($this->referer());
        }
    }

    /**
     * Edit method
     *
     * @param string|null $id Opening Hour id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null) {
        try {
            $openingHour = $this->OpeningHours->get($id, ['contain' => ['Users']]);

            if ($this->request->is(['patch', 'post', 'put'])) {
                $openingHour = $this->OpeningHours->patchEntity($openingHour, $this->request->getData(), [
                    'associated' => ['TimesOfDay']
                ]);

                if ($this->OpeningHours->save($openingHour, ['associated' => ['TimesOfDay']])) {
                    $this->Flash->success(__('O dia da semana foi editado com sucesso.'));
                    return $this->redirect(['controller' => 'OpeningHours', 'action' => 'index']);
                }
                $this->Flash->error(__('O dia da semana não foi editado! Por favor, tente novamente.'));
            }
            $times = $this->OpeningHours->TimesOfDay->find('all')->toList();
            $this->set(compact('openingHour', 'times'));
        } catch(Exception $exc) {
            $this->Flash->error(__('Entre em contato com o administrador!'));
            return $this->redirect($this->referer());
        }
    }

    /**
     * Delete method
     *
     * @param string|null $id Opening Hour id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null) {
        try {
            $this->request->allowMethod(['post', 'delete']);
            $openingHour = $this->OpeningHours->get($id);

            $this->OpeningHours->delete($openingHour) ?
            $this->Flash->success(__('O dia da semana foi apagado com sucesso.')) :
            $this->Flash->error(__('O dia da semana não foi apagado! Por favor, tente novamente.'));

            return $this->redirect(['controller' => 'OpeningHours', 'action' => 'index']);
        } catch(Exception $exc) {
            $this->Flash->error(__('Entre em contato com o administrador!'));
            return $this->redirect($this->referer());
        }
    }
}
