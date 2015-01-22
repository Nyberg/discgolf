<?php

class HomeController extends BaseController {

    public function index(){

        if(Auth::check()){

            $rounds = Round::where('status', 1)->limit(6)->get();
            $reviews = Review::with('course')->limit(5)->get();

            return View::make('index.loggedin', ['rounds'=>$rounds, 'reviews'=>$reviews]);
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
        return View::make('index.links');
    }

    public function discgolf(){
        return View::make('index.discgolf');
    }

    public function about(){
        return View::make('index.about');
    }

}
