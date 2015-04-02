<?php

use dg\Records\PostRecordsCommand;
use dg\Rounds\ActiveRoundCommand;

class RecordsController extends \BaseController {

	public function index()
	{
		//
	}

	public function store($id)
	{

        $round = Round::whereId($id)->firstOrFail();

        if(Auth::id() == $round->user_id) {

            $id = $round->id;

            $command = new ActiveRoundCommand($id);

            $this->CommandBus->execute($command);

            $user_id = Auth::id();
            $course_id = $round->course_id;
            $tee_id = $round->tee_id;
            $type = $round->type;
            $total = $round->total;
            $date = $round->date;
            $par_id = $round->type_id;
            $round_id = $round->id;
            $status = 1;
            $group_id = $round->group_id;


            $command = new PostRecordsCommand(
                $user_id,
                $course_id,
                $tee_id,
                $type,
                $total,
                $date,
                $par_id,
                $round_id,
                $status,
                $group_id
            );


            if ($round->type == 'Singel' || $round->type == 'Group') {

                $num = Record::where('course_id', $round->course_id)->where('type', 'Singel')->where('type', 'Group')->where('tee_id', $round->tee_id)->where('status', 1)->orderBy('total', 'asc')->pluck('total');

                if ($num == null && $round->type == 'Singel' || $num == 0 && $round->type == 'Singel' || $num == null && $round->type == 'Group' || $num == 0 && $round->type == 'Group') {

                    $this->CommandBus->execute($command);
                }

                if ($round->total == (int)$num) {

                    $this->CommandBus->execute($command);

                }
                if ($round->total < (int)$num) {

                    $recs = Record::where('course_id', $round->course_id)->where('total', $num)->where('type', 'Singel')->where('type', 'Group')->where('status', 1)->get();

                    foreach ($recs as $rec) {
                        $rec->status = 0;
                        $rec->save();
                    }

                    $this->CommandBus->execute($command);
                }
            }

            if ($round->type == 'Par') {

                $num = Record::where('course_id', $round->course_id)->where('type', 'Par')->where('tee_id', $round->tee_id)->where('status', 1)->orderBy('total', 'asc')->pluck('total');

                if ($num == null && $round->type == 'Par' || $num = 0 && $round->type == 'Par') {

                    $this->CommandBus->execute($command);
                }

                if ($round->total == (int)$num) {

                    $this->CommandBus->execute($command);

                }
                if ($round->total < (int)$num) {

                    $recs = Record::where('course_id', $round->course_id)->where('total', $num)->where('type', 'Par')->where('status', 1)->get();

                    foreach ($recs as $rec) {
                        $rec->delete();
                    }

                    $this->CommandBus->execute($command);
                }

            }

            return Redirect::back()->with('success', 'Runda sparad som aktiv!');

        }else{

            return Redirect::back()->with('headsup', 'Du måste vara inloggad för att kunna göra detta!');
        }
	}

}
