<?php

namespace dg\Comments;


use Comment;
use dg\Commanding\CommandHandler;
use dg\Eventing\EventDispatcher;

class RemoveCommentCommandHandler implements CommandHandler{

    private $dispatcher;
    private $comment;

    function __construct(Comment $comment, EventDispatcher $dispatcher){

        $this->comment = $comment;
        $this->dispatcher = $dispatcher;
    }

    public function handle($command)
    {
        $comment = $this->comment->remove($command->id);
        $this->dispatcher->dispatch($comment->releaseEvents());
    }

}

