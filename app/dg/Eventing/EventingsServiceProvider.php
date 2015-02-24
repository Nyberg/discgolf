<?php

namespace dg\Eventing;
use Illuminate\Support\ServiceProvider;

class EventingsServiceProvider extends ServiceProvider {

    public function register()
    {
        $listeners = $this->app['config']->get('Dg.listeners');
        foreach($listeners as $listener)
        {
            $this->app['events']->listen('Dg.*', $listener);
        }
    }
}