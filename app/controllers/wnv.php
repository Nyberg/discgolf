public function store($id)
{
$club = Club::find($id);
$user = User::find(Auth::id());

$request = New request;

$request->club_id = $club->id;
$request->user_id = $user->id;

$request->save();

return Redirect::back()->with('headsup', 'Din förfrågan är skickad!');

}
