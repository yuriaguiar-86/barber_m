<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * TimesOfDay Controller
 *
 * @property \App\Model\Table\TimesOfDayTable $TimesOfDay
 *
 * @method \App\Model\Entity\TimesOfDay[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class TimesOfDayController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $timesOfDay = $this->paginate($this->TimesOfDay);

        $this->set(compact('timesOfDay'));
    }

    /**
     * View method
     *
     * @param string|null $id Times Of Day id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $timesOfDay = $this->TimesOfDay->get($id, [
            'contain' => [],
        ]);

        $this->set('timesOfDay', $timesOfDay);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $timesOfDay = $this->TimesOfDay->newEntity();
        if ($this->request->is('post')) {
            $timesOfDay = $this->TimesOfDay->patchEntity($timesOfDay, $this->request->getData());
            if ($this->TimesOfDay->save($timesOfDay)) {
                $this->Flash->success(__('The times of day has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The times of day could not be saved. Please, try again.'));
        }
        $this->set(compact('timesOfDay'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Times Of Day id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $timesOfDay = $this->TimesOfDay->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $timesOfDay = $this->TimesOfDay->patchEntity($timesOfDay, $this->request->getData());
            if ($this->TimesOfDay->save($timesOfDay)) {
                $this->Flash->success(__('The times of day has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The times of day could not be saved. Please, try again.'));
        }
        $this->set(compact('timesOfDay'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Times Of Day id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $timesOfDay = $this->TimesOfDay->get($id);
        if ($this->TimesOfDay->delete($timesOfDay)) {
            $this->Flash->success(__('The times of day has been deleted.'));
        } else {
            $this->Flash->error(__('The times of day could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
