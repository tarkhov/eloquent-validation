<?php
namespace EloquentValidation\Foundation\Http;

use Illuminate\Foundation\Http\FormRequest;

abstract class ModelFormRequest extends FormRequest
{
    protected $model = null;
    protected $primaryKey = 'id';

    public function onlyRules()
    {
        return $this->only(array_keys($this->rules()));
    }
}
