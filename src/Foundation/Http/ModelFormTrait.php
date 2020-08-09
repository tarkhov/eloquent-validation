<?php
namespace EloquentValidation\Foundation\Http;

trait ModelFormTrait
{
    protected $model = null;
    protected $primaryKey = 'id';
    protected $fields = [];

    public function rules()
    {
        if (!empty($this->fields)) {
            if (!isset($this->fields['except'])) {
                $rules = $this->model::onlyRules($this->fields);
            } else {
                $rules = $this->model::exceptRules($this->fields['except']);
            }
        } else {
            $rules = $this->model::rules();
        }
        return $rules;
    }
}
