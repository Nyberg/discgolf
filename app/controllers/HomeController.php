<?php

class HomeController extends BaseController {

    public function index(){

        if(Auth::check()){

            $date = date('Y-m-d', strtotime('-2 week'));

            $rounds = Round::where('status', 1)->orderBy('date', 'desc')->limit(8)->get();
            $reviews = Review::with('course')->limit(3)->get();
            $news = News::orderBy('created_at', 'desc')->limit(6)->get();
            $num = Round::where('status', 1)->where('date', '>=' , $date)->orderBy('created_at', 'desc')->count();
            $latest = User::orderBy('created_at', 'desc')->limit(1)->first();

            return View::make('index.loggedin', ['rounds'=>$rounds, 'reviews'=>$reviews, 'news'=>$news, 'num'=>$num, 'latest'=>$latest]);
        }else{
            return View::make('index.startsida');
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

    public function membership(){
        return View::make('index.medlemskap');
    }

    public function design(){
        return View::make('index.design');
    }

}
