<?php

namespace dg\Registrations;

use Registration;

class RegistrationWasPosted{

    public $registration;

    function __construct(Registration $registration){

        $this->registration = $registration;
    }

}