<?php
namespace EloquentValidation\Foundation\Http;

class SaveFormRequest extends ModelFormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        $rules = parent::rules();
        if (empty($this->fields) && $this->primaryKey && isset($rules[$this->primaryKey])) {
            unset($rules[$this->primaryKey]);
        }
        return $rules;
    }
}
