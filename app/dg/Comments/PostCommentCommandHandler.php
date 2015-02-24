<?php

namespace dg\Comments;


use Comment;
use dg\Commanding\CommandHandler;
use dg\Eventing\EventDispatcher;

class PostCommentCommandHandler implements CommandHandler{

    private $dispatcher;
    private $comment;

    function __construct(Comment $comment, EventDispatcher $dispatcher){

        $this->comment = $comment;
        $this->dispatcher = $dispatcher;
    }

    public function handle($command)
    {
        $comment = $this->comment->post($command->body, $command->type_id, $command->user_id, $command->type);
        $this->dispatcher->dispatch($comment->releaseEvents());
    }

}

