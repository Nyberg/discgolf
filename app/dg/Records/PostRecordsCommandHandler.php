<?php

namespace dg\Records;

use Record;
use dg\Commanding\CommandHandler;
use dg\Eventing\EventDispatcher;

class PostRecordsCommandHandler implements CommandHandler{

    private $dispatcher;
    private $record;

    function __construct(Record $record, EventDispatcher $dispatcher){

        $this->record = $record;
        $this->dispatcher = $dispatcher;
    }

    public function handle($command)
    {
        $record = $this->record->post($command->user_id, $command->course_id, $command->tee_id, $command->type, $command->total, $command->date, $command->par_id, $command->round_id, $command->status, $command->group_id);
        $this->dispatcher->dispatch($record->releaseEvents());
    }

}

