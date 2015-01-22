<?php

class RoleController extends \BaseController {

	public function store()
	{
        $id = Input::get('id');
        $role = Input::get('role');
		$user = User::whereId($id)->firstOrFail();

        $user->attachRole($role);

        return Redirect::back()->with('success', 'Rättighet tillagd');
	}

	public function destroy($id)
	{
        $user_id = Input::get('user');
        $user = User::whereId($user_id)->firstOrFail();

        $user->roles()->detach($id);

        return Redirect::back()->with('success', 'Rättighet borttagen');
	}


}
