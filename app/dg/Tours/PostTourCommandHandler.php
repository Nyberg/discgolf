<?php

namespace dg\Tours;

use Tour;
use dg\Commanding\CommandHandler;
use dg\Eventing\EventDispatcher;

class PostTourCommandHandler implements CommandHandler{

    private $dispatcher;
    private $tour;

    function __construct(Tour $tour, EventDispatcher $dispatcher){

        $this->tour = $tour;
        $this->dispatcher = $dispatcher;
    }

    public function handle($command)
    {
        $tour = $this->tour->post($command->name, $command->rounds, $command->date, $command->information, $command->club_id, $command->country_id, $command->state_id, $command->city_id);
        $this->dispatcher->dispatch($tour->releaseEvents());
    }

}