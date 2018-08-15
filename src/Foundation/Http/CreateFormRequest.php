<?php
namespace EloquentValidation\Foundation\Http;

abstract class CreateFormRequest extends ModelFormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = $this->model::rules();
        unset($rules['id']);
        return $rules;
    }
}
