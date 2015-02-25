<?php

namespace dg\Registrations;

use Registration;
use dg\Commanding\CommandHandler;
use dg\Eventing\EventDispatcher;

class PostRegistrationCommandHandler implements CommandHandler{

    private $dispatcher;
    private $registration;

    function __construct(Registration $registration, EventDispatcher $dispatcher){

        $this->registration = $registration;
        $this->dispatcher = $dispatcher;
    }

    public function handle($command)
    {
        $registration = $this->registration->post($command->user_id, $command->friend_id);
        $this->dispatcher->dispatch($registration->releaseEvents());
    }

}

