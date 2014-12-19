<?php

class CourseController extends \BaseController {

	public function index()
	{
        $courses = Course::all();
		return View::make('course.index', ['courses' => $courses]);
	}


    public function admin(){

        $courses = Course::all();

        return View::make('admin.course', ['courses'=>$courses]);
    }

	public function create()
	{
        $clubs = Club::lists('name', 'id');
		return View::make('course.create', ['clubs'=>$clubs]);
	}

	public function store()
	{

            $course = new Course;
            $course->name = Input::get('name');
            $course->country = Input::get('country');
            $course->state = Input::get('state');
            $course->city = Input::get('city');
            $course->holes = Input::get('holes');

            $course->information = Input::get('information');
            $course->club = Input::get('club');
            $course->fee = Input::get('fee');
            $course->course_map = Input::get('course_map');

            $file = Input::file('file');

            $filename = $file->getClientOriginalName();
            $filename = str_random(8) . $filename;

            $uploadSuccess = Input::file('file')->move('img/dg/', $filename);

        if( $uploadSuccess ) {
            $course->image = $filename;
            $course->save();
            return Redirect::to('/admin/course');
        } else {
            return Response::json('error', 400);
        }

	}

	public function show($id)
	{
        $course = Course::with('hole')->whereId($id)->firstOrFail();
        $rounds = Round::where('course_id', $id)->get();

		return View::make('course.show', ['course'=>$course, 'rounds'=>$rounds]);
	}

	public function edit($id)
	{
        $course = Course::with('hole')->whereId($id)->firstOrFail();
        if (is_null($course))
        {
            return Redirect::route('course.admin/course');
        }else{

        $clubs = Club::lists('name', 'id');
        return View::make('course.edit', ['course'=>$course, 'clubs'=>$clubs]);
	    }
    }

	public function update($id)
    {
        $course = Course::whereId($id)->firstOrFail();
        if (is_null($course)) {
            return Redirect::route('/admin/course');
        } else {
            $course = Course::whereId($id)->firstOrFail();
            $course->name = Input::get('name');
            $course->country = Input::get('country');
            $course->state = Input::get('state');
            $course->city = Input::get('city');
            $course->holes = Input::get('holes');
            $course->information = Input::get('information');

            $course->save();

            return Redirect::to('/admin/course');
        }
    }

	public function destroy($id)
	{
		$course = Course::whereId($id)->firstOrFail();
        $course->delete();

        $holes = Hole::with('score')->where('course_id', $id)->get();
        foreach($holes as $hole){
            $hole->delete();
        }

        return Redirect::back()->withFlashMessage('Course deleted!');
	}


}
