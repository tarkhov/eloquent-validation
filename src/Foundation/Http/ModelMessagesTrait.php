<?php
namespace EloquentValidation\Foundation\Http;

trait ModelMessagesTrait
{
    public function messages()
    {
        return $this->model::messages();
    }
}
