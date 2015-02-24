<?php

use dg\statistics\Stat;

class HomeController extends BaseController {

    /**
     * @var Stat
     */
    private $stat;

    public function __construct(Stat $stat){

        $this->stat = $stat;
    }

    public function index(){

        if(Auth::check()){

            $rounds = Round::where('status', 1)->limit(5)->get();
            $reviews = Review::with('course')->limit(5)->get();

            return View::make('index.loggedin', ['rounds'=>$rounds, 'reviews'=>$reviews]);
        }else{
            return View::make('session.create');
        }
    }

    public function dashboard(){
        $id = Auth::User()->id;
        $user = User::with('profile')->whereId($id)->firstOrFail();
        $rounds = Round::where('user_id', $id)->count();
        $club = Club::whereId(Auth::user()->club_id)->firstOrFail();
        return View::make('dashboard.dashboard', ['user'=>$user, 'rounds'=>$rounds, 'club'=>$club]);
    }

    public function rules(){
        return View::make('index.rules');
    }

    public function links(){

        $links = Link::get();

        return View::make('index.links', ['links'=>$links]);
    }

    public function discgolf(){
        return View::make('index.discgolf');
    }

    public function about(){
        return View::make('index.about');
    }

    public function about_pp(){
        return View::make('index.aboutpp');
    }

    public function discdb(){
        return View::make('index.discdb');
    }

    public function stats(){

        $rounds = Round::get();
        $stats = $this->stat->holeAvgStats($rounds);

        $courses = Course::get();

      #  dd(Response::json($stats));



        return View::make('index.stats', ['courses'=>$courses]);
    }

}
