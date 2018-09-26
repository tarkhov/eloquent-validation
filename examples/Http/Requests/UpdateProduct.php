<?php
namespace App\Http\Requests;

use EloquentValidation\Foundation\Http\UpdateFormRequest;
use App\Product;

class UpdateProduct extends UpdateFormRequest
{
    protected $model = 'Product';
}
