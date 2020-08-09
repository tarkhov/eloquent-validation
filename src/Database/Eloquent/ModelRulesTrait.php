<?php
namespace EloquentValidation\Database\Eloquent;

trait ModelRulesTrait
{
    public static function onlyRules($fields)
    {
        return array_intersect_key(static::rules(), array_flip($fields));
    }

    public static function exceptRules($fields)
    {
        return array_intersect_key(static::rules(), array_flip($fields));
    }
}
