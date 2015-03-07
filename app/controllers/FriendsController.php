<?php

use dg\Friends\PostFriendCommand;
use dg\Friends\RemoveFriendCommand;

class FriendsController extends \BaseController {


	public function index()
	{
		//
	}

	public function store($id)
	{
        if(Auth::check()){

        $user = User::whereId($id)->firstOrFail();
		$user_id = Auth::id();


        $command = new PostFriendCommand(
            $user_id,
            $friend_id = $id
        );

        $this->CommandBus->execute($command);

        return Redirect::back()->with('success', 'Du har lagt till ' . $user->first_name . ' som vän!');

        }else{
            return Redirect::back()->with('danger', 'Du har inte behörighet för detta!');
        }
	}

	public function destroy($id)
	{
		$friend = Friend::where('user_id', Auth::id())->where('friend_id', $id)->firstOrFail();
        $user = User::whereId($id)->firstOrFail();

        if(Auth::id() == $friend->user_id){

        $id = $friend->id;

        $command = new RemoveFriendCommand($id);

        $this->CommandBus->execute($command);

        return Redirect::back()->with('success', 'Du har tagit bort ' . $user->first_name . ' som vän!');

        }else{
            return Redirect::back()->with('danger', 'Du kan inte ta bort denna!');
        }

	}


}
