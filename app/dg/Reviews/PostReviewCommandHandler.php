<?php

namespace dg\Reviews;

use Review;
use dg\Commanding\CommandHandler;
use dg\Eventing\EventDispatcher;

class PostReviewCommandHandler implements CommandHandler{

    private $dispatcher;
    private $review;

    function __construct(Review $review, EventDispatcher $dispatcher){

        $this->review = $review;
        $this->dispatcher = $dispatcher;
    }

    public function handle($command)
    {
        $review = $this->review->post($command->user_id, $command->course_id, $command->heading, $command->body, $command->rating);
        $this->dispatcher->dispatch($review->releaseEvents());
    }

}

