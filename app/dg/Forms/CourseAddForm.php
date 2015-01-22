<?php

namespace dg\Forms;

use Laracasts\Validation\FormValidator;

class CourseAddForm extends FormValidator{

    protected $rules = [

        'name'          => 'required',
        'country'       => 'required',
        'state'         => 'required',
        'city'          => 'required',
        'long'          => 'required',
        'lat'           => 'required',
        'holes'         => 'required',
        'club'          => 'required'

    ];

} 