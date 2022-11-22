<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Event\Event;

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link https://book.cakephp.org/3/en/controllers.html#the-app-controller
 */
class AppController extends Controller
{

    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * e.g. `$this->loadComponent('Security');`
     *
     * @return void
     */
    public function initialize()
    {
        parent::initialize();

        $this->loadComponent('RequestHandler', [
            'enableBeforeRedirect' => false,
        ]);
        $this->loadComponent('Flash');
        $this->loadComponent('Auth', [
            'authorize' => 'Controller',
            'authenticate' => [
                'Form' => [
                    'finder' => 'auth'
                ]
            ],
            'loginRedirect' => [
                'controller' => 'Users',
                'action' => 'home'
            ],
            'loginAction' => [
                'controller' => 'Users',
                'action' => 'login'
            ],
            'logoutRedirect' => [
                'controller' => 'Users',
                'action' => 'login',
            ],
            'authError' => 'Permissão negada!',
            'unauthorizedRedirect' => [
                'controller' => 'Users',
                'action' => 'profile'
            ]
        ]);
    }

    public function debug($var) {
        debug($var);
        exit;
    }

    public function getIdUserLogged() {
        return $this->Auth->user('id');
    }

    public function formatData($data) {
        $data = str_replace('/', '', $data);
        $data = substr($data, 4, 4) . '-' . substr($data, 2, 2) . '-' . substr($data, 0, 2);
        return $data;
    }

    public function beforeRender(Event $event) {
        parent::beforeRender($event);

        if(
            $this->request->getParam(['action']) !== null AND
            ($this->request->getParam(['action']) == 'login'
            OR $this->request->getParam(['action']) == 'register'
            OR $this->request->getParam(['action']) == 'forgetPassword')
        ) {
            $this->viewBuilder()->setLayout('login');

        } else {
            $user = $this->loadModel('Users');
            $auth = $this->Users->getUserData($this->Auth->user('id'));
            $this->viewBuilder()->setLayout('admin');
            $this->set(compact('auth'));
        }
    }

    public function isAuthorized($user) {
        $action = $this->request->getParam('action');
        $controller = $this->request->getParam('controller');
        $actions_maps = $this->Auth->user()['role']['actions'];

        if(in_array($action, ['profile', 'editProfile', 'updatePassword', 'home'])) {
            return true;
        }

        foreach($actions_maps as $action_map) {
            if(strcasecmp($controller, $action_map['controller']['name']) == 0 && strcasecmp($action, $action_map['action_map']) == 0) {
                return true;
            }
        }
        return false;
    }
}
