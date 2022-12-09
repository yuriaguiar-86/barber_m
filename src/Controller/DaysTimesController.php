<?php
namespace App\Controller;

use App\Controller\AppController;
use Exception;

/**
 * DaysTimes Controller
 *
 * @property \App\Model\Table\DaysTimesTable $DaysTimes
 *
 * @method \App\Model\Entity\DaysTime[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class DaysTimesController extends AppController {

    public function initialize() {
        $this->loadModel('Days_Times_Opening_Hours');
        return parent::initialize();
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index() {
        try {
            $daysTimes = $this->paginate($this->DaysTimes);
            $this->set(compact('daysTimes'));
        } catch(Exception $exc) {
            $this->Flash->error(__('Entre em contato com o administrador!'));
            return $this->redirect($this->referer());
        }
    }

    /**
     * View method
     *
     * @param string|null $id Days Time id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null) {
        try {
            $daysTime = $this->DaysTimes->get($id, ['contain' => ['OpeningHours']]);
            $this->set('daysTime', $daysTime);
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
            $daysTime = $this->DaysTimes->newEntity();

            if ($this->request->is('post')) {
                $daysTime = $this->DaysTimes->patchEntity($daysTime, $this->request->getData());

                if ($this->DaysTimes->save($daysTime)) {
                    $this->Flash->success(__('O dia da semana foi cadastrado com sucesso.'));
                    return $this->redirect(['controller' => 'DaysTimes', 'action' => 'index']);
                }
                $this->Flash->error(__('O dia da semana não foi cadastrado! Por favor, tente novamente.'));
            }
        } catch(Exception $exc) {
            $this->Flash->error(__('Entre em contato com o administrador!'));
            return $this->redirect($this->referer());
        } finally {
            $openingHours = $this->DaysTimes->OpeningHours->find('all')->toList();
            $days_in_use = $this->DaysTimes->getDaysCreated();
            $this->set(compact('daysTime', 'openingHours', 'days_in_use'));
        }
    }

    /**
     * Edit method
     *
     * @param string|null $id Days Time id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null) {
        try {
            $daysTime = $this->DaysTimes->get($id, ['contain' => ['OpeningHours']]);

            if ($this->request->is(['patch', 'post', 'put'])) {
                $daysTime = $this->DaysTimes->patchEntity($daysTime, $this->request->getData());

                if ($this->DaysTimes->save($daysTime)) {
                    $this->Flash->success(__('O dia da semana foi editado com sucesso.'));
                    return $this->redirect(['controller' => 'DaysTimes', 'action' => 'index']);
                }
                $this->Flash->error(__('O dia da semana não foi editado! Por favor, tente novamente.'));
            }
        } catch(Exception $exc) {
            $this->Flash->error(__('Entre em contato com o administrador!'));
            return $this->redirect($this->referer());
        } finally {
            $openingHours = $this->DaysTimes->OpeningHours->find('all')->toList();
            $this->set(compact('daysTime', 'openingHours'));
        }
    }

    /**
     * Delete method
     *
     * @param string|null $id Days Time id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null) {
        try {
            $this->request->allowMethod(['post', 'delete']);
            $daysTime = $this->DaysTimes->get($id);

            $this->DaysTimes->delete($daysTime) ?
            $this->Flash->success(__('O dia da semana foi apagado com sucesso.')) :
            $this->Flash->error(__('O dia da semana não foi apagado! Por favor, tente novamente.'));

            return $this->redirect(['controller' => 'DaysTimes', 'action' => 'index']);
        } catch(Exception $exc) {
            $this->Flash->error(__('Entre em contato com o administrador!'));
            return $this->redirect($this->referer());
        }
    }
}
