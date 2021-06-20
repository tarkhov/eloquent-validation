<?php
namespace EloquentValidation\Foundation\Http;

use Illuminate\Support\Arr;

trait ModelRulesTrait
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
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
