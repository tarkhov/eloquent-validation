<?php
namespace EloquentValidation\Database\Eloquent;

interface ModelMessages
{
    /**
     * Get custom messages for validator errors.
     *
     * @return array
     */
    public static function messages(): array;
}
