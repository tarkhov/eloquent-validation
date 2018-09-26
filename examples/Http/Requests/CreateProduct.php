<?php
namespace App\Http\Requests;

use EloquentValidation\Foundation\Http\CreateFormRequest;
use App\Product;

class CreateProduct extends CreateFormRequest
{
    protected $model = 'Product';
}
