<?php

namespace dg\Forms;

use Laracasts\Validation\FormValidator;

class NewsForm extends FormValidator{


    protected $rules = [

        'head'      =>  'required',
        'body'      =>  'required'

    ];

} 