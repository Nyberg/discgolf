<?php

use dg\Comments\PostCommentCommand;
use dg\Comments\RemoveCommentCommand;
use dg\Comments\UpdateCommentCommand;
use Illuminate\Support\Facades\Redirect;

class CommentController extends \BaseController
{

    public function index()
    {
        $comments = Comment::where('user_id', Auth::id())->get();

        return View::make('comment.index', ['comments'=>$comments]);
    }

    public function store()
    {
        if (Auth::user()) {

            $body = Input::get('body');
            $user_id = Auth::id();
            $type_id = Input::get('type_id');
            $type = Input::get('model');

            $command = new PostCommentCommand(
                $body,
                $type_id,
                $user_id,
                $type
            );

            $this->CommandBus->execute($command);

            return Redirect::back()->with('success', 'Kommenatar sparad!');

        }else{

            return Redirect::back()->with('headsup', 'Du måste vara inloggad för att kunna kommentera');
        }

    }

	public function edit($id)
	{

	}

	public function update($id)
	{
        $comment = Comment::whereId($id)->firstOrFail();

        if($comment->user_id == Auth::id()){

        $id = $comment->id;
        $body = Input::get('body');

        $command = new UpdateCommentCommand(
            $id,
            $body
        );

        $this->CommandBus->execute($command);

        return Redirect::back()->with('success', 'Kommentar uppdaterad');

        }else{
            return Redirect::back()->with('danger', 'Du har inte behörighet för detta!');
        }
	}

	public function destroy($id)
	{
		$comment = Comment::whereId($id)->firstOrFail();

        if($comment->user_id == Auth::id()){

        $id = $comment->id;

        $command = new RemoveCommentCommand($id);

        $this->CommandBus->execute($command);

        return Redirect::back()->with('success', 'Kommentar borttagen!');

        }else{
            return Redirect::back()->with('danger', 'Du har inte behörighet för detta!');
        }
	}
}
