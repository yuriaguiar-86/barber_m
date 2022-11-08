<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * DaysOfWork Controller
 *
 * @property \App\Model\Table\DaysOfWorkTable $DaysOfWork
 *
 * @method \App\Model\Entity\DaysOfWork[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class DaysOfWorkController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $daysOfWork = $this->paginate($this->DaysOfWork);

        $this->set(compact('daysOfWork'));
    }

    /**
     * View method
     *
     * @param string|null $id Days Of Work id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $daysOfWork = $this->DaysOfWork->get($id, [
            'contain' => ['Schedules'],
        ]);

        $this->set('daysOfWork', $daysOfWork);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $daysOfWork = $this->DaysOfWork->newEntity();
        if ($this->request->is('post')) {
            $daysOfWork = $this->DaysOfWork->patchEntity($daysOfWork, $this->request->getData());
            if ($this->DaysOfWork->save($daysOfWork)) {
                $this->Flash->success(__('The days of work has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The days of work could not be saved. Please, try again.'));
        }
        $this->set(compact('daysOfWork'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Days Of Work id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $daysOfWork = $this->DaysOfWork->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $daysOfWork = $this->DaysOfWork->patchEntity($daysOfWork, $this->request->getData());
            if ($this->DaysOfWork->save($daysOfWork)) {
                $this->Flash->success(__('The days of work has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The days of work could not be saved. Please, try again.'));
        }
        $this->set(compact('daysOfWork'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Days Of Work id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $daysOfWork = $this->DaysOfWork->get($id);
        if ($this->DaysOfWork->delete($daysOfWork)) {
            $this->Flash->success(__('The days of work has been deleted.'));
        } else {
            $this->Flash->error(__('The days of work could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
