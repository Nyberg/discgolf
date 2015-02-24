<?php

namespace dg\Eventing;
use Illuminate\Support\ServiceProvider;

class EventingsServiceProvider extends ServiceProvider {

    public function register()
    {
        $listeners = $this->app['config']->get('discgolf.listeners');
        foreach($listeners as $listener)
        {
            $this->app['events']->listen('discgolf.*', $listener);
        }
    }
}