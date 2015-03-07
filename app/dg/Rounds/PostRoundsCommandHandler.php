<?php

namespace dg\Rounds;

use Round;
use dg\Commanding\CommandHandler;
use dg\Eventing\EventDispatcher;

class PostRoundsCommandHandler implements CommandHandler{

    private $dispatcher;
    private $round;

    function __construct(Round $round, EventDispatcher $dispatcher){

        $this->round = $round;
        $this->dispatcher = $dispatcher;
    }

    public function handle($command)
    {
        $round = $this->round->post($command->user_id, $command->course_id, $command->tee_id, $command->date, $command->status, $command->type, $command->par_id, $command->username, $command->comment);
        $this->dispatcher->dispatch($round->releaseEvents());
    }

}