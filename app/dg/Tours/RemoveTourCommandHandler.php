<?php

namespace dg\Tours;

use Tour;
use dg\Commanding\CommandHandler;
use dg\Eventing\EventDispatcher;

class RemoveTourCommandHandler implements CommandHandler{

    private $dispatcher;
    private $tour;

    function __construct(Tour $tour, EventDispatcher $dispatcher){

        $this->tour = $tour;
        $this->dispatcher = $dispatcher;
    }

    public function handle($command)
    {
        $tour = Tour::whereId($command->id)->firstOrFail();
        $tour->remove($command->id);
        $this->dispatcher->dispatch($tour->releaseEvents());
    }

}