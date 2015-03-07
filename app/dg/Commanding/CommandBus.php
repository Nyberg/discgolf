<?php

namespace dg\Commanding;

interface CommandBus{

    public function execute($command);

}