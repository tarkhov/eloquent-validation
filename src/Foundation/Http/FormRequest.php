<?php
namespace LaravelSuite\Foundation\Http;

use Illuminate\Foundation\Http\FormRequest as BaseFormRequest;

abstract class FormRequest extends BaseFormRequest
{
    public function onlyRules()
    {
        return $this->only(array_keys($this->rules()));
    }
}
