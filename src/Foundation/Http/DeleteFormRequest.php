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
        $rules = parent::rules();
        if (empty($this->fields) && $this->primaryKey && isset($rules[$this->primaryKey])) {
            return [
                $this->primaryKey => $rules[$this->primaryKey]
            ];
        } else {
            return $rules;
        }
    }
}
