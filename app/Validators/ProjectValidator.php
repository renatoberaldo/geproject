<?php


namespace GeProj\Validators;


use Prettus\Validator\LaravelValidator;

class ProjectValidator extends LaravelValidator
{
    protected $rules = [
        'owner_id'    => 'required|integer|exists:users,id',
        'client_id'   => 'required|integer|exists:users,id',
        'name'        => 'required|max:255',
        'description' => 'required|max:255',
        'progress'    => 'required|integer|between:0,100',
        'status'      => 'required',
        'due_date'    => 'required|date'
    ];
}