<?php
namespace EloquentValidation\Foundation\Http;

abstract class DeleteFormRequest extends ModelFormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = $this->model::rules();
        return [
            'id' => $rules['id']
        ];
    }
}
