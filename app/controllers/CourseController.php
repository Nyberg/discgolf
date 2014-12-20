<?php

class CourseController extends \BaseController {

	public function index()
	{
        $courses = Course::whereStatus(1)->get();
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
        $course->long = Input::get('long');
        $course->lat = Input::get('lat');
        $course->status = 0;

        if (Input::hasFile('course_map')) {

            try {

                $map = Input::get('course_map');
                $filepath = '/img/course/';
                $filename = time() . '-course_map.jpg';

                $map = $map->move(public_path($filepath), ($filename));
                $course->course_map = $filepath . $filename;
            } catch (Exeption $e) {
                Return 'Something went wrong..';
            }
        }

        if(Input::hasFile('file')) {

            try
            {
            $file = Input::file('file');

            $filepath = '/img/dg/';
            $filename = time() . '-course.jpg';

            $file = $file->move(public_path($filepath), ($filename));
            $course->image = $filepath.$filename;
            }
            catch(Exception $e)
            {
                return 'Något gick snett mannen: ' .$e;
            }
        }

            $course->save();

            return Redirect::to('/admin/course')->with('success', 'Course added!');
	}

	public function show($id)
	{
        $course = Course::with('hole')->whereId($id)->firstOrFail();
        $rounds = Round::where('course_id', $id)->get();
        $club = Club::whereId($course->club)->firstOrFail();
        $record = Round::where('course_id', $id)->orderBy('total', 'desc')->groupBy('total')->firstOrFail();

		return View::make('course.show', ['course'=>$course, 'rounds'=>$rounds, 'club'=>$club, 'record'=>$record]);
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
            $course->status = Input::get('status');
            $course->long = Input::get('long');
            $course->lat = Input::get('lat');

            if (Input::hasFile('file-2')) {

                try {

                    $file = Input::file('file-2');

                    $filepath = '/img/dg/course/';
                    $filename = time() . '-course.jpg';

                    $file = $file->move(public_path($filepath), ($filename));
                    $course->course_map = $filepath.$filename;
                } catch (Exception $e) {
                    Return 'Something went wrong..';
                }
            }

            if(Input::hasFile('file')) {

                try
                {
                    $file = Input::file('file');

                    $filepath = '/img/dg/';
                    $filename = time() . '-course.jpg';

                    $file = $file->move(public_path($filepath), ($filename));
                    $course->image = $filepath.$filename;
                }
                catch(Exception $e)
                {
                    return 'Något gick snett mannen: ' .$e;
                }
            }


            $course->save();

            return Redirect::to('/admin/course')->with('success', 'Course updated!');
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
