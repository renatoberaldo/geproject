<?php


namespace GeProj\Validators;


use Prettus\Validator\LaravelValidator;

class ProjectNoteValidator extends LaravelValidator
{
    protected $rules = [
        'project_id' => 'required|integer|exists:projects,id',
        'title'      => 'required',
        'note'       => 'required'
    ];
}