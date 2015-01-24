<?php

use dg\Forms\AddReviewForm;

class ReviewController extends \BaseController {

    /**
     * @var AddReviewForm
     */
    private $addReviewForm;

    public function __construct(AddReviewForm $addReviewForm){

        $this->addReviewForm = $addReviewForm;
    }

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

        $this->addReviewForm->validate($input = Input::all());

		$review = new Review;

        $review->user_id = Auth::user()->id;
        $review->course_id = Input::get('id');
        $review->head = Input::get('head');
        $review->body = Input::get('body');
        $review->rating = Input::get('rating');

        $review->save();

        return Redirect::to('/course/'.$review->course_id.'/show')->with('success', 'Din recension är tillagd!');
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show()
	{
		$reviews = Review::where('user_id', Auth::id())->get();

        return View::make('review.show', ['reviews'=>$reviews]);
	}

	public function edit($id)
	{
        $review = Review::with('course')->whereId($id)->firstOrFail();
        $courses = Course::lists('name', 'id');

        return View::make('review.edit', ['courses'=>$courses, 'review'=>$review]);
	}

	public function update($id)
	{

        $this->addReviewForm->validate($input = Input::all());

        $review = Review::whereId($id)->firstOrFail();

        $review->user_id = Auth::user()->id;
        $review->course_id = Input::get('id');
        $review->head = Input::get('head');
        $review->body = Input::get('body');
        $review->rating = Input::get('rating');

        $review->save();

        return Redirect::to('/account/review/user')->with('success', 'Din recension är uppdaterad!');
	}

	public function destroy($id)
	{
		$review = Review::whereId($id)->firstOrFail();

        $review->delete();

        return Redirect::back()->with('success', 'Recension '.$review->head.' borttagen');

	}


}
