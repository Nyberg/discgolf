<?php

namespace dg\Records;

use Record;

class RecordWasPosted{

    public $record;

    function __construct(Record $record){

        $this->record = $record;
    }

}