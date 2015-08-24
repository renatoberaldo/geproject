<?php
/**
 * Created by PhpStorm.
 * User: motamonteiro
 * Date: 23/07/15
 * Time: 01:14
 */

namespace GeProj\Validators;


use Prettus\Validator\LaravelValidator;

class ClientValidator extends LaravelValidator
{
    protected $rules = [
        'name'        => 'required|max:255',
        'responsible' => 'required|max:255',
        'email'       => 'required|email',
        'phone'       => 'required',
        'address'     => 'required'
    ];
}