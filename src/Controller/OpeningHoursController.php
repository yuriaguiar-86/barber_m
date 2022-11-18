<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * OpeningHours Controller
 *
 * @property \App\Model\Table\OpeningHoursTable $OpeningHours
 *
 * @method \App\Model\Entity\OpeningHour[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class OpeningHoursController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $openingHours = $this->paginate($this->OpeningHours);

        $this->set(compact('openingHours'));
    }

    /**
     * View method
     *
     * @param string|null $id Opening Hour id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $openingHour = $this->OpeningHours->get($id, [
            'contain' => ['DaysTimes'],
        ]);

        $this->set('openingHour', $openingHour);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $openingHour = $this->OpeningHours->newEntity();
        if ($this->request->is('post')) {
            $openingHour = $this->OpeningHours->patchEntity($openingHour, $this->request->getData());
            if ($this->OpeningHours->save($openingHour)) {
                $this->Flash->success(__('The opening hour has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The opening hour could not be saved. Please, try again.'));
        }
        $daysTimes = $this->OpeningHours->DaysTimes->find('list', ['limit' => 200]);
        $this->set(compact('openingHour', 'daysTimes'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Opening Hour id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $openingHour = $this->OpeningHours->get($id, [
            'contain' => ['DaysTimes'],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $openingHour = $this->OpeningHours->patchEntity($openingHour, $this->request->getData());
            if ($this->OpeningHours->save($openingHour)) {
                $this->Flash->success(__('The opening hour has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The opening hour could not be saved. Please, try again.'));
        }
        $daysTimes = $this->OpeningHours->DaysTimes->find('list', ['limit' => 200]);
        $this->set(compact('openingHour', 'daysTimes'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Opening Hour id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $openingHour = $this->OpeningHours->get($id);
        if ($this->OpeningHours->delete($openingHour)) {
            $this->Flash->success(__('The opening hour has been deleted.'));
        } else {
            $this->Flash->error(__('The opening hour could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
