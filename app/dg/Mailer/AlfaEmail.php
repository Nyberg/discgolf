<?php

namespace dg\Mailer;

use Registration;
use User;

class AlfaEmail extends Mailer {

    public function sendAlfa(Registration $user, $token)
    {

        $view = 'emails.activation.alfa';
        $data = ['name' => $user['first_name'], 'email' => $user['email'], 'last_name'=>$user['last_name'], 'token'=>$token, 'id'=>$user['id']];
        $subject = 'Inbjudan till Alfatester - Penguin Project';

        return $this->sendTo($user, $subject, $view, $data);
    }

} 