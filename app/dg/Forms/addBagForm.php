<?php

namespace dg\Forms;
use Laracasts\Validation\FormValidator;

class addBagForm extends FormValidator{

    protected $rules = [

        'type'  => 'required'

    ];

} 