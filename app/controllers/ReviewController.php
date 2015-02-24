<?php

use dg\Reviews\PostReviewCommand;
use dg\Reviews\RemoveReviewsCommand;
use dg\Reviews\UpdateReviewCommand;

class ReviewController extends \BaseController {

	public function index()
	{
		//
	}

	public function create()
	{
        $courses = Course::lists('name', 'id');

        return View::make('review.create', ['courses'=>$courses]);
	}

	public function store()
	{

        $user_id = Auth::user()->id;
        $course_id = Input::get('id');
        $heading = Input::get('head');
        $body = Input::get('body');
        $rating = Input::get('rating');

        $command = new PostReviewCommand(
            $user_id,
            $course_id,
            $heading,
            $body,
            $rating
        );

        $this->CommandBus->execute($command);

        return Redirect::to('/course/'.$course_id.'/show')->with('success', 'Din recension är tillagd!');
	}

	public function show()
	{
		$reviews = Review::where('user_id', Auth::id())->get();

        return View::make('review.show', ['reviews'=>$reviews]);
	}

	public function edit($id)
	{
        $review = Review::with('course')->whereId($id)->firstOrFail();

        if(Auth::id() == $review->user_id){
            $courses = Course::lists('name', 'id');

            return View::make('review.edit', ['courses'=>$courses, 'review'=>$review]);

        }else{

            return Redirect::back()->with('danger', 'Du kan inte redigera detta..');
        }
	}

	public function update($id)
	{
        $review = Review::with('course')->whereId($id)->firstOrFail();

        if(Auth::id() == $review->user_id){

            $id = $review->id;
            $user_id = Auth::id();
            $course_id = Input::get('id');
            $body = Input::get('body');
            $head = Input::get('head');
            $rating = Input::get('rating');

            $command = new UpdateReviewCommand(
                $id,
                $user_id,
                $course_id,
                $body,
                $head,
                $rating
            );

            $this->CommandBus->execute($command);

            return Redirect::to('/course/'.$course_id.'/show')->with('success', 'Din recension är uppdaterad!');

        }else{

            return Redirect::back()->with('danger', 'Du kan inte redigera detta..');
        }
	}

	public function destroy($id)
	{
		$review = Review::whereId($id)->firstOrFail();

        if(Auth::id() == $review->user_id) {

          $id = $review->id;

            $command = new RemoveReviewsCommand($id);

            $this->CommandBus->execute($command);

            return Redirect::back()->with('success', 'Recension ' . $review->head . ' borttagen');
        }else{
            return Redirect::back()->with('danger', 'Du kan inte redigera detta..');
        }
	}
}
