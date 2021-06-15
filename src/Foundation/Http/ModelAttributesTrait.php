<?php
namespace EloquentValidation\Foundation\Http;

use Illuminate\Support\Arr;

trait ModelAttributesTrait
{
    public function attributes()
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
