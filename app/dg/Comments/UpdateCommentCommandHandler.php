<?php

namespace dg\Comments;


use Comment;
use dg\Commanding\CommandHandler;
use dg\Eventing\EventDispatcher;

class UpdateCommentCommandHandler implements CommandHandler{

    private $dispatcher;
    private $comment;

    function __construct(Comment $comment, EventDispatcher $dispatcher){

        $this->comment = $comment;
        $this->dispatcher = $dispatcher;
    }

    public function handle($command)
    {
        $comment = Comment::whereId($command->id)->first();

        $comment->change($command->body);
        $this->dispatcher->dispatch($comment->releaseEvents());
    }

}

