<?php
namespace App\Http\Requests;

use EloquentValidation\Foundation\Http\DeleteFormRequest;
use App\Page;

class DeletePage extends DeleteFormRequest
{
    protected $model = 'Page';
}
