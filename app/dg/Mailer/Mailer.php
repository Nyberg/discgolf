<?php

namespace dg\Mailer;

Use Mail;

abstract class Mailer
{
    /**
     * @param $user
     * @param $subject
     * @param $view
     * @param array $data
     */
    public function sendTo($user, $subject, $view, $data = [])
    {
        Mail::send($view, $data, function($message) use($user, $subject)
        {
            $message->to($user->email)
                ->subject($subject);
        });
    }

}