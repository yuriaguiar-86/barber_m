<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * DaysTimes Controller
 *
 * @property \App\Model\Table\DaysTimesTable $DaysTimes
 *
 * @method \App\Model\Entity\DaysTime[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class DaysTimesController extends AppController {
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index() {
        $daysTimes = $this->paginate($this->DaysTimes);
        $this->set(compact('daysTimes'));
    }

    /**
     * View method
     *
     * @param string|null $id Days Time id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null) {
        $daysTime = $this->DaysTimes->get($id, ['contain' => ['OpeningHours']]);
        $this->set('daysTime', $daysTime);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add() {
        $daysTime = $this->DaysTimes->newEntity();

        if ($this->request->is('post')) {
            $daysTime = $this->DaysTimes->patchEntity($daysTime, $this->request->getData());

            if ($this->DaysTimes->save($daysTime)) {
                $this->Flash->success(__('The days time has been saved.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The days time could not be saved. Please, try again.'));
        }
        $openingHours = $this->DaysTimes->OpeningHours->find('all')->toList();
        $this->set(compact('daysTime', 'openingHours'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Days Time id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null) {
        $daysTime = $this->DaysTimes->get($id, ['contain' => ['OpeningHours']]);

        if ($this->request->is(['patch', 'post', 'put'])) {
            $daysTime = $this->DaysTimes->patchEntity($daysTime, $this->request->getData());

            if ($this->DaysTimes->save($daysTime)) {
                $this->Flash->success(__('The days time has been saved.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The days time could not be saved. Please, try again.'));
        }
        $openingHours = $this->DaysTimes->OpeningHours->find('all')->toList();
        $this->set(compact('daysTime', 'openingHours'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Days Time id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null) {
        $this->request->allowMethod(['post', 'delete']);
        $daysTime = $this->DaysTimes->get($id);

        $this->DaysTimes->delete($daysTime) ?
        $this->Flash->success(__('The days time has been deleted.')) :
        $this->Flash->error(__('The days time could not be deleted. Please, try again.'));

        return $this->redirect(['action' => 'index']);
    }
}
