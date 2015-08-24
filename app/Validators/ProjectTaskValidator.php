<?php
/**
 * Created by PhpStorm.
 * User: motamonteiro
 * Date: 23/07/15
 * Time: 01:14
 */

namespace GeProj\Validators;


use Prettus\Validator\LaravelValidator;

class ProjectTaskValidator extends LaravelValidator
{
    protected $rules = [
        'project_id' => 'required|integer|exists:projects,id',
        'name'       => 'required',
        'start_date' => 'required|date',
        'due_date'   => 'required|date',
        'status'     => 'required',
    ];
}