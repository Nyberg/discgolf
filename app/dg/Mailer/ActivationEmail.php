<?php

namespace dg\Mailer;

use User;

class ActivationEmail extends Mailer {

    public function activate(User $user)
    {
        $view = 'emails.activation.activation';
        $data = ['name' => $user['first_name'], 'email' => $user['email'] ];
        $subject = 'Välkommen till Penguin Project';
        return $this->sendTo($user, $subject, $view, $data);
    }

} 