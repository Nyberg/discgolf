<?php

namespace dg\Friends;

use Friend;
use dg\Commanding\CommandHandler;
use dg\Eventing\EventDispatcher;

class PostFriendCommandHandler implements CommandHandler{

    private $dispatcher;
    private $friend;

    function __construct(Friend $friend, EventDispatcher $dispatcher){

        $this->friend = $friend;
        $this->dispatcher = $dispatcher;
    }

    public function handle($command)
    {
        $friend = $this->friend->post($command->user_id, $command->friend_id);
        $this->dispatcher->dispatch($friend->releaseEvents());
    }

}

