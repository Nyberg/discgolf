<?php


namespace dg\Commanding;

use Illuminate\Foundation\Application;

class DefaultCommandBus implements CommandBus
{
    private $commandTranslator;
    private $application;
    function __construct(Application $application, CommandTranslator $commandTranslator)
    {
        $this->application = $application;
        $this->commandTranslator = $commandTranslator;
    }
    public function execute($command)
    {
        $handler = $this->commandTranslator->toCommandHandler($command);
        return $this->application->make($handler)->handle($command);
    }
}