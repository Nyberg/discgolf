<?php

use dg\Forms\addBagForm;

class BagController extends \BaseController {

    private $addBagForm;

    public function __construct(AddBagForm $addBagForm){

        $this->addBagForm = $addBagForm;
    }

	public function index()
	{
		$bags = Bag::with('user')->get();

        return View::make('bag.index', ['bags'=>$bags]);
	}

    public function user($id){

        $bags = Bag::with('disc')->where('user_id', $id)->get();

        return View::make('bag.user', ['bags'=>$bags]);

    }

	public function create()
	{
		return View::make('bag.add');
	}

	public function store()
	{
        $this->addBagForm->validate($input = Input::only('type'));

		$bag = new Bag;

        $bag->type = Input::get('type');
        $bag->user_id = Auth::id();

        $bag->save();

        return Redirect::to('/account/user/'.Auth::user()->id.'/bags')->with('success', 'Bag tillagd!');

	}

	public function show($id)
	{
		$bag = Bag::whereId($id)->firstOrFail();

        return View::make('bag.show', ['bag'=>$bag]);
	}

	public function edit($id)
	{
		$bag = Bag::with('disc')->whereId($id)->firstOrFail();

        return View::make('bag.edit', ['bag'=>$bag]);
	}

	public function update($id)
    {
        $this->addBagForm->validate($input = Input::only('type'));

		$bag = Bag::whereId($id)->firstOrFail();

        $bag->type = Input::get('type');
        $bag->save();

        return Redirect::to('/account/user/'.Auth::user()->id.'/bags')->with('success', 'Bag updated!');
	}

	public function destroy($id)
	{
        $bag = Bag::whereId($id)->firstOrFail();
        $bag->delete();

        return Redirect::back()->with('success', 'Bag ' . $bag->type . ' deleted!');
	}


}
