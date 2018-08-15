<?php
namespace EloquentValidation\Foundation\Http;

abstract class UpdateFormRequest extends ModelFormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return $this->model::rules();
    }
}
