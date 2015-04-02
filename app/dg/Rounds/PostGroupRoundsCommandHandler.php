<?php

namespace dg\Rounds;

use Round;
use dg\Commanding\CommandHandler;
use dg\Eventing\EventDispatcher;

class PostGroupRoundsCommandHandler implements CommandHandler{

    private $dispatcher;
    private $round;

    function __construct(Round $round, EventDispatcher $dispatcher){
        $this->round = $round;
        $this->dispatcher = $dispatcher;
    }

    public function handle($command)
    {
        $round = $this->round->postGroupRound($command->user_id, $command->course_id, $command->tee_id, $command->date, $command->status, $command->type, $command->type_id, $command->username, $command->comment, $command->group_id, $command->weather_id, $command->wind_id);
        $this->dispatcher->dispatch($round->releaseEvents());
    }

}