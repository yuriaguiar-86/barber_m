<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * TypesOfPayments Controller
 *
 * @property \App\Model\Table\TypesOfPaymentsTable $TypesOfPayments
 *
 * @method \App\Model\Entity\TypesOfPayment[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class TypesOfPaymentsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $typesOfPayments = $this->paginate($this->TypesOfPayments);

        $this->set(compact('typesOfPayments'));
    }

    /**
     * View method
     *
     * @param string|null $id Types Of Payment id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $typesOfPayment = $this->TypesOfPayments->get($id, [
            'contain' => ['Schedules'],
        ]);

        $this->set('typesOfPayment', $typesOfPayment);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $typesOfPayment = $this->TypesOfPayments->newEntity();
        if ($this->request->is('post')) {
            $typesOfPayment = $this->TypesOfPayments->patchEntity($typesOfPayment, $this->request->getData());
            if ($this->TypesOfPayments->save($typesOfPayment)) {
                $this->Flash->success(__('The types of payment has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The types of payment could not be saved. Please, try again.'));
        }
        $this->set(compact('typesOfPayment'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Types Of Payment id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $typesOfPayment = $this->TypesOfPayments->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $typesOfPayment = $this->TypesOfPayments->patchEntity($typesOfPayment, $this->request->getData());
            if ($this->TypesOfPayments->save($typesOfPayment)) {
                $this->Flash->success(__('The types of payment has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The types of payment could not be saved. Please, try again.'));
        }
        $this->set(compact('typesOfPayment'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Types Of Payment id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $typesOfPayment = $this->TypesOfPayments->get($id);
        if ($this->TypesOfPayments->delete($typesOfPayment)) {
            $this->Flash->success(__('The types of payment has been deleted.'));
        } else {
            $this->Flash->error(__('The types of payment could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
