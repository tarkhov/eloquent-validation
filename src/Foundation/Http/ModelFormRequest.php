<?php
namespace EloquentValidation\Foundation\Http;

use Illuminate\Foundation\Http\FormRequest;

abstract class ModelFormRequest extends FormRequest
{
    use ModelFormTrait;
}
