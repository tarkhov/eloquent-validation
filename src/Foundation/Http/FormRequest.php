<?php
namespace LaravelSuite\Foundation\Http;

use Illuminate\Foundation\Http\FormRequest as HttpFormRequest;

abstract class FormRequest extends HttpFormRequest
{
    public function onlyRules()
    {
        return $this->only(array_keys($this->rules()));
    }
}
