<?php
namespace EloquentValidation\Foundation\Http;

use Illuminate\Support\Arr;

trait ModelRulesTrait
{
    public function rules()
    {
        if (!empty($this->fields)) {
            if (empty($this->fields['except'])) {
                $rules = Arr::only($this->model::rules(), $this->fields);
            } else {
                $rules = Arr::except($this->model::rules(),  $this->fields['except']);
            }
        } else {
            $rules = $this->model::rules();
        }
        return $rules;
    }
}
