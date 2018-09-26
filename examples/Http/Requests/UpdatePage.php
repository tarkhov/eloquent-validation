<?php
namespace App\Http\Requests;

use EloquentValidation\Foundation\Http\UpdateFormRequest;
use App\Page;

class UpdatePage extends UpdateFormRequest
{
    protected $model = 'Page';
}
