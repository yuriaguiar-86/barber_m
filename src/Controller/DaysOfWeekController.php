<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * DaysOfWeek Controller
 *
 * @property \App\Model\Table\DaysOfWeekTable $DaysOfWeek
 *
 * @method \App\Model\Entity\DaysOfWeek[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class DaysOfWeekController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $daysOfWeek = $this->paginate($this->DaysOfWeek);

        $this->set(compact('daysOfWeek'));
    }

    /**
     * View method
     *
     * @param string|null $id Days Of Week id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $daysOfWeek = $this->DaysOfWeek->get($id, [
            'contain' => [],
        ]);

        $this->set('daysOfWeek', $daysOfWeek);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $daysOfWeek = $this->DaysOfWeek->newEntity();
        if ($this->request->is('post')) {
            $daysOfWeek = $this->DaysOfWeek->patchEntity($daysOfWeek, $this->request->getData());
            if ($this->DaysOfWeek->save($daysOfWeek)) {
                $this->Flash->success(__('The days of week has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The days of week could not be saved. Please, try again.'));
        }
        $this->set(compact('daysOfWeek'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Days Of Week id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $daysOfWeek = $this->DaysOfWeek->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $daysOfWeek = $this->DaysOfWeek->patchEntity($daysOfWeek, $this->request->getData());
            if ($this->DaysOfWeek->save($daysOfWeek)) {
                $this->Flash->success(__('The days of week has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The days of week could not be saved. Please, try again.'));
        }
        $this->set(compact('daysOfWeek'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Days Of Week id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $daysOfWeek = $this->DaysOfWeek->get($id);
        if ($this->DaysOfWeek->delete($daysOfWeek)) {
            $this->Flash->success(__('The days of week has been deleted.'));
        } else {
            $this->Flash->error(__('The days of week could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
