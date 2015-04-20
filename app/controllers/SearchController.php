<?php

class SearchController extends Controller {

    public function index()
    {
    }


    public function query()
	{
		$s = Input::get('term');

        $courses = Course::where('name', 'LIKE', "%$s%")->get();

        $result = [];

        foreach($courses as $course)
        {
            $result[] = $course->name;
        }

        return Response::json($result);

	}

    public function searchPlayer()
    {
        $s = Input::get('term');

        $players = User::where('first_name', 'LIKE', "%$s%")->orWhere('last_name', 'LIKE', "%$s%")->get();

        $result = [];

        foreach($players as $player)
        {
            $result[] = $player->first_name . ' ' . $player->last_name;
        }

        return Response::json($result);

    }

    public function searchResult(){

        try{
            $result = Input::get('auto');
            $courses = Course::where('name', 'LIKE', "%$result%")->get();
        }catch(ModelNotFoundException $e){
            return Response::view('errors.404',[], 404);
        }

        if(count($courses) == 0){
            return View::make('errors.query', ['result'=>$result]);
        }

        if(count($courses) == 1){

            $course = Course::where('name', 'LIKE', "%$result%")->firstOrFail();

          return Redirect::to('/course/'.$course->id.'/show');

        }if(count($courses) > 1){

            $objects = [];
            $objs = Course::where('name', 'LIKE', "%$result%")->get();
            foreach($objs as $obj)
            {
                $x = Course::whereId($obj->id)->firstOrFail();
                $objects[] = $x->id;
            }

            return Redirect::to('/search/'.$result.'');

        }
    }

    public function search($result){

        $courses = Course::where('name', 'LIKE', "%$result%")->get();
        $y = Course::where('name', 'LIKE', "%$result%")->get();
        $num = count($y);

        return View::make('search.search', compact('courses'))->with(['num'=>$num, 'result'=>$result]);
    }

}

