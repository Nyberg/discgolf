<?php

namespace dg\Forms;

use Laracasts\Validation\FormValidator;

class AddReviewForm extends FormValidator{

    protected $rules = [

        'head'          =>  'required',
        'body'          =>  'required',
        'rating'        =>  'required'

    ];

}