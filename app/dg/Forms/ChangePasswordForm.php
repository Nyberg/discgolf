<?php

namespace dg\Forms;

use Laracasts\Validation\FormValidator;

class ChangePasswordForm extends FormValidator{

    protected $rules = [

        'current'          =>  'required',
        'new'              =>  'required|min:6',
        'confirm'          =>  'required|same:new',

    ];

}