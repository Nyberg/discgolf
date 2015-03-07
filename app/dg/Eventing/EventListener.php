<?php

namespace dg\Eventing;

use ReflectionClass;

class EventListener
{
    public function handle($event)
    {
        $eventName = $this->getEventName($event);
        if($this->listenerIsRegistered($eventName))
        {
            return call_user_func([$this, 'when'.$eventName], $event);
        }
    }

    public function getEventName($event)
    {
        $eventName = (new ReflectionClass($event))->getShortName();
        return $eventName;
    }

    public function listenerIsRegistered($eventName)
    {
        $method = "when{$eventName}";
        return method_exists($this, $method);
    }
}