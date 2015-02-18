<?php

namespace dg\Mailer;

use Registration;
use User;

class NotificationEmail extends Mailer {

    public function sendMail(Registration $user)
    {

        $view = 'emails.activation.notification';
        $data = ['name' => $user['first_name'], 'email' => $user['email'], 'last_name'=>$user['last_name']];
        $subject = 'Anmälan alfatester';
        $user = User::whereId(1)->firstOrFail();

        return $this->sendTo($user, $subject, $view, $data);
    }

} 