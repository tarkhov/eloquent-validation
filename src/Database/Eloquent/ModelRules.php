<?php
namespace EloquentValidation\Database\Eloquent;

interface ModelRules
{
    public static function rules();
    public static function onlyRules($fields);
    public static function exceptRules($fields);
}
