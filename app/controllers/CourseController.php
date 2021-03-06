<?php

use dg\Forms\CourseAddForm;
use dg\statistics\Stat;
use Khill\Lavacharts\Lavacharts;

class CourseController extends \BaseController {

    private $courseAddForm;
    private $stat;

    public function __construct(CourseAddForm $courseAddForm, Stat $stat){
        $this->courseAddForm = $courseAddForm;
        $this->stat = $stat;
    }

	public function index()
	{
        $courses = Course::whereStatus(1)->orderBy('name', 'asc')->get();
        $countries = Country::orderBy('country', 'asc')->get();
        $states = State::orderBy('state', 'asc')->get();
        $cities = City::orderBy('city', 'asc')->get();
		return View::make('course.index', ['courses' => $courses, 'countries'=>$countries, 'states'=>$states, 'cities'=>$cities]);
	}


    public function admin(){

        $courses = Course::with('tee')->get();

        return View::make('admin.course', ['courses'=>$courses]);
    }

	public function create()
	{
        $clubs = Club::lists('name', 'id');
        $countries = Country::get();
        $states = State::get();
        $cities = City::get();
		return View::make('course.create', ['clubs'=>$clubs, 'countries'=>$countries, 'states'=>$states, 'cities'=>$cities]);
	}

	public function store()
    {

        $this->courseAddForm->validate($input = Input::all());

        $course = new Course;
        $course->name = Input::get('name');
        $course->country_id = Input::get('country');
        $course->state_id = Input::get('state');
        $course->city_id = Input::get('city');
        //$course->holes = Input::get('holes');

        $course->information = Input::get('information');
        $course->club_id = Input::get('club');
        $course->fee = Input::get('fee');
        $course->long = Input::get('long');
        $course->lat = Input::get('lat');
        $course->status = Input::get('status');

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
        $course = Course::with('tee')->whereId($id)->firstOrFail();

        if($course->status == 1){

        $tees = Tee::where('course_id', $id)->get();
        $rounds = Round::where('course_id', $id)->where('status', 1)->orderby('date', 'desc')->limit(8)->get();
        $club = Club::whereId($course->club_id)->firstOrFail();
        $reviews = Review::where('course_id', $id)->orderBy('created_at', 'desc')->get();

        $holes = Hole::where('course_id', $id)->get();
        $records = Record::where('course_id', $id)->where('status', 1)->get();
        $data = $this->stat->generateInfo($holes, $tees);
        $avg = $this->stat->generateCourseAvg($tees, $rounds);

        $aces = Score::where('course_id', $id)->where('score', 1)->get();

        return View::make('course.show', ['course'=>$course, 'rounds'=>$rounds, 'tees'=>$tees, 'club'=>$club,'reviews'=>$reviews, 'data'=>$data, 'records'=>$records, 'avg'=>$avg, 'aces'=>$aces]);

        }else{
            return Redirect::to('/')->with('danger', 'Du kan inte besöka denna sida!');
        }
    }

	public function edit($id)
	{
        $course = Course::with('tee')->whereId($id)->firstOrFail();
        if (is_null($course))
        {

            return Redirect::route('course.admin/course');
        }else{

        $clubs = Club::lists('name', 'id');
            $countries = Country::get();
            $states = State::get();
            $cities = City::get();
        return View::make('course.edit', ['course'=>$course, 'clubs'=>$clubs, 'countries'=>$countries, 'states'=>$states, 'cities'=>$cities]);
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
            $course->country_id = Input::get('country');
            $course->state_id = Input::get('state');
            $course->city_id = Input::get('city');
            $course->information = Input::get('information');
            $course->status = Input::get('status');
            $course->long = Input::get('long');
            $course->lat = Input::get('lat');
            $course->club_id = Input::get('club');
            $course->fee = Input::get('fee');

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
