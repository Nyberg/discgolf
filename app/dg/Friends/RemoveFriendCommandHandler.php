<?php

namespace dg\Friends;

use Friend;
use dg\Commanding\CommandHandler;
use dg\Eventing\EventDispatcher;

class RemoveFriendCommandHandler implements CommandHandler{

    private $dispatcher;
    private $friend;

    function __construct(Friend $friend, EventDispatcher $dispatcher){

        $this->friend = $friend;
        $this->dispatcher = $dispatcher;
    }

    public function handle($command)
    {
        $friend = $this->friend->remove($command->id);
        $this->dispatcher->dispatch($friend->releaseEvents());
    }

}

