<?php

use dg\Commanding\ValidationCommandBus;

class BaseController extends Controller {

    protected $CommandBus;

    function __construct(ValidationCommandBus $commandBus)
    {
        $this->CommandBus = $commandBus;
    }

	protected function setupLayout()
	{
		if ( ! is_null($this->layout))
		{
			$this->layout = View::make($this->layout);
		}
	}

}
