<?php

use dg\statistics\Stat;
use Khill\Lavacharts\Lavacharts;

class HoleController extends \BaseController {

    /**
     * @var Stat
     */
    private $stat;

    public function __construct(Stat $stat){

        $this->stat = $stat;
    }

	public function index()
	{
		//
	}

	public function create($course_id, $id)
	{
        $course = Course::whereId($course_id)->firstOrFail();
        $tee = Tee::with('hole')->whereId($id)->firstOrFail();


        $number = Hole::whereTeeId($id)->count();
        $holes = Tee::whereId($id)->pluck('holes');

        $total = $holes - $number;

        if(is_null($course)){
            return Redirect::to('/admin/course');
        }else{

            return View::make('holes.create')->with(['course'=>$course, 'total'=>$total, 'number'=>$number, 'tee'=>$tee]);
        }


	}

	public function store()
	{
        $hidden_holes = Input::get('hidden_holes');
        $course_id = Input::get('course_id');
        $number = Input::get('number');
        $id = Input::get('id');

        for($i = $number+1; $i <= $hidden_holes; $i++){

        $hole = new Hole();
        $hole->number = Input::get('number-'.$i.'');
        $hole->length = Input::get('length-'.$i.'');
        $hole->par = Input::get('par-'.$i.'');
        $hole->tee_id = $id;
        $hole->course_id = $course_id;
        $hole->image = '/img/ipad.png';  # This needs to be changed later #
        $hole->save();

            $detail = new Detail;
            $detail->ob = Input::get('ob');
            $detail->hole_id = $hole->id;
            $detail->save();

            $hole->detail()->save($detail);

    };
        $tee = Tee::whereId($id)->firstOrFail();
        $tee->par = Hole::where('tee_id', $hole->tee_id)->sum('par');
        $tee->status = 1;
        $tee->save();

        return Redirect::to('/dashboard')->with('success', 'Hål tillagda!');

	}

	public function show($id)
	{
		$hole = Hole::with('shot')->whereId($id)->firstOrFail();
        $data = Score::where('hole_id', $id)->get();
        $scores = Score::where('hole_id', $id)->limit(10)->get();

        $avg = $this->stat->getAvgScore($data);

        return View::make('holes.show', ['hole'=>$hole, 'scores'=>$scores, 'avg'=>$avg]);
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
        $x = Input::get('tee_id');
        $id = $x;

        if(is_null($hole)){
            return Redirect::route('/admin/course');
        }else {
            $hole->number = Input::get('number');
            $hole->length = Input::get('length');
            $hole->par = Input::get('par');
            $hole->tee_id = Input::get('tee_id');
            $hole->check = Input::get('check');

            if(Input::hasFile('file')){

                try{

                    $file = Input::file('file');

                    $filepath = '/img/dg/course/holes/';
                    $filename = time() . '-hole'.$hole->id.'.jpg';

                    $file = $file->move(public_path($filepath), ($filename));
                    $hole->image = $filepath.$filename;

                }catch(Exception $e){

                    return Redirect::back()->with('danger', 'Något gick snett!');

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

            $tee = Tee::whereId($id)->firstOrFail();
            $tee->par = Hole::where('tee_id', $hole->tee_id)->sum('par');
            $tee->save();

            return Redirect::back()->with('success','Hål uppdaterat!');
        }
	}

	public function destroy($id)
	{
        $hole = Hole::whereId($id)->firstOrFail();
        $hole->delete();

        $rounds = Round::with('score')->where('course_id', $hole->course_id)->get();
        $scores = Score::where('hole_id', $id)->get();


        foreach ($scores as $score) {
            $score->delete();
        }

        foreach($rounds as $round) {
            $round = Round::whereId($round->id)->firstOrFail();
            $round->total = Score::where('round_id', $round->id)->sum('score');
            $round->save();
        }

        $course = Course::whereId($hole->course_id)->firstOrFail();
        $course->par = Hole::where('course_id', $hole->course_id)->sum('par');
        $course->save();

        return Redirect::back()->with('success', 'Hål raderat!');
	}

    public function getHoles(){

        $holes = Hole::where('course_id', Input::get('id'))->get();

        return Response::json($holes);
    }

    # Första charten #
    public function getUserData()
    {
        $id = Input::get('id');
        $model = Input::get('model');
        $user = User::find($id);

        $name = $user->first_name . ' ' . $user->last_name;

        if($model == 'hole'){
            $scores = Score::where('hole_id', $id)->get();
        }
        if($model == 'user'){
            $scores = Score::where('user_id', $id)->get();
            $courses_played = Round::where('user_id', $id)->lists('tee_id');
            $datarounds = Round::with('score')->where('user_id', $id)->where('status', 1)->orWhere('par_id',$id)->get();

            $data = $this->stat->calc($scores);
            $shots = $this->stat->calcShots($scores);
            $cp = $this->stat->getCourses($courses_played);
            $bfr = $this->stat->getBfr($datarounds);
            $avg = $this->stat->getAvg($scores, $datarounds);
            $birdies = $this->stat->getBirdies($datarounds);

        }

        $message = [
            'msg' => 'success',
            'user' => $name,
            'avg' => $avg,
            'shots' => $shots,
            'cp'    => count($cp),
            'bfr'   => $bfr,
            'birdies' => $birdies,
            'rounds'    => count($user->round)

        ];

        return Response::json($message);

    }

    # Första charten #
    public function getUserDataReload()
    {
        $id = Input::get('id');
        $model = Input::get('model');

        $user = User::find($id);

        $name = $user->first_name . ' ' . $user->last_name;

        if($model == 'course'){
            $scores = Score::where('course_id', $id)->get();
        }
        if($model == 'hole'){
            $scores = Score::where('hole_id', $id)->get();
        }
        if($model == 'user'){
            $scores = Score::where('user_id', $id)->get();
            $courses_played = Round::where('user_id', $id)->lists('tee_id');
            $datarounds = Round::with('score')->where('user_id', $id)->where('status', 1)->orWhere('par_id',$id)->get();

            $data = $this->stat->calc($scores);
            $shots = $this->stat->calcShots($scores);
            $cp = $this->stat->getCourses($courses_played);
            $bfr = $this->stat->getBfr($datarounds);
            $avg = $this->stat->getAvg($scores, $datarounds);
            $birdies = $this->stat->getBirdies($datarounds);

        }

        $message = [
            'msg' => 'success',
            'user' => $name,
            'avg' => $avg,
            'shots' => $shots,
            'cp'    => count($cp),
            'bfr'   => $bfr,
            'birdies' => $birdies,
            'rounds'    => count($user->round)

        ];

        return Response::json($message);

    }

    #   Personlig statistik #
    public function getStats()
    {

        $input = Input::all();

        if($input['model'] == 'hole'){
            $hole = Hole::where('id', $input['id'])->firstOrFail();
            $scores = Score::where('hole_id', $input['id'])->where('user_id', Auth::id())->get();
            $rounds = Round::where('user_id', Auth::id())->where('tee_id', $hole->tee_id)->orWhere('par_id', Auth::id())->where('status', 1)->get();
        }
        if($input['model'] == 'course'){
            $scores = Score::where('course_id', $input['id'])->where('user_id', Auth::id())->get();
            $rounds = Round::where('course_id', $input['id'])->where('user_id', Auth::id())->get();
        }
        if($input['model'] == 'user'){
            $scores = Score::where('user_id', $input['id'])->get();
            $rounds = Round::where('user_id', $input['id'])->get();
        }

        $stats = $this->stat->calc($scores);
        $avg = $this->stat->getAvgScore($scores);

        $message = [
            'msg' => 'success',
            'avg' => $avg['avg'],
            'shots' => $avg['shots'],
            'results' => count($scores),
            'rounds'    => count($rounds),
            'ace'   => $stats['ace'],
            'eagle'   => $stats['eagle'],
            'birdie'   => $stats['birdie'],
            'par'   => $stats['par'],
            'bogey'   => $stats['bogey'],
            'dblbogey'   => $stats['dblbogey'],
            'trpbogey'   => $stats['trpbogey'],
            'quad'   => $stats['quad']
        ];

        return Response::json($message);

    }

    # Första charten #
    public function getHoleStats()
    {
        $id = Input::get('id');
        $model = Input::get('model');
        $user = User::find(Auth::id());

        $name = $user->first_name + ' ' + $user->last_name;

        if($model == 'course'){
            $scores = Score::where('course_id', $id)->get();
        }
        if($model == 'hole'){
            $scores = Score::where('hole_id', $id)->get();
        }
        if($model == 'user'){
            $scores = Score::where('user_id', $id)->get();
        }

        $stats = $this->stat->calc($scores);
        $avg = $this->stat->getAvgScore($scores);

        $message = [
            'msg' => 'success',
            'user' => $name,
            'avg' => $avg['avg'],
            'shots' => $avg['shots'],
            'results' => count($scores),
            'ace'   => $stats['ace'],
            'eagle'   => $stats['eagle'],
            'birdie'   => $stats['birdie'],
            'par'   => $stats['par'],
            'bogey'   => $stats['bogey'],
            'dblbogey'   => $stats['dblbogey'],
            'trpbogey'   => $stats['trpbogey'],
            'quad'   => $stats['quad']
        ];

        return Response::json($message);

    }

    # Andra charten #
    public function getRoundsPerMonth()
    {
        $id = Input::get('id');
        $model = Input::get('model');

        $user = User::whereId($id)->firstOrFail();
        $name = $user->first_name . ' ' . $user->last_name;


        if($model == 'user'){
            $rounds = Round::where('user_id', $id)->get();

            $stats = $this->stat->getRoundsPerMonth($rounds);
            $message = [
                'msg' => 'success',
                'user' => $name,
                'jan'  =>  $stats['jan'],
                'feb'   => $stats['feb'],
                'mar'   => $stats['mar'],
                'apr'   => $stats['apr'],
                'maj'   => $stats['maj'],
                'jun'   => $stats['jun'],
                'jul'   => $stats['jul'],
                'aug'   => $stats['aug'],
                'sep'   => $stats['sep'],
                'okt'   => $stats['okt'],
                'nov'   => $stats['nov'],
                'dec'   => $stats['dec'],
            ];

        }
        if($model == 'course'){
            $rounds = Round::where('course_id', $id)->get();
            $user_rounds = Round::where('user_id', Auth::id())->where('course_id', $id)->get();
            $course = Course::whereId($id)->firstOrFail();
            $course = $course->name;

            $stats = $this->stat->getRoundsPerMonth($rounds);
            $data = $this->stat->getRoundsPerMonth($user_rounds);
            $message = [
                'msg' => 'success',
                'user' => $name,
                'model_name' => $course,
                'jan'  =>  $stats['jan'],
                'feb'   => $stats['feb'],
                'mar'   => $stats['mar'],
                'apr'   => $stats['apr'],
                'maj'   => $stats['maj'],
                'jun'   => $stats['jun'],
                'jul'   => $stats['jul'],
                'aug'   => $stats['aug'],
                'sep'   => $stats['sep'],
                'okt'   => $stats['okt'],
                'nov'   => $stats['nov'],
                'dec'   => $stats['dec'],
                'u_jan'  =>  $data['jan'],
                'u_feb'   => $data['feb'],
                'u_mar'   => $data['mar'],
                'u_apr'   => $data['apr'],
                'u_maj'   => $data['maj'],
                'u_jun'   => $data['jun'],
                'u_jul'   => $data['jul'],
                'u_aug'   => $data['aug'],
                'u_sep'   => $data['sep'],
                'u_okt'   => $data['okt'],
                'u_nov'   => $data['nov'],
                'u_dec'   => $data['dec'],
            ];
        }



        return Response::json($message);

    }

    # Andra charten #
    public function getCourseRoundsReload()
    {
        $id = Input::get('id');
        $model = Input::get('model');

        $user = User::whereId($id)->firstOrFail();
        $name = $user->first_name . ' ' . $user->last_name;

        if($model == 'course'){
            $rounds = Round::where('course_id', $id)->get();
            $user_rounds = Round::where('user_id', Auth::id())->where('course_id', $id)->get();
            $course = Course::whereId($id)->firstOrFail();
            $course = $course->name;

            $stats = $this->stat->getRoundsPerMonth($rounds);
            $data = $this->stat->getRoundsPerMonth($user_rounds);
            $message = [
                'msg' => 'success',
                'user' => $name,
                'model_name' => $course,
                'jan'  =>  $stats['jan'],
                'feb'   => $stats['feb'],
                'mar'   => $stats['mar'],
                'apr'   => $stats['apr'],
                'maj'   => $stats['maj'],
                'jun'   => $stats['jun'],
                'jul'   => $stats['jul'],
                'aug'   => $stats['aug'],
                'sep'   => $stats['sep'],
                'okt'   => $stats['okt'],
                'nov'   => $stats['nov'],
                'dec'   => $stats['dec'],
                'u_jan'  =>  $data['jan'],
                'u_feb'   => $data['feb'],
                'u_mar'   => $data['mar'],
                'u_apr'   => $data['apr'],
                'u_maj'   => $data['maj'],
                'u_jun'   => $data['jun'],
                'u_jul'   => $data['jul'],
                'u_aug'   => $data['aug'],
                'u_sep'   => $data['sep'],
                'u_okt'   => $data['okt'],
                'u_nov'   => $data['nov'],
                'u_dec'   => $data['dec'],
            ];
        }



        return Response::json($message);

    }

    # Andra charten #
    public function getRoundsPerMonthReload()
    {
        $id = Input::get('id');
        $model = Input::get('model');

        $user = User::whereId($id)->firstOrFail();
        $name = $user->first_name . ' ' . $user->last_name;

        if($model == 'user'){

            $rounds = Round::where('user_id', $id)->get();

        }

            $stats = $this->stat->getRoundsPerMonth($rounds);
            $message = [
                'msg' => 'success',
                'user' => $name,
                'jan'  =>  $stats['jan'],
                'feb'   => $stats['feb'],
                'mar'   => $stats['mar'],
                'apr'   => $stats['apr'],
                'maj'   => $stats['maj'],
                'jun'   => $stats['jun'],
                'jul'   => $stats['jul'],
                'aug'   => $stats['aug'],
                'sep'   => $stats['sep'],
                'okt'   => $stats['okt'],
                'nov'   => $stats['nov'],
                'dec'   => $stats['dec'],
            ];

        return Response::json($message);

    }

    # Andra charten #
    public function getRoundAvgScore()
    {
        $id = Input::get('id');
        $model = Input::get('model');

        $round = Round::find($id);


        if($model == 'round') {

            $tee = Tee::where('id', $round->tee_id)->firstOrFail();
            $tees = Tee::with('round')->where('id', $round->tee_id)->get();
            $round = Round::where('id', $round->id)->firstOrFail();
          #  $user_rounds = Round::where('tee_id', $round->tee_id)->where('user_id', Auth::id())->get();
            $stats = $this->stat->generateRound($round, $tee);
            $avg = $this->stat->generateAvg($tees);
        }


          #  $user = $this->stat->generateUserAvg($tee, $user_rounds);

            $message = [
                'msg' => 'success',
                'holes' => $tee->holes,
                '1'  =>  $stats['1'],
                '2'   => $stats['2'],
                '3'   => $stats['3'],
                '4'   => $stats['4'],
                '5'   => $stats['5'],
                '6'   => $stats['6'],
                '7'   => $stats['7'],
                '8'   => $stats['8'],
                '9'   => $stats['9'],
                '10'   => $stats['10'],
                '11'   => $stats['11'],
                '12'   => $stats['12'],
                '13'   => $stats['13'],
                '14'   => $stats['14'],
                '15'   => $stats['15'],
                '16'   => $stats['16'],
                '17'   => $stats['17'],
                '18'   => $stats['18'],
                'a1'   => $avg[$tee->id]['1'],
                'a2'   => $avg[$tee->id]['2'],
                'a3'   => $avg[$tee->id]['3'],
                'a4'   => $avg[$tee->id]['4'],
                'a5'   => $avg[$tee->id]['5'],
                'a6'   => $avg[$tee->id]['6'],
                'a7'   => $avg[$tee->id]['7'],
                'a8'   => $avg[$tee->id]['8'],
                'a9'   => $avg[$tee->id]['9'],
                'a10'   => $avg[$tee->id]['10'],
                'a11'   => $avg[$tee->id]['11'],
                'a12'   => $avg[$tee->id]['12'],
                'a13'   => $avg[$tee->id]['13'],
                'a14'   => $avg[$tee->id]['14'],
                'a15'   => $avg[$tee->id]['15'],
                'a16'   => $avg[$tee->id]['16'],
                'a17'   => $avg[$tee->id]['17'],
                'a18'   => $avg[$tee->id]['18'],
              /*  'u1'    => $user[$tee->id]['1'],
                'u2'    => $user[$tee->id]['2'],
                'u3'    => $user[$tee->id]['3'],
                'u4'    => $user[$tee->id]['4'],
                'u5'    => $user[$tee->id]['5'],
                'u6'    => $user[$tee->id]['6'],
                'u7'    => $user[$tee->id]['7'],
                'u8'    => $user[$tee->id]['8'],
                'u9'    => $user[$tee->id]['9'],
                'u10'    => $user[$tee->id]['10'],
                'u11'    => $user[$tee->id]['11'],
                'u12'    => $user[$tee->id]['12'],
                'u13'    => $user[$tee->id]['13'],
                'u14'    => $user[$tee->id]['14'],
                'u15'    => $user[$tee->id]['15'],
                'u16'    => $user[$tee->id]['16'],
                'u17'    => $user[$tee->id]['17'],
                'u18'    => $user[$tee->id]['18'], */
            ];

        return Response::json($message);

    }

    # Andra charten #
    public function getRoundAvg()
    {
        $id = Input::get('id');
        $model = Input::get('model');

        $round = Round::find($id);


        if($model == 'course') {

        $rounds = Round::where('course_id',$id)->limit(5)->get();

        }
        if($model == 'user'){
            $rounds = Round::where('user_id',$id)->limit(5)->get();
        }

        $stats = $this->stat->roundAvg($rounds);

        $message = [
            'msg' => 'success',
            '1'  =>  $stats['1'],
            '2'   => $stats['2'],
            '3'   => $stats['3'],
            '4'   => $stats['4'],
            '5'   => $stats['5'],
            'd1'   => $stats['date-1'],
            'd2'   => $stats['date-2'],
            'd3'   => $stats['date-3'],
            'd4'   => $stats['date-4'],
            'd5'   => $stats['date-5'],
        ];

        return Response::json($message);

    }


}
