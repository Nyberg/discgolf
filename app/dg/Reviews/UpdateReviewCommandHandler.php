<?php

namespace dg\Reviews;

use Review;
use dg\Commanding\CommandHandler;
use dg\Eventing\EventDispatcher;

class UpdateReviewCommandHandler implements CommandHandler{

    private $dispatcher;
    private $review;

    function __construct(Review $review, EventDispatcher $dispatcher){

        $this->review = $review;
        $this->dispatcher = $dispatcher;
    }

    public function handle($command)
    {
        $review = Review::whereId($command->id)->first();
        $review->change($command->user_id, $command->course_id, $command->body, $command->head, $command->rating);
        $this->dispatcher->dispatch($review->releaseEvents());
    }

}

