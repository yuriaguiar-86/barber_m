<?php
namespace App\Controller;

use App\Controller\AppController;
use Exception;

/**
 * TypesOfServices Controller
 *
 * @property \App\Model\Table\TypesOfServicesTable $TypesOfServices
 *
 * @method \App\Model\Entity\TypesOfService[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class TypesOfServicesController extends AppController {
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index() {
        try {
            $conditions = $this->setFilterConditions();

            $typesOfServices = $this->paginate($this->TypesOfServices->find('all')->where($conditions));
            $this->set(compact('typesOfServices'));
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
                    'TypesOfServices.name like' => '%' . $this->request->getQuery('filter') . '%',
                    'TypesOfServices.price like' => '%' . $this->request->getQuery('filter') . '%',
                ]
            ];
        }
        return $conditions;
    }

    /**
     * View method
     *
     * @param string|null $id Types Of Service id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null) {
        try {
            $typesOfService = $this->TypesOfServices->get($id);
            $this->set('typesOfService', $typesOfService);
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
            $typesOfService = $this->TypesOfServices->newEntity();

            if ($this->request->is('post')) {
                $typesOfService = $this->TypesOfServices->patchEntity($typesOfService, $this->request->getData());

                if ($this->TypesOfServices->save($typesOfService)) {
                    $this->Flash->success(__('O tipo de serviço foi cadastrado com sucesso.'));
                    return $this->redirect(['controller' => 'TypesOfServices', 'action' => 'index']);
                }
                $this->Flash->error(__('O tipo de serviço não foi cadastrado! Por favor, tente novamente.'));
            }
            $this->set(compact('typesOfService'));
        } catch(Exception $exc) {
            $this->Flash->error(__('Entre em contato com o administrador!'));
            return $this->redirect($this->referer());
        }
    }

    /**
     * Edit method
     *
     * @param string|null $id Types Of Service id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null) {
        try {
            $typesOfService = $this->TypesOfServices->get($id);

            if ($this->request->is(['patch', 'post', 'put'])) {
                $typesOfService = $this->TypesOfServices->patchEntity($typesOfService, $this->request->getData());

                if ($this->TypesOfServices->save($typesOfService)) {
                    $this->Flash->success(__('O tipo de serviço foi editado com sucesso.'));
                    return $this->redirect(['controller' => 'TypesOfServices', 'action' => 'index']);
                }
                $this->Flash->error(__('O tipo de serviço não foi editado! Por favor, tente novamente.'));
            }
            $this->set(compact('typesOfService'));
        } catch(Exception $exc) {
            $this->Flash->error(__('Entre em contato com o administrador!'));
            return $this->redirect($this->referer());
        }
    }

    /**
     * Delete method
     *
     * @param string|null $id Types Of Service id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null) {
        try {
            $this->request->allowMethod(['post', 'delete']);
            $typesOfService = $this->TypesOfServices->get($id);

            $this->TypesOfServices->delete($typesOfService) ?
            $this->Flash->success(__('O tipo de serviço foi apagado com sucesso.')) :
            $this->Flash->error(__('O tipo de serviço não foi apagado! Por favor, tente novamente.'));

            return $this->redirect(['controller' => 'TypesOfServices', 'action' => 'index']);
        } catch(Exception $exc) {
            $this->Flash->error(__('Entre em contato com o administrador!'));
            return $this->redirect($this->referer());
        }
    }
}
