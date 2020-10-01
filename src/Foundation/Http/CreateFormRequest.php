<?php
namespace EloquentValidation\Foundation\Http;

abstract class CreateFormRequest extends ModelFormRequest
{
    public function rules()
    {
        $rules = parent::rules();
        if (empty($this->fields) && isset($rules[$this->primaryKey])) {
            unset($rules[$this->primaryKey]);
        }
        return $rules;
    }
}
