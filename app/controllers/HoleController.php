<?php

class HoleController extends \BaseController {

	public function index()
	{
		//
	}

	public function create($id)
	{
        $course = Course::with('hole')->whereId($id)->firstOrFail();

        $number = Hole::whereCourseId($id)->count();
        $holes = Course::whereId($id)->pluck('holes');

        $total = $holes - $number;

        if(is_null($course)){
            return Redirect::to('/admind/course');
        }else{

            return View::make('holes.create')->with(['course'=>$course, 'total'=>$total]);
        }


	}

	public function store()
	{
        $number = Input::get('hidden_holes');
        $course_id = Input::get('course_id');
        $par = 0;
        $x = 0;
       // dd($course_id);

        for($i = 1; $i <= $number; $i++){

        $hole = new Hole();
        $hole->number = Input::get('number-'.$i.'');
        $hole->length = Input::get('length-'.$i.'');
        $hole->par = Input::get('par-'.$i.'');
        $hole->course_id = $course_id;
        $hole->save();

    };
        $course = Course::whereId($course_id)->firstOrFail();
        $course->par = Hole::where('course_id', $hole->course_id)->sum('par');
        $course->save();

        return Redirect::to('/admin/course');

	}

	public function show($id)
	{
		$hole = Hole::with('shot')->whereId($id)->firstOrFail();

        return View::make('holes.show', ['hole'=>$hole]);
	}

	public function edit($id)
	{
        $hole = Hole::whereId($id)->firstOrFail();

        return View::make('holes.edit', ['hole'=>$hole]);
	}

	public function update($id)
	{
        $hole = Hole::whereId($id)->firstOrFail();
        $y = Input::get('hole_par');
        $x = Input::get('course_id');
        $id = $x;

        if(is_null($hole)){
            return Redirect::route('/admin/course');
        }else {
            $hole->number = Input::get('number');
            $hole->length = Input::get('length');
            $hole->par = Input::get('par');
            $hole->course_id = Input::get('course_id');

            $hole->save();

            $course = Course::whereId($id)->firstOrFail();
            $course->par = Hole::where('course_id', $hole->course_id)->sum('par');
            $course->save();

            $detail = new Detail;
            $detail->ob = Input::get('ob');
            $detail->hole_id = $id;
            $detail->save();

            $hole->detail()->save($detail);

            return Redirect::to('/admin/course');
        }
	}

	public function destroy($id)
	{
        $hole = Hole::whereId($id)->firstOrFail();
        $hole->delete();

        return Redirect::back()->withFlashMessage('Hole deleted!');
	}


}
