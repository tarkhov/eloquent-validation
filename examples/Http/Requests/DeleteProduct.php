<?php
namespace App\Http\Requests;

use EloquentValidation\Foundation\Http\DeleteFormRequest;
use App\Product;

class DeleteProduct extends DeleteFormRequest
{
    protected $model = 'Product';
}
