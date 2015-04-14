<?php

namespace dg\Listeners;

use Course;
use dg\Comments\CommentWasPosted;
use dg\Eventing\EventListener;
use dg\Friends\FriendWasPosted;
use dg\Records\RecordWasPosted;
use dg\Reviews\ReviewWasPosted;
use dg\Rounds\GroupRoundWasPosted;
use dg\Rounds\RoundWasActivated;
use dg\Rounds\RoundWasPosted;
use dg\Tours\TourWasPosted;
use Friend;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Round;
use User;
use Profile;

class UserNotifier extends EventListener{

    public function whenCommentWasPosted(CommentWasPosted $event){

        if($event->comment->commentable_type == 'round') {

            $round = Round::whereId($event->comment->commentable_id)->first();

            $user = User::whereId($round->user_id)->first();

            $user->newNotification()
                ->from(Auth::user())
                ->withType('CommentWasPosted')
                ->withSubject('Ny kommentar')
                ->withBody('{{users}} har kommenterat din runda: ' . $round->date)
                ->regarding($event->comment)
                ->withUrl('/round/'.$round->id.'/course/'.$round->course_id.'')
                ->deliver();
        }
        if($event->comment->commentable_type == 'course') {

            $course = Course::whereId($event->comment->commentable_id)->first();

            $users = User::where('club_id', $course->club_id)->get();

            foreach($users as $user){

                $user->newNotification()
                    ->from(Auth::user())
                    ->withType('CommentWasPosted')
                    ->withSubject('Ny kommentar')
                    ->withBody('{{users}} har kommenterat banan ' . $course->name)
                    ->regarding($event->comment)
                    ->withUrl('/course/'.$course->id.'/show')
                    ->deliver();
            }
        }
    }

    public function whenRecordWasPosted(RecordWasPosted $event){

        $users = User::get();

        foreach($users as $user) {

            $user->newNotification()
                ->from(Auth::user())
                ->withType('RecordWasPosted')
                ->withSubject('Ny rekordrunda!')
                ->withBody('{{users}} har lagt upp en ny rekordrunda!')
                ->regarding($event->record)
                ->withUrl('/round/' . $event->record->round_id . '/course/' . $event->record->course_id . '')
                ->deliver();
        }

    }

    public function whenRoundWasPosted(RoundWasPosted $event){

        $user = User::whereId(Auth::id())->first();

            $user->newNotification()
                ->from(Auth::user())
                ->withType('RoundWasPosted')
                ->withSubject('Ny runda!')
                ->withBody('Klicka här för att lägga till din score för '.$event->round->course->name.' - '.$event->round->tee->color.', '.$event->round->created_at->format('Y-m-d').'')
                ->regarding($event->round)
                ->withUrl('/account/round/'.$event->round->id.'/course/'.$event->round->course_id.'/score/add')
                ->deliver();
        }

    public function whenGroupRoundWasPosted(GroupRoundWasPosted $event){
        $id = $event->round->user_id;
        $sender = User::whereId(Auth::id())->first();
        $user = User::whereId($id)->first();

        $user->newNotification()
            ->from(Auth::user())
            ->withType('GroupRoundWasPosted')
            ->withSubject('Ny grupprunda!')
            ->withBody('{{users}} har lagt till en grupprunda. Klicka här för att lägga till din score.')
            ->regarding($event->round)
            ->withUrl('/account/round/'.$event->round->id.'/course/'.$event->round->course_id.'/score/add')
            ->deliver();
    }

    public function whenReviewWasPosted(ReviewWasPosted $event){

        $course = Course::whereId($event->review->course_id)->first();

        $users = User::where('club_id', $course->club_id)->get();

        foreach($users as $user){

            $user->newNotification()
                ->from(Auth::user())
                ->withType('ReviewWasPosted')
                ->withSubject('Ny recension!')
                ->withBody('{{users}} har recencerat banan ' . $course->name)
                ->regarding($event->review)
                ->withUrl('/course/'.$course->id.'/show')
                ->deliver();

        }

    }

    public function whenRoundWasActivated(RoundWasActivated $event){

        $users = Friend::where('friend_id', Auth::id())->get();

        foreach($users as $user) {

            $u = User::whereId($user->id)->firstOrFail();

            $u->newNotification()
                ->from(Auth::user())
                ->withType('RoundWasActivated')
                ->withSubject('Ny runda!')
                ->withBody('{{users}} har lagt upp en ny runda!')
                ->regarding($event->round)
                ->withUrl('/round/' . $event->round->id . '/course/' . $event->round->course_id . '')
                ->deliver();
        }
    }

    public function whenFriendWasPosted(FriendWasPosted $event){

        $user = User::whereId($event->friend->friend_id)->firstOrFail();

        $user->newNotification()
            ->from(Auth::user())
            ->withType('FriendWasPosted')
            ->withSubject('Ny vän!')
            ->withBody('{{users}} har lagt till dig som en vän!')
            ->regarding($event->friend)
            ->withUrl('/user/' . $event->friend->user_id . '/show/')
            ->deliver();
    }

    public function whenTourWasPosted(TourWasPosted $event){
        $profiles = Profile::with('user')->where('state_id', $event->tour->state_id)->get();

        foreach($profiles as $p) {

            $user = User::whereId($p->user_id)->first();

            $user->newNotification()
                ->from(Auth::user())
                ->withType('TourWasPosted')
                ->withSubject('Ny tävling!')
                ->withBody('{{users}} har lagt upp tävlingen '.$event->tour->name.'!')
                ->regarding($event->tour)
                ->withUrl('/tour/' . $event->tour->id . '/show/')
                ->deliver();
        }

    }

} 