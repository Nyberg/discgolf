<?php

use dg\Notification\NotificationFetcher;
use Illuminate\Support\Facades\Auth;

class NotificationsController extends BaseController
{
    public function show()
    {
        if (Request::ajax()) {
            $fetcher = new NotificationFetcher(Auth::user());
            if (count($notifications = $fetcher->onlyUnread()->take(10)->fetch()) > 0) {
                return Response::json($notifications);
            } else {
                $notifications = $fetcher->onlyRead()->take(10)->fetch();
                return Response::json($notifications);
            }
        }
    }

    public function update()
    {
        if (Request::ajax()) {

            $notifications = Notification::whereUser_id(Auth::user()->id)->whereIs_read(0)->get();

            if (count($notifications) > 0) {
                foreach ($notifications as $notification) {
                    $notification->is_read = true;
                    $notification->save();
                }
                return Response::json('Notifications is read and removed.');
            } else {
                return Response::json('Nothing to remove');
            }
        }
    }
}