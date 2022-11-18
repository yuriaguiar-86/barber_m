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
    public function initialize() {
        $this->loadModel('UsersOpeningHours');
        return parent::initialize();
    }
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
                $schedule = $this->Schedules->patchEntity($schedule, $this->request->getData(), [
                    'associated' => ['TypesOfServices']
                ]);

                $schedule->date = $this->formatData($this->request->getData('date'));
                $schedule->user_id = $this->getIdUserLogged();

                if ($this->Schedules->save($schedule, ['associated' => ['TypesOfServices']])) {
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
            $users = $this->Schedules->Users->find('all')->where(['Users.role_id' => TypeRoleENUM::EMPLOYEE])->toList();
            $this->set(compact('schedule', 'users', 'typesOfPayments', 'typesOfServices'));
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
            $schedule = $this->Schedules->get($id, ['contain' => ['TypesOfServices']]);

            if ($this->request->is(['patch', 'post', 'put'])) {
                $schedule = $this->Schedules->patchEntity($schedule, $this->request->getData(), [
                    'associated' => ['TypesOfServices']
                ]);

                if ($this->Schedules->save($schedule, ['associated' => ['TypesOfServices']])) {
                    $this->Flash->success(__('O agendamento foi atualizado com sucesso.'));
                    return $this->redirect(['controller' => 'Schedules', 'action' => 'index']);
                }
                $this->Flash->error(__('O agendamento não foi atualizado! Por favor, tente novamente.'));
            }
        } catch(Exception $exc) {
            $this->Flash->error(__('Entre em contato com o administrador!'));
            return $this->redirect($this->referer());
        } finally {
            $typesOfPayments = $this->Schedules->TypesOfPayments->find('list');
            $typesOfServices = $this->Schedules->TypesOfServices->find('all')->toList();
            $users = $this->Schedules->Users->find('all')->where(['Users.role_id' => TypeRoleENUM::EMPLOYEE])->toList();
            $this->set(compact('schedule', 'users', 'typesOfPayments', 'typesOfServices'));
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
            $this->Flash->success(__('O agendamento foi cancelado com sucesso.')) :
            $this->Flash->error(__('O agendamento não foi cancelado! Por favor, tente novamente.'));

            return $this->redirect(['controller' => 'Schedules', 'action' => 'index']);
        } catch(Exception $exc) {
            $this->Flash->error(__('Entre em contato com o administrador!'));
            return $this->redirect($this->referer());
        }
    }

    public function getTimesFree() {
        if($this->request->is(['get', 'ajax'])) {
            $employee_id = $this->request->getQuery('employee_id');
            $date_select = $this->formatData($this->request->getQuery('date'));

            $times_busy = $this->Schedules->findTimesRegistered($date_select, $employee_id);
            $day_week = date('w', strtotime($date_select)) + 1;

            $times_free = $this->UsersOpeningHours->find('list', ['valueField' => 'opening_hours.time_of_week'])
                ->select(['opening_hours.time_of_week'])
                ->innerJoin('opening_hours', 'opening_hours.id = UsersOpeningHours.opening_hour_id')
                ->innerJoin('days_times_opening_hours', 'days_times_opening_hours.opening_hour_id = opening_hours.id')
                ->innerJoin('days_times', 'days_times.id = days_times_opening_hours.days_time_id')
                ->where([
                    'UsersOpeningHours.user_id' => $employee_id,
                    'days_times.day_of_week' => $day_week
                ])->toList();

            $times = array_diff($times_free, $times_busy);

            return $this->response
                ->withType('application/json')
                ->withStatus(200)
                ->withStringBody(json_encode($times));
        }
    }
}
