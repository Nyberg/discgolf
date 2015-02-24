<?php

namespace dg\Commanding;

use Illuminate\Foundation\Application;

class ValidationCommandBus implements CommandBus
{
    private $commandTranslator;
    private $application;
    private $commandBus;

    function __construct(DefaultCommandBus $commandBus, Application $application, CommandTranslator $commandTranslator)
    {
        $this->commandBus = $commandBus;
        $this->application = $application;
        $this->commandTranslator = $commandTranslator;
    }

    public function execute($command)
    {
        $validator = $this->commandTranslator->toValidator($command);
        if(class_exists($validator))
        {
            $this->application->make($validator)->validate($command);
        }
        return $this->commandBus->execute($command);
    }
}