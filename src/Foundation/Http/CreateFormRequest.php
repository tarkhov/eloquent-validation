<?php
namespace EloquentValidation\Foundation\Http;

abstract class CreateFormRequest extends ModelFormRequest
{
    public function rules()
    {
        $rules = parent::rules();
        if (empty($this->fields)) {
            unset($rules[$this->primaryKey]);
        }
        return $rules;
    }
}
