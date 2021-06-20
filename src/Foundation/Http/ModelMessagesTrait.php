<?php
namespace EloquentValidation\Foundation\Http;

trait ModelMessagesTrait
{
    /**
     * Get custom messages for validator errors.
     *
     * @return array
     */
    public function messages(): array
    {
        return $this->model::messages();
    }
}
