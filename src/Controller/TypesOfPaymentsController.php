<?php
namespace App\Controller;

use App\Controller\AppController;
use Exception;

/**
 * TypesOfPayments Controller
 *
 * @property \App\Model\Table\TypesOfPaymentsTable $TypesOfPayments
 *
 * @method \App\Model\Entity\TypesOfPayment[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class TypesOfPaymentsController extends AppController {
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index() {
        try {
            $conditions = $this->setFilterConditions();

            $typesOfPayments = $this->paginate($this->TypesOfPayments->find('all')->where($conditions));
            $this->set(compact('typesOfPayments'));
        } catch(Exception $exc) {
            $this->Flash->error(__('Entre em contato com o administrador!'));
            return $this->redirect($this->referer());
        }
    }

    private function setFilterConditions() {
        $conditions = [];

        if (!empty($this->request->getQuery('filter'))) {
            $conditions[] = [
                'OR' => [
                    'TypesOfPayments.name like' => '%' . $this->request->getQuery('filter') . '%',
                ]
            ];
        }
        return $conditions;
    }

    /**
     * View method
     *
     * @param string|null $id Types Of Payment id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null) {
        try {
            $typesOfPayment = $this->TypesOfPayments->get($id);
            $this->set('typesOfPayment', $typesOfPayment);
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
            $typesOfPayment = $this->TypesOfPayments->newEntity();

            if ($this->request->is('post')) {
                $typesOfPayment = $this->TypesOfPayments->patchEntity($typesOfPayment, $this->request->getData());

                if ($this->TypesOfPayments->save($typesOfPayment)) {
                    $this->Flash->success(__('O tipo de pagamento foi cadastrado.'));
                    return $this->redirect(['controller' => 'TypesOfPayments', 'action' => 'index']);
                }
                $this->Flash->error(__('O tipo de pagamento não foi cadastrado! Por favor, tente novamente.'));
            }
            $this->set(compact('typesOfPayment'));
        } catch(Exception $exc) {
            $this->Flash->error(__('Entre em contato com o administrador!'));
            return $this->redirect($this->referer());
        }
    }

    /**
     * Edit method
     *
     * @param string|null $id Types Of Payment id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null) {
        try {
            $typesOfPayment = $this->TypesOfPayments->get($id);

            if ($this->request->is(['patch', 'post', 'put'])) {
                $typesOfPayment = $this->TypesOfPayments->patchEntity($typesOfPayment, $this->request->getData());

                if ($this->TypesOfPayments->save($typesOfPayment)) {
                    $this->Flash->success(__('O tipo de pagamento foi editado.'));
                    return $this->redirect(['controller' => 'TypesOfPayments', 'action' => 'index']);
                }
                $this->Flash->error(__('O tipo de pagamento não foi editado! Por favor, tente novamente.'));
            }
            $this->set(compact('typesOfPayment'));
        } catch(Exception $exc) {
            $this->Flash->error(__('Entre em contato com o administrador!'));
            return $this->redirect($this->referer());
        }
    }

    /**
     * Delete method
     *
     * @param string|null $id Types Of Payment id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null) {
        try {
            $this->request->allowMethod(['post', 'delete']);
            $typesOfPayment = $this->TypesOfPayments->get($id);

            $this->TypesOfPayments->delete($typesOfPayment) ?
            $this->Flash->success(__('O tipo de pagamento foi apagado.')) :
            $this->Flash->error(__('O tipo de pagamento não foi apagado! Por favor, tente novamente.'));

            return $this->redirect(['controller' => 'TypesOfPayments', 'action' => 'index']);
        } catch(Exception $exc) {
            $this->Flash->error(__('Entre em contato com o administrador!'));
            return $this->redirect($this->referer());
        }
    }
}
