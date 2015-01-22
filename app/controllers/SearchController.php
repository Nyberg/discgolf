<?php

class SearchController extends Controller {

    public function index()
    {
    }


    public function query()
	{
		$s = Input::get('term');

        $courses = Course::where('name', 'LIKE', "%$s%")->orWhere('city', 'LIKE', "%$s%")->orWhere('state', 'LIKE', "%$s%")->orWhere('country', 'LIKE', "%$s%")->get();

        $result = [];

        foreach($courses as $course)
        {
            $result[] = $course->name;
        }

        return Response::json($result);

	}

    public function searchResult(){

        try{
            $result = Input::get('auto');
            $courses = Course::where('name', 'LIKE', "%$result%")->orWhere('city', 'LIKE', "%$result%")->orWhere('state', 'LIKE', "%$result%")->orWhere('country', 'LIKE', "%$result%")->get();
        }catch(ModelNotFoundException $e){
            return Response::view('errors.404',[], 404);
        }

        if(count($courses) == 0){
            return View::make('errors.query', ['result'=>$result]);
        }

        if(count($courses) == 1){

            $course = Course::where('name', 'LIKE', "%$result%")->orWhere('city', 'LIKE', "%$result%")->orWhere('state', 'LIKE', "%$result%")->orWhere('country', 'LIKE', "%$result%")->firstOrFail();

          return Redirect::to('/course/'.$course->id.'/show');

        }if(count($courses) > 1){

            $objects = [];
            $objs = Course::where('name', 'LIKE', "%$result%")->orWhere('city', 'LIKE', "%$result%")->orWhere('state', 'LIKE', "%$result%")->orWhere('country', 'LIKE', "%$result%")->get();

            foreach($objs as $obj)
            {
                $x = Course::whereId($obj->id)->firstOrFail();
                $objects[] = $x->id;
            }

            return Redirect::to('/search/'.$result.'');

        }
    }

    public function search($result){

        $courses = Course::where('name', 'LIKE', "%$result%")->orWhere('city', 'LIKE', "%$result%")->orWhere('state', 'LIKE', "%$result%")->orWhere('country', 'LIKE', "%$result%")->paginate(3);
        $y = Course::where('name', 'LIKE', "%$result%")->orWhere('city', 'LIKE', "%$result%")->orWhere('state', 'LIKE', "%$result%")->orWhere('country', 'LIKE', "%$result%")->get();
        $num = count($y);

        return View::make('search.search', compact('courses'))->with(['num'=>$num, 'result'=>$result]);
    }

}

