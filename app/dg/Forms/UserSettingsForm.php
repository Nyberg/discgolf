<?php

namespace dg\Forms;

use Laracasts\Validation\FormValidator;

class UserSettingsForm extends FormValidator{

    protected $rules = [

        'username' => 'required',
        'email' => 'required|email'

    ];

} 