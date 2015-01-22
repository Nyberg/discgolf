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
            return Redirect::to('/admin/course');
        }else{

            return View::make('holes.create')->with(['course'=>$course, 'total'=>$total, 'number'=>$number]);
        }


	}

	public function store()
	{
        $hidden_holes = Input::get('hidden_holes');
        $course_id = Input::get('course_id');
        $number = Input::get('number');

        for($i = $number+1; $i <= $hidden_holes; $i++){

        $hole = new Hole();
        $hole->number = Input::get('number-'.$i.'');
        $hole->length = Input::get('length-'.$i.'');
        $hole->par = Input::get('par-'.$i.'');
        $hole->course_id = $course_id;
        $hole->image = '/img/ipad.png';  # This needs to be changed later #
        $hole->save();

            $detail = new Detail;
            $detail->ob = Input::get('ob');
            $detail->hole_id = $hole->id;
            $detail->save();

            $hole->detail()->save($detail);

    };
        $course = Course::whereId($course_id)->firstOrFail();
        $course->par = Hole::where('course_id', $hole->course_id)->sum('par');
        $course->status = 1;
        $course->save();

        return Redirect::to('/admin/course')->with('success', 'Holes added!');

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
        $old = Hole::whereId($id)->firstOrFail();
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
            $hole->check = Input::get('check');

            if(Input::hasFile('file')){

                try{

                    $file = Input::file('file');

                    $filepath = '/img/dg/course/holes/';
                    $filename = time() . '-hole'.$hole->id.'.jpg';

                    $file = $file->move(public_path($filepath), ($filename));
                    $hole->image = $filepath.$filename;

                }catch(Exception $e){

                    return Redirect::back()->with('danger', 'Something went wrong!');

                }
            }

            $hole->save();

            $img = Image::make(public_path($hole->image))->resize(400,550);

            $img->save();

            $img->destroy();

                if($old->image == '/img/ipad.png'){

                }else{
                    File::delete(public_path().$old->image);
                }

            $detail = Detail::whereId($hole->id)->firstOrFail();

            $detail->ob = Input::get('ob');
            $detail->save();

            $course = Course::whereId($id)->firstOrFail();
            $course->par = Hole::where('course_id', $hole->course_id)->sum('par');
            $course->save();

            return Redirect::to('/admin/course/'.$hole->course_id.'/edit')->with('success','Hål uppdaterat!');
        }
	}

	public function destroy($id)
	{
        $hole = Hole::whereId($id)->firstOrFail();
        $hole->delete();

        return Redirect::back()->with('success', 'Hole deleted!');
	}


}
