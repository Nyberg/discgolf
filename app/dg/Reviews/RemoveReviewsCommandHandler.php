<?php

namespace dg\Reviews;

use Review;
use dg\Commanding\CommandHandler;
use dg\Eventing\EventDispatcher;

class RemoveReviewsCommandHandler implements CommandHandler{

    private $dispatcher;
    private $review;

    function __construct(Review $review, EventDispatcher $dispatcher){

        $this->review = $review;
        $this->dispatcher = $dispatcher;
    }

    public function handle($command)
    {
        $review = $this->review->remove($command->id);
        $this->dispatcher->dispatch($review->releaseEvents());
    }

}

