<?php
namespace EloquentValidation\Foundation\Http;

use Illuminate\Support\Arr;

trait ModelAttributesTrait
{
    /**
     * Get custom attributes for validator errors.
     *
     * @return array
     */
    public function attributes(): array
    {
        if (!empty($this->fields)) {
            if (empty($this->fields['except'])) {
                $attributes = Arr::only($this->model::attributes(), $this->fields);
            } else {
                $attributes = Arr::except($this->model::attributes(), $this->fields['except']);
            }
        } else {
            $attributes = $this->model::attributes();
        }
        return $attributes;
    }
}
