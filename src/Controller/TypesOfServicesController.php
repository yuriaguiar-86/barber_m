<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * TypesOfServices Controller
 *
 * @property \App\Model\Table\TypesOfServicesTable $TypesOfServices
 *
 * @method \App\Model\Entity\TypesOfService[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class TypesOfServicesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $typesOfServices = $this->paginate($this->TypesOfServices);

        $this->set(compact('typesOfServices'));
    }

    /**
     * View method
     *
     * @param string|null $id Types Of Service id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $typesOfService = $this->TypesOfServices->get($id, [
            'contain' => ['Schedules'],
        ]);

        $this->set('typesOfService', $typesOfService);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $typesOfService = $this->TypesOfServices->newEntity();
        if ($this->request->is('post')) {
            $typesOfService = $this->TypesOfServices->patchEntity($typesOfService, $this->request->getData());
            if ($this->TypesOfServices->save($typesOfService)) {
                $this->Flash->success(__('The types of service has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The types of service could not be saved. Please, try again.'));
        }
        $schedules = $this->TypesOfServices->Schedules->find('list', ['limit' => 200]);
        $this->set(compact('typesOfService', 'schedules'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Types Of Service id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $typesOfService = $this->TypesOfServices->get($id, [
            'contain' => ['Schedules'],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $typesOfService = $this->TypesOfServices->patchEntity($typesOfService, $this->request->getData());
            if ($this->TypesOfServices->save($typesOfService)) {
                $this->Flash->success(__('The types of service has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The types of service could not be saved. Please, try again.'));
        }
        $schedules = $this->TypesOfServices->Schedules->find('list', ['limit' => 200]);
        $this->set(compact('typesOfService', 'schedules'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Types Of Service id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $typesOfService = $this->TypesOfServices->get($id);
        if ($this->TypesOfServices->delete($typesOfService)) {
            $this->Flash->success(__('The types of service has been deleted.'));
        } else {
            $this->Flash->error(__('The types of service could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
