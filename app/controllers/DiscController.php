<?php

class DiscController extends \BaseController {

	public function store()
	{
        $id = Input::get('id');
		$disc = New disc();

        $disc->name = Input::get('name');
        $disc->author = Input::get('author');
        $disc->plastic = Input::get('plastic');
        $disc->weight = Input::get('weight');
        //$disc->condition = Input::get('condition');
        $disc->bag_id = Input::get('id');
        $disc->type = Input::get('type');
        $disc->mixed = $disc->plastic . ' ' . $disc->name . ' ' . $disc->weight . 'g';

        $disc->save();
        $bag = Bag::whereId($id)->firstOrFail();
        $bag->discs++;

        $bag->save();

        return Redirect::back()->with('success', 'Disc '.$disc->name.' tillagd i ' .$bag->type.'!');

	}

	public function update($id)
	{
		$disc = Disc::whereId($id)->firstOrFail();

        if($disc){

            $disc->name = Input::get('name');
            $disc->author = Input::get('author');
            $disc->plastic = Input::get('plastic');
            $disc->weight = Input::get('weight');
            //$disc->condition = Input::get('condition');
            $disc->bag_id = Input::get('bag_id');
            $disc->type = Input::get('type');
            $disc->mixed = $disc->plastic . ' ' . $disc->name . ' ' . $disc->weight . 'g';

            $disc->save();

            return Redirect::back()->with('success', 'Disc '.$disc->name.' uppdaterad!');

        }else{
            return Redirect::back()->with('danger', 'Något gick snett..');
        }
	}

	public function destroy($id)
	{
		$disc = Disc::whereId($id)->firstOrFail();

        $disc->delete();

        $bag = Bag::whereId($disc->bag_id)->firstOrFail();

        $bag->discs--;

        $bag->save();

        return Redirect::back()->with('success', 'Disc '.$disc->name.' borttagen!');

	}


}
