<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Routing\Router;
use Exception;

/**
 * Schedules Controller
 *
 * @property \App\Model\Table\SchedulesTable $Schedules
 *
 * @method \App\Model\Entity\Schedule[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class SchedulesController extends AppController {
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index() {
        try {
            $this->paginate = ['contain' => ['Users', 'TypesOfPayments', 'TypesOfServices']];
            $schedules = $this->paginate($this->Schedules);
            $this->set(compact('schedules'));
        } catch(Exception $exc) {
            $this->Flash->error(__('Entre em contato com o administrador!'));
            return $this->redirect($this->referer());
        }
    }

    /**
     * View method
     *
     * @param string|null $id Schedule id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null) {
        try {
            $schedule = $this->Schedules->get($id, [
                'contain' => ['Users', 'TypesOfPayments', 'TypesOfServices'],
            ]);

            $this->set('schedule', $schedule);
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
            $schedule = $this->Schedules->newEntity();
            $daysOfWork = $this->Schedules->DaysOfWork->find('all')->toList();

            if ($this->request->is('post')) {
                $schedule = $this->Schedules->patchEntity($schedule, $this->request->getData());

                if ($this->Schedules->save($schedule)) {
                    $this->Flash->success(__('O agendamento foi realizado com sucesso.'));
                    return $this->redirect(['controller' => 'Schedules', 'action' => 'index']);
                }
                $this->Flash->error(__('O agendamento não foi realizado! Por favor, tente novamente.'));
            }
        } catch(Exception $exc) {
            $this->Flash->error(__('Entre em contato com o administrador!'));
            return $this->redirect($this->referer());
        } finally {
            $typesOfPayments = $this->Schedules->TypesOfPayments->find('list');
            $typesOfServices = $this->Schedules->TypesOfServices->find('all')->toList();
            $users = $this->Schedules->Users->find('list')->where(['Users.role_id' => TypeRoleENUM::EMPLOYEE])->toList();
            $this->set(compact('schedule', 'users', 'typesOfPayments', 'typesOfServices'));
        }
    }

    public function getTimesFree() {
        if($this->request->is(['get', 'ajax'])) {
            $times = $this->Schedules->findTimesRegistered($this->request->getQuery('date'), $this->request->getQuery('employee_id'));

            return $this->response
                ->withType('application/json')
                ->withStatus(200)
                ->withStringBody(json_encode($times));
        }
    }

    /**
     * Edit method
     *
     * @param string|null $id Schedule id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null) {
        try {
            $schedule = $this->Schedules->get($id, [
                'contain' => ['TypesOfServices'],
            ]);

            if ($this->request->is(['patch', 'post', 'put'])) {
                $schedule = $this->Schedules->patchEntity($schedule, $this->request->getData());

                if ($this->Schedules->save($schedule)) {
                    $this->Flash->success(__('The schedule has been saved.'));
                    return $this->redirect(['controller' => 'Schedules', 'action' => 'index']);
                }
                $this->Flash->error(__('The schedule could not be saved. Please, try again.'));
            }
            $users = $this->Schedules->Users->find('list', ['limit' => 200]);
            $daysOfWork = $this->Schedules->DaysOfWork->find('list', ['limit' => 200]);
            $typesOfPayments = $this->Schedules->TypesOfPayments->find('list', ['limit' => 200]);
            $typesOfServices = $this->Schedules->TypesOfServices->find('list', ['limit' => 200]);

            $this->set(compact('schedule', 'users', 'daysOfWork', 'typesOfPayments', 'typesOfServices'));
        } catch(Exception $exc) {
            $this->Flash->error(__('Entre em contato com o administrador!'));
            return $this->redirect($this->referer());
        }
    }

    /**
     * Delete method
     *
     * @param string|null $id Schedule id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null) {
        try {
            $this->request->allowMethod(['post', 'delete']);
            $schedule = $this->Schedules->get($id);

            $this->Schedules->delete($schedule) ?
            $this->Flash->success(__('The schedule has been deleted.')) :
            $this->Flash->error(__('The schedule could not be deleted. Please, try again.'));

            return $this->redirect(['controller' => 'Schedules', 'action' => 'index']);
        } catch(Exception $exc) {
            $this->Flash->error(__('Entre em contato com o administrador!'));
            return $this->redirect($this->referer());
        }
    }
}
