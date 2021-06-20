<?php
namespace EloquentValidation\Database\Eloquent;

interface ModelAttributes
{
    /**
     * Get custom attributes for validator errors.
     *
     * @return array
     */
    public static function attributes(): array;
}
