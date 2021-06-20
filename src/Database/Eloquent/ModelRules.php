<?php
namespace EloquentValidation\Database\Eloquent;

interface ModelRules
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public static function rules(): array;
}
