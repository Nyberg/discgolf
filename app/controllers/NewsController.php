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

    public function admin(){
        $news = News::get();
        return View::make('admin.news', ['news'=>$news]);
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
        $news->user_id = Auth::id();

        if(Input::hasFile('file')) {

            try {
                $file = Input::file('file');
                $filepath = '/img/news/';
                $filename = time() . '-news.png';
                $file = $file->move(public_path($filepath), ($filename));
                $news->image = $filepath.$filename;
                $img = Image::make(public_path($news->image));
                $img->save();
            }
            catch(Exception $e) {
                return 'Något gick snett mannen: ' .$e;
            }
        }

        $news->save();

        return Redirect::to('/admin/news')->with('success', 'Nyhet sparad!');

	}

	public function show($id)
	{
		$news = News::find($id);

        $news->views++;
        $news->save();

        $alls = News::orderBy('views', 'desc')->limit(10)->get();

        return View::make('news.show', ['news'=>$news, 'alls'=>$alls]);
	}

	public function edit($id)
	{
        $news = News::find($id);
        if(Auth::id() == $news->user_id){

            return View::make('news.edit', ['news'=>$news]);
        }
        return Redirect::back()->with('danger', 'Du har inte rättigheter för detta..');
	}

	public function update($id)
	{
        $this->newsForm->validate($input = Input::all());

        $news = News::find($id);

        if(Auth::id() == $news->user_id) {

            $news->head = Input::get('head');
            $news->body = Input::get('body');

            $news->save();

            return Redirect::to('/admin/news')->with('success', 'Nyhet uppdaterad!');
        }else{
            return Redirect::back()->with('danger', 'Du har inte rättigheter för detta..');
        }
	}


	public function destroy($id)
	{
		$new = News::whereId($id)->firstOrFail();

        if(Auth::id() == $new->user_id){

            $new->delete();

            return Redirect::back()->with('success', 'Nyhet borttagen!');
        }else{

            return Redirect::back()->with('danger', 'Du har inte rättigheter för detta..');
        }
	}


}
