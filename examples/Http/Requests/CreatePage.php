<?php
namespace App\Http\Requests;

use EloquentValidation\Foundation\Http\CreateFormRequest;
use App\Page;

class CreatePage extends CreateFormRequest
{
    protected $model = 'Page';
}
