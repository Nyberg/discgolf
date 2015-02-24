<?php

namespace dg\Rounds;

use Round;
use dg\Commanding\CommandHandler;
use dg\Eventing\EventDispatcher;

class RemoveRoundCommandHandler implements CommandHandler{

    private $dispatcher;
    private $round;

    function __construct(Round $round, EventDispatcher $dispatcher){

        $this->round = $round;
        $this->dispatcher = $dispatcher;
    }

    public function handle($command)
    {
        $round = Round::whereId($command->id)->firstOrFail();
        $round->remove($command->id);
        $this->dispatcher->dispatch($round->releaseEvents());
    }

}