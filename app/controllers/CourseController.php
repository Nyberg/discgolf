<?php

use dg\Forms\CourseAddForm;

class CourseController extends \BaseController {

    private $courseAddForm;

    public function __construct(CourseAddForm $courseAddForm){
        $this->courseAddForm = $courseAddForm;
    }

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

        $this->courseAddForm->validate($input = Input::all());

        $course = new Course;
        $course->name = Input::get('name');
        $course->country = Input::get('country');
        $course->state = Input::get('state');
        $course->city = Input::get('city');
        $course->holes = Input::get('holes');

        $course->information = Input::get('information');
        $course->club_id = Input::get('club');
        $course->fee = Input::get('fee');
        $course->long = Input::get('long');
        $course->lat = Input::get('lat');
        $course->status = 0;

        $course->save();

        $course = Course::whereId($course->id)->firstOrFail();

        $photo = new Photo();
        $photo->user_id = Auth::user()->id;
        $photo->imageable_id = $course->id;

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
            $photo->url = $filepath.$filename;
            }
            catch(Exception $e)
            {
                return 'Något gick snett mannen: ' .$e;
            }
            $course->photos()->save($photo);
        }

            $course->save();

            return Redirect::to('/admin/course')->with('success', 'Course added!');
	}

	public function show($id)
	{
        $course = Course::with('hole')->whereId($id)->firstOrFail();
        $rounds = Round::where('course_id', $id)->get();
        $total = Round::where('course_id', $id)->count();
        $club = Club::whereId($course->club_id)->firstOrFail();
        $reviews = Review::where('course_id', $id)->get();

        if($total > 0 ){
            $record = Round::where('course_id', $id)->orderBy('total', 'desc')->firstOrFail();
            $rec = $record->total;
        }else{
            $rec = 0;
        }

        $sum = Hole::where('course_id', $id)->sum('length');
        $x = ($sum / $course->holes);
        $avg = round($x,2);

        return View::make('course.show', ['course'=>$course, 'rounds'=>$rounds, 'club'=>$club, 'rec'=>$rec, 'sum'=>$sum, 'avg'=>$avg, 'reviews'=>$reviews]);
	
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
        $this->courseAddForm->validate($input = Input::all());

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

            $course->save();

            $course = Course::whereId($course->id)->firstOrFail();

            $photo = new Photo();
            $photo->user_id = Auth::user()->id;
            $photo->imageable_id = $course->id;


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

                    foreach($course->photos as $photo){

                        if($photo->url == '/img/dg/header.jpg'){

                        }else{
                            $photo->delete();
                            File::delete(public_path().$photo->url);
                        }
                    }

                    $file = Input::file('file');
                    $filepath = '/img/dg/';
                    $filename = time() . '-course.jpg';
                    $file = $file->move(public_path($filepath), ($filename));
                    $photo->url = $filepath.$filename;
                }
                catch(Exception $e)
                {
                    return 'Något gick snett mannen: ' .$e;
                }

                $course->photos()->save($photo);
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
