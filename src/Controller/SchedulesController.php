<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Http\Exception\BadRequestException;
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
            $this->paginate = ['contain' => ['Users', 'TypesOfServices']];
            $conditions = $this->setConditionsSchedules();
            $schedules = $this->paginate($this->Schedules->find('all')->where($conditions));
            $this->set(compact('schedules'));
        } catch(Exception $exc) {
            $this->Flash->error(__('Entre em contato com o administrador!'));
            return $this->redirect($this->referer());
        }
    }

    private function setConditionsSchedules() {
        $conditions[] = [
            'Schedules.finished' => FinishedENUM::PENDING,
            'Schedules.date >=' => date('Y-m-d')
        ];

        $id = $this->getIdUserLogged();
        $user = $this->Schedules->Users->get($id, ['contain' => ['Roles']]);

        if($user->role->type == TypeRoleENUM::EMPLOYEE) {
            $conditions[] = ['Schedules.employee_id' => $user->id];

        } else if($user->role->type == TypeRoleENUM::CLIENT) {
            $conditions[] = ['Schedules.user_id' => $user->id];
        }
        return $conditions;
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
            $schedule = $this->Schedules->get($id, ['contain' => ['Users', 'TypesOfServices']]);
            $user_logged = $this->Schedules->Users->get($this->getIdUserLogged(), ['contain' => ['Roles']]);
            $client = $this->Schedules->Users->get($schedule->user_id);

            $this->set(compact('client', 'schedule', 'user_logged'));
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

            $this->setMessageAboutDayOff($daysOfWork);

            if ($this->request->is('post')) {
                $schedule = $this->Schedules->patchEntity($schedule, $this->request->getData(), [
                    'associated' => ['TypesOfServices']
                ]);

                $schedule->finished = FinishedENUM::PENDING;
                $schedule->date = $this->formatData($this->request->getData('date'));
                $schedule->user_id = $this->getIdUserLogged();

                $this->validateScheduleWithDayFree($schedule, $daysOfWork);

                if ($this->Schedules->save($schedule, ['associated' => ['TypesOfServices']])) {
                    $this->Flash->success(__('O agendamento foi realizado com sucesso.'));
                    return $this->redirect(['controller' => 'Schedules', 'action' => 'index']);
                }
                $this->Flash->error(__('O agendamento não foi realizado! Por favor, tente novamente.'));
            }
        } catch(BadRequestException $exc) {
            $this->Flash->error(__('O agendamento não foi feito! Por favor, revise as informações.'));
            $this->Flash->warning(__($exc->getMessage()));
        } catch(Exception $exc) {
            $this->Flash->error(__('Entre em contato com o administrador!'));
            return $this->redirect($this->referer());
        } finally {
            $typesOfServices = $this->Schedules->TypesOfServices->find('all')->toList();
            $users = $this->Schedules->Users->find('all')->where(['Users.role_id' => TypeRoleENUM::EMPLOYEE])->toList();
            $this->set(compact('schedule', 'users', 'typesOfServices'));
        }
    }

    private function setMessageAboutDayOff($daysOfWork) {
        if(!empty($daysOfWork)) {
            foreach($daysOfWork as $day) {
                if(strtotime($day->not_work) >= strtotime(date('Y-m-d'))) {
                    $text = 'No dia ' .$day->not_work->format('d/m/Y');
                    $text .= '<br>'.$day->description;

                    $this->Flash->warning(__($text), ['escape' => false]);
                }
            }
        }
    }

    private function validateScheduleWithDayFree($schedule, $daysOfWork) {
        foreach($daysOfWork as $day) {
            if(strtotime($schedule->date) == strtotime($day->not_work)) {
                throw new BadRequestException('Este dia o estabelecimento não estará em funcionamento!');
            }
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
            $schedule = $this->Schedules->get($id);
            $daysOfWork = $this->Schedules->DaysOfWork->find('all')->toList();

            $this->setMessageAboutDayOff($daysOfWork);

            if ($this->request->is(['patch', 'post', 'put'])) {
                $schedule = $this->Schedules->patchEntity($schedule, $this->request->getData(), [
                    'associated' => ['TypesOfServices']
                ]);

                $this->validateScheduleWithDayFree($schedule, $daysOfWork);

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
            $typesOfServices = $this->Schedules->TypesOfServices->find('all')->toList();
            $users = $this->Schedules->Users->find('all')->where(['Users.role_id' => TypeRoleENUM::EMPLOYEE])->toList();
            $this->set(compact('schedule', 'users', 'typesOfServices'));
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
            $this->validateDate();

            $employee_id = $this->request->getQuery('employee_id');
            $date_select = $this->formatData($this->request->getQuery('date'));
            $times_busy = $this->Schedules->findTimesRegistered($date_select, $employee_id);
            $day_week = date('w', strtotime($date_select)) + 1;
            $times_free = $this->UsersOpeningHours->findOpeningTimesEmployee($employee_id, $day_week);
            $times = array_diff($times_free, $times_busy);

            return $this->response
                ->withType('application/json')
                ->withStatus(200)
                ->withStringBody(json_encode($times));
        }
    }

    private function validateDate() {
        $data = explode('/', $this->request->getQuery('date'));

        if(checkdate($data[1], $data[0], $data[2])) {
            return $this->response
                ->withType('application/json')
                ->withStatus(400);
        }
    }

    public function finishedSchedule($id = null) {
        try {
            $schedule = $this->Schedules->get($id, ['contain' => ['Users']]);

            if ($this->request->is(['patch', 'post', 'put'])) {
                $schedule = $this->Schedules->patchEntity($schedule, $this->request->getData(), [
                    'associated' => ['TypesOfServices']
                ]);

                $schedule->finished = FinishedENUM::FINISHED;

                if ($this->Schedules->save($schedule, ['associated' => ['TypesOfServices']])) {
                    $this->Flash->success(__('O agendamento foi finalizado com sucesso.'));
                    return $this->redirect(['controller' => 'Schedules', 'action' => 'index']);
                }
                $this->Flash->error(__('O agendamento não foi finalizado! Por favor, tente novamente.'));
            }
        } catch(Exception $exc) {
            $this->Flash->error(__('Entre em contato com o administrador!'));
            return $this->redirect($this->referer());
        } finally {
            $client = $this->Schedules->Users->get($schedule->user_id);
            $typesOfPayments = $this->Schedules->TypesOfPayments->find('list');
            $typesOfServices = $this->Schedules->TypesOfServices->find('all')->toList();
            $this->set(compact('client', 'schedule', 'typesOfPayments', 'typesOfServices'));
        }
    }
}
