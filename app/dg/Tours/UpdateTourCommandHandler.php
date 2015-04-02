<?php

namespace dg\Tours;

use Tour;
use dg\Commanding\CommandHandler;
use dg\Eventing\EventDispatcher;

class UpdateTourCommandHandler implements CommandHandler{

    private $dispatcher;
    private $tour;

    function __construct(Tour $tour, EventDispatcher $dispatcher){

        $this->tour = $tour;
        $this->dispatcher = $dispatcher;
    }

    public function handle($command)
    {
        $tour = Tour::whereId($command->id)->firstOrFail();
        $tour->change($command->id, $command->name, $command->rounds, $command->date, $command->club_id, $command->information);
        $this->dispatcher->dispatch($tour->releaseEvents());
    }

}