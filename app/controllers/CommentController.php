<?php

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

            $comment = new Comment;
            $comment->body = Input::get('body');
            $comment->user_id = Auth::user()->id;
            $comment->commentable_id = Input::get('type_id');
            $comment->save();

            if (Input::get('model') == 'user') {

                $user = User::whereId($comment->commentable_id)->firstOrFail();

                $user->comments()->save($comment);
            }
            if (Input::get('model') == 'course') {

                $course = Course::whereId($comment->commentable_id)->firstOrFail();

                $course->comments()->save($comment);
            }
            if (Input::get('model') == 'round') {

                $round = Round::whereId($comment->commentable_id)->firstOrFail();

                $round->comments()->save($comment);
            }
            if(Input::get('model') == 'score') {

                $score = Score::whereId($comment->commentable_id)->firstOrFail();

                $score->comments()->save($comment);

            }if(Input::get('model') == 'club'){

                $club = Club::whereId($comment->commentable_id)->firstOrFail();

                $club->comments()->save($comment);

            }if(Input::get('model') == 'news'){

                $news = News::whereId($comment->commentable_id)->firstOrFail();

                $news->comments()->save($comment);

            }

            return Redirect::back()->with('success', 'Kommenatar sparad!');

        } else {

            return Redirect::back()->with('headsup', 'Du måste vara inloggad för att kunna kommentera');
        }
    }

	public function edit($id)
	{

	}

	public function update($id)
	{
        $comment = Comment::whereId($id)->firstOrFail();

        $comment->body = Input::get('body');
        $comment->save();

        return Redirect::back()->with('success', 'Kommentar uppdaterad');
	}

	public function destroy($id)
	{
		$comment = Comment::whereId($id)->firstOrFail();

        if($comment){
            $comment->delete();
            return Redirect::back()->with('success', 'Kommentar borttagen!');
        }else{
            return Redirect::back()->with('danger', 'Något gick fel..');
        }

	}
}
