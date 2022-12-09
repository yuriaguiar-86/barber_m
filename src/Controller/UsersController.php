<?php

namespace App\Controller;

use Cake\Event\Event;
use Cake\Mailer\Email;
use Cake\Routing\Router;
use Cake\Utility\Security;
use App\Controller\AppController;
use Cake\Mailer\MailerAwareTrait;
use Cake\Http\Exception\BadRequestException;
use Cake\ORM\TableRegistry;
use Exception;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 *
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersController extends AppController {

    public function beforeFilter(Event $event) {
        parent::beforeFilter($event);
        $this->Auth->allow(['register', 'logout', 'login', 'recoverPassword', 'alterPassword']);
    }

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
            $conditions = $this->setFilterConditions();

            $this->paginate = ['contain' => ['Roles']];
            $users = $this->paginate($this->Users->find('all')->where($conditions));
            $this->set(compact('users'));
        } catch (Exception $exc) {
            $this->Flash->error(__('Entre em contato com o administrador!'));
            return $this->redirect($this->referer());
        }
    }

    private function setFilterConditions() {
        $conditions = [];

        if (!empty($this->request->getQuery('filter'))) {
            $conditions[] = [
                'OR' => [
                    'users.username like' => '%' . $this->request->getQuery('filter') . '%',
                    'users.name like' => '%' . $this->request->getQuery('filter') . '%',
                    'users.email like' => '%' . $this->request->getQuery('filter') . '%',
                    'users.personal_phone like' => '%' . $this->request->getQuery('filter') . '%',
                    'users.other_phone like' => '%' . $this->request->getQuery('filter') . '%',
                ]
            ];
        }
        return $conditions;
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null) {
        try {
            $user = $this->Users->get($id, [
                'contain' => ['Roles', 'Schedules' => ['Users', 'TypesOfPayments']],
            ]);

            $this->set('user', $user);
        } catch (Exception $exc) {
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
            $user = $this->Users->newEntity();

            if ($this->request->is('post')) {
                $user = $this->Users->patchEntity($user, $this->request->getData(), [
                    'associated' => ['OpeningHours']
                ]);

                if ($this->Users->save($user, ['associated' => ['OpeningHours']])) {
                    $this->Flash->success(__('O usuário foi cadastrado com sucesso.'));
                    return $this->redirect(['controller' => 'Users', 'action' => 'index']);
                }
                $this->Flash->error(__('O usuário não foi cadastrado! Por favor, tente novamente.'));
            }
        } catch (Exception $exc) {
            $this->Flash->error(__('Entre em contato com o administrador!'));
            return $this->redirect($this->referer());
        } finally {
            $roles = $this->Users->Roles->find('list');
            $daysTimes = $this->Users->OpeningHours->find('all', ['contain' => ['DaysTimes']])->toList();
            $this->set(compact('user', 'roles', 'daysTimes'));
        }
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null) {
        try {
            $user = $this->Users->get($id, ['contain' => ['OpeningHours']]);

            if ($this->request->is(['patch', 'post', 'put'])) {
                $user = $this->Users->patchEntity($user, $this->request->getData(), [
                    'associated' => ['OpeningHours']
                ]);

                if ($this->Users->save($user, ['associated' => ['OpeningHours']])) {
                    $this->Flash->success(__('O usuário foi editado com sucesso.'));
                    return $this->redirect(['controller' => 'Users', 'action' => 'index']);
                }
                $this->Flash->error(__('O usuário não foi editado! Por favor, tente novamente.'));
            }
        } catch (Exception $exc) {
            $this->Flash->error(__('Entre em contato com o administrador!'));
            return $this->redirect($this->referer());
        } finally {
            $roles = $this->Users->Roles->find('list');
            $daysTimes = $this->Users->OpeningHours->find('all', ['contain' => ['DaysTimes']])->toList();
            $usersDays = $this->UsersOpeningHours->find('list', ['valueField' => 'opening_hour_id'])->where(['user_id' => $id])->toList();
            $this->set(compact('user', 'roles', 'daysTimes', 'usersDays'));
        }
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null) {
        try {
            $this->request->allowMethod(['post', 'delete']);
            $user = $this->Users->get($id);

            $this->Users->delete($user) ?
                $this->Flash->success(__('O usuário foi apagado com sucesso.')) :
                $this->Flash->error(__('O usuário não foi apagado! Por favor, tente novamente.'));

            return $this->redirect(['controller' => 'Users', 'action' => 'index']);
        } catch (Exception $exc) {
            $this->Flash->error(__('Entre em contato com o administrador!'));
            return $this->redirect($this->referer());
        }
    }

    public function login() {
        try {
            if ($this->request->is('post')) {
                $user = $this->Auth->identify();

                if ($user) {
                    $this->Auth->setUser($user);
                    return $this->redirect($this->Auth->redirectUrl());
                } else {
                    $this->Flash->error(__('Usuário ou senha incorreta!'));
                }
            }
        } catch (Exception $exc) {
            $this->Flash->error(__('Entre em contato com o administrador!'));
        }
    }

    public function logout() {
        $this->Flash->success(__('Deslogado com sucesso!'));
        return $this->redirect($this->Auth->logout());
    }

    public function register() {
        try {
            $client = $this->Users->newEntity();

            if ($this->request->is('post')) {
                $client = $this->Users->patchEntity($client, $this->request->getData());
                $client->role_id = TypeRoleENUM::CLIENT;

                $this->confirmPassword();
                $this->confirmTermsAccept();

                if ($this->Users->save($client)) {
                    $this->Flash->success(__('Conta criada com sucesso!'));
                    return $this->redirect(['controller' => 'Users', 'action' => 'login']);
                }
                $this->Flash->error(__('A conta não foi criada! Por favor, tente novamente.'));
            }
        } catch (BadRequestException $exc) {
            $this->Flash->error(__('A conta não foi criada! Por favor, revise as informações e tente novamente.'));
            $this->Flash->warning(__($exc->getMessage()));
        } catch (Exception $exc) {
            $this->Flash->error(__('Entre em contato com o administrador!'));
        } finally {
            $this->set(compact('client'));
        }
    }

    private function confirmPassword() {
        if ($this->request->getData('password') !== $this->request->getData('confirm_password')) {
            throw new BadRequestException('A senha e a confirmação de senha estão diferentes!');
        }
    }

    private function confirmTermsAccept() {
        if($this->request->getData('terms') != TermsENUM::CHECKED) {
            throw new BadRequestException('Aceite os termos para criar uma conta!');
        }
    }

    public function dashboard() {
        try {
            $conditions = $this->setConditionsDashboard();
            $payments = $this->Users->Schedules->TypesOfPayments->sumPaymentsRealize($conditions);
            $summation = $this->allValuesPayments($payments);
            $this->set(compact('payments', 'summation'));
        } catch (Exception $exc) {
            $this->Flash->error(__('Entre em contato com o administrador!'));
            return $this->redirect($this->referer());
        }
    }

    private function setConditionsDashboard() {
        $conditions = [];

        if (!empty($this->request->getQuery('date_init'))) {
            $conditions[] = ['schedules.date >= ' => $this->formatData($this->request->getQuery('date_init'))];
        }
        if (!empty($this->request->getQuery('date_final'))) {
            $conditions[] = ['schedules.date <= ' => $this->formatData($this->request->getQuery('date_final'))];
        }
        return $conditions;
    }

    private function allValuesPayments($payments, $value = 0) {
        foreach($payments as $payment) {
            $value += $payment->sum;
        }
        return $value;
    }

    public function profile() {
        try {
            $id = $this->getIdUserLogged();
            $user = $this->Users->get($id);
        } catch (Exception $exc) {
            $this->Flash->error(__('Entre em contato com o administrador!'));
            $this->redirect(['controller' => 'Users', 'action' => 'profile']);
        } finally {
            $this->set(compact('user'));
        }
    }

    public function editProfile() {
        try {
            $id = $this->getIdUserLogged();
            $user = $this->Users->get($id, ['contain' => ['Roles']]);

            if ($this->request->is(['patch', 'post', 'put'])) {
                $user = $this->Users->patchEntity($user, $this->request->getData(), [
                    'associated' => ['OpeningHours']
                ]);

                if ($this->Users->save($user, ['associated' => ['OpeningHours']])) {
                    $this->Flash->success(__('A conta foi editada com sucesso.'));
                    return $this->redirect(['controller' => 'Users', 'action' => 'profile']);
                }
                $this->Flash->error(__('A conta não foi editada! Por favor, tente novamente.'));
            }
        } catch (Exception $exc) {
            $this->Flash->error(__('Entre em contato com o administrador!'));
            return $this->redirect($this->referer());
        } finally {
            $daysTimes = $this->Users->OpeningHours->find('all', ['contain' => ['DaysTimes']])->toList();
            $usersDays = $this->UsersOpeningHours->find('list', ['valueField' => 'opening_hour_id'])->where(['user_id' => $id])->toList();
            $this->set(compact('user', 'daysTimes', 'usersDays'));
        }
    }

    public function home() {
        try {
            $user = $this->Auth->user();
            $employees = $this->Users->find('all')->where(['Users.role_id' => TypeRoleENUM::EMPLOYEE])->toList();
        } catch (Exception $exc) {
            $this->Flash->error(__('Entre em contato com o administrador!'));
            $this->redirect(['controller' => 'Users', 'action' => 'profile']);
        } finally {
            $this->set(compact('user', 'employees'));
        }
    }

    public function updatePassword() {
        try {
            $id = $this->getIdUserLogged();
            $user = $this->Users->get($id);

            if ($this->request->is(['patch', 'post', 'put'])) {
                $user = $this->Users->patchEntity($user, $this->request->getData());
                $this->confirmPassword();

                if ($this->Users->save($user)) {
                    $this->Flash->success(__('A senha foi trocada com sucesso.'));
                    return $this->redirect(['controller' => 'Users', 'action' => 'profile']);
                }
                $this->Flash->error(__('A senha não foi trocada! Por favor, tente novamente.'));
            }
        } catch (BadRequestException $exc) {
            $this->Flash->error(__('A atualização de senha não foi efetuada! Por favor, revise as informações e tente novamente.'));
            $this->Flash->warning(__($exc->getMessage()));
        } catch (Exception $exc) {
            $this->Flash->error(__('Entre em contato com o administrador!'));
            return $this->redirect($this->referer());
        } finally {
            $this->set(compact('user'));
        }
    }

    use MailerAwareTrait;
    public function recoverPassword() {
        try {
            $user = $this->Users->newEntity();

            if ($this->request->is('post')) {
                $email = $this->request->getData('email');
                $forget = $this->Users->getForgetPassword($email);
                $this->validateEmailEnter($forget);

                if (empty($forget->reset_password)) {
                    $user->id = $forget->id;
                    $user->reset_password = $this->hashTokenForSend($forget);

                    $this->Users->save($user);
                    $forget->reset_password = $user->reset_password;
                }
                $forget->host_name = $this->getHostNameUsed();
                $this->getMailer('RecoverPassword')->send('rescuePassword', [$forget]);

                $this->Flash->success(__('E-mail enviado com sucesso, verifique sua caixa de entrada!'));
                return $this->redirect(['controller' => 'Users', 'action' => 'login']);
            }
        } catch (BadRequestException $exc) {
            $this->Flash->error(__('O e-mail para a troca de senha não foi enviado! Por favor, revise as informações e tente novamente.'));
            $this->Flash->warning(__($exc->getMessage()));
        } catch (Exception $exc) {
            $this->Flash->error(__('Entre em contato com o administrador!'));
            return $this->redirect($this->referer());
        } finally {
            $this->set(compact('user'));
        }
    }

    private function validateEmailEnter($user_mail) {
        if (empty($user_mail)) {
            throw new BadRequestException('Este e-mail ainda não foi cadastrado!');
        }
    }

    private function hashTokenForSend($user) {
        return Security::hash(
            $user->email . $user->id . date('Y-m-d H:i:s'),
            'sha256',
            false
        );
    }

    private function getHostNameUsed() {
        return Router::fullBaseUrl() . $this->request->getAttribute('webroot') . $this->request->getParam('prefix');
    }

    public function alterPassword($token = null) {
        try {
            $user = $this->Users->getUpdatePassword($token);
            $this->validateToken($user);

            if ($this->request->is(['patch', 'post', 'put'])) {
                $user = $this->Users->patchEntity($user, $this->request->getData());
                $this->confirmPassword();
                $user->reset_password = null;

                if ($this->Users->save($user)) {
                    $this->Flash->success(__('A senha foi alterada com sucesso!'));
                    return $this->redirect(['controller' => 'Users', 'action' => 'login']);
                }
                $this->Flash->error(__('A senha não foi alterada! Por favor, tente novamente.'));
            }
        } catch (BadRequestException $exc) {
            $this->Flash->error(__('Por favor, revise as informações e tente novamente.'));
            $this->Flash->warning(__($exc->getMessage()));
            return $this->redirect(['controller' => 'Users', 'action' => 'login']);
        } catch (Exception $exc) {
            $this->Flash->error(__('Entre em contato com o administrador!'));
            return $this->redirect($this->referer());
        } finally {
            $this->set(compact('user'));
        }
    }

    private function validateToken($current) {
        if (empty($current)) {
            throw new BadRequestException('O link no qual está tentando acessar é inválido!');
        }
    }

    public function export() {
        try {
            $conditions = $this->setConditionsDashboard();
            $this->excel($conditions);
        } catch (Exception $exc) {
            $this->Flash->error(__('Entre em contato com o administrador!'));
            $this->redirect(['controller' => 'Users', 'action' => 'profile']);
        }
    }

    private function excel($conditions) {
        $database = $this->Users->Schedules->TypesOfPayments->sumPaymentsRealize($conditions);
        $header = $this->createHeaderXls($database);
        $data = $this->createBodyXls($database);
        $this->generateXls($data, $header);
    }

    private function createHeaderXls($database) {
        $header = '';

        foreach($database as $payments) { }
        foreach($payments->toArray() as $key => $value) {
            $header .= $key . "\t";
        }
        return $header;
    }

    private function createBodyXls($database) {
        $data = '';
        $number_lines = $database->count();
        $payment = $database->toArray();

        for($i = 0; $i < $number_lines; $i++) {
            $line = '';
            $row = $payment[$i];

            foreach($row->toArray() as $key => $value) {
                if(!isset($value) || $value == '') {
                    $value = "\t";
                } else {
                    $value = str_replace('"', '""', $value);
                    $value = '"' . $value . '"' . "\t";
                }
                $line .= $value;
            }
            $data .= trim($line) . "\n";
        }
        $data = utf8_decode($data);
        $data = str_replace("\r", "", $data);

        return $data;
    }

    private function generateXls($data, $header) {
        header("Content-type: application/x-msdownload");
        header("Content-Disposition: attachment; filename=pagamento.xls");
        header("Pragma: no-cache");
        header("Expires: 0");

        $data != '' ?
        print "$header\n$data" :
        print "(0) Nenhum dado encontrado!";

        exit();
    }
}
