<?php
namespace EloquentValidation\Foundation\Http;

trait ModelFormTrait
{
    use ModelRulesTrait;

    protected $model = null;
    protected $primaryKey = 'id';
    protected $fields = [];
}
