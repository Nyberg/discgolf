<?php

namespace dg\Notification;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;
use User;
use Notification;

class NotificationFetcher
{
    protected $user;
    protected $limit = 10;
    protected $unread = false;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function fetch()
    {
        $notificationsGroup = DB::table('notifications')->select('notifications.body', 'notifications.id',
            DB::raw('max(notifications.sent_at) as sent_at'),
            DB::raw('min(notifications.is_read) as is_read'),
            DB::raw('count(distinct(notifications.sender_id)) as sender_count'),
            DB::raw("case
                when count(DISTINCT(notifications.sender_id)) = 1 then users.first_name
                when count(DISTINCT(notifications.sender_id)) > 2 then CONCAT(count(distinct(notifications.sender_id)), ' personer' )
                end as sender_string"))
            ->join('users', 'users.id', '=', 'notifications.sender_id')
            ->whereRaw('user_id = ' . $this->user->id)
            ->groupBy('type', 'object_id');
        $notifications = DB::table(DB::raw(sprintf('(%s) as ng', $notificationsGroup->toSql())))
            ->select('notifications.*', 'ng.sent_at', 'ng.is_read', DB::raw("REPLACE(notifications.body, '{{users}}', ng.sender_string) as body"))
            ->join('notifications', 'notifications.id', '=', 'ng.id')
            ->orderBy('ng.is_read', 'asc')
            ->orderBy('ng.sent_at', 'desc')
            ->limit($this->limit);
        if($this->unread)
        {
            $notifications->where('ng.is_read', '=', 0);
        }
        return $this->toCollection($notifications->get());
    }

    private function toCollection($notifications)
    {
        if(empty($notifications)) return [];
        $notificationModels = [];
        foreach($notifications as $notification)
        {
            $notificationModels[] = new Notification((array)$notification);
        }
        return new Collection($notificationModels);
    }

    public function onlyUnread()
    {
        $this->unread = true;
        return $this;
    }

    public function onlyRead()
    {
        $this->unread = false;
        return $this;
    }

    public function take($limit)
    {
        $this->limit = $limit;
        return $this;
    }
}