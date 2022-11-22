<?php
namespace App\Mailer;

use Cake\Mailer\Mailer;

/**
 * RecoverPassword mailer.
 */
class RecoverPasswordMailer extends Mailer {
    /**
     * Mailer's name.
     *
     * @var string
     */
    public static $name = 'RecoverPassword';

    public function rescuePassword($user) {
        $this
            ->setTo($user->email)
            ->setProfile('envemail')
            ->setEmailFormat('html')
            ->setTemplate('recover_password')
            ->setLayout('user')
            ->setViewVars([
                'name' => $user->name,
                'host_name' => $user->host_name,
                'token' => $user->reset_password,
                'username' => $user->username
            ])
            ->setSubject(sprintf('Recuperar senha'));
    }
}
