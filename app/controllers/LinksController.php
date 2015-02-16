<?php

class LinksController extends \BaseController {

	public function index()
	{
		$links = Link::get();

        return View::make('index.links', ['links'=>$links]);
	}

    public function admin()
    {
        $links = Link::get();

        return View::make('links.index', ['links'=>$links]);
    }

	public function create()
	{
		return View::make('links.create');
	}

	public function store()
	{
		$link = new Link;

        $link->views = 0;
        $link->clicks = 0;
        $link->name = Input::get('name');
        $link->url  = Input::get('link');
        $link->type = Input::get('type');

        $link->save();

        return Redirect::to('/admin/links')->with('success', 'Länk sparad!');
	}


	public function show($id)
	{
		//
	}

	public function edit($id)
	{
		//
	}

	public function update($id)
	{
		//
	}

	public function destroy($id)
	{
		$link = Link::find($id);
        $link->delete();

        return Redirect::back()->with('success', 'Länk borttagen!');
	}


}
