<?php
namespace App\View\Helper;

use Cake\View\Helper;
use Cake\View\View;

class AppViewHelper extends Helper {
    /**
     * Default configuration.
     *
     * @var array
     */
    protected $_defaultConfig = [];

    public function visible($controller, $action) {
        $actions_maps = $this->request->getSession()->read('Auth')['User']['role']['actions'];

        foreach($actions_maps as $action_map) {
            if(strcasecmp($controller, $action_map['controller']['name']) == 0 && strcasecmp($action, $action_map['action_map']) == 0) {
                return true;
            }
        }
        return false;
    }

    public function debug($var) {
        debug($var);
        exit;
    }
}

?>
