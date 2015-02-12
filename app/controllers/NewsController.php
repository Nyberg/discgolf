<?php

use dg\Forms\NewsForm;

class NewsController extends Controller {

    private $newsForm;

    public function __construct(NewsForm $newsForm){

        $this->newsForm = $newsForm;
    }

	public function index()
	{
		//
	}

	public function create()
	{
        if(Auth::user()->hasRole('ClubOwner')){
            return View::make('news.create');
        }else{
            return Redirect::back()->with('danger', 'Du har inte rättigheter för detta..');
        }

	}

	public function store()
	{

        $this->newsForm->validate($input = Input::all());

		$news = new News();

        $news->head = Input::get('head');
        $news->body = Input::get('body');
        $news->views = 0;
        $news->club_id = Auth::user()->club_id;

        $news->save();

        return Redirect::to('/club/'.Auth::user()->club_id.'/show')->with('success', 'Nyhet sparad!');

	}

	public function show($id)
	{
		$news = News::find($id);

        $news->views++;
        $news->save();

        return View::make('news.show', ['news'=>$news]);
	}

	public function edit($id)
	{
        $news = News::find($id);
        if(Auth::user()->hasRole('ClubOwner') && Auth::user()->club_id == $news->club_id){

            return View::make('news.edit', ['news'=>$news]);
        }
        return Redirect::back()->with('danger', 'Du har inte rättigheter för detta..');
	}

	public function update($id)
	{
        $this->newsForm->validate($input = Input::all());

        $news = News::find($id);

        $news->head = Input::get('head');
        $news->body = Input::get('body');

        $news->save();

        return Redirect::to('/club/'.Auth::user()->club_id.'/show')->with('success', 'Nyhet uppdaterad!');
	}


	public function destroy($id)
	{
		$new = News::whereId($id)->firstOrFail();

        if(Auth::user()->hasRole('ClubOwner') && $new->club_id == Auth::user()->club_id){

            $new->delete();

            return Redirect::to('/dashboard')->with('success', 'Nyhet borttagen!');
        }else{
            $new->delete();

            return Redirect::back()->with('danger', 'Du har inte rättigheter för detta..');
        }
	}


}
