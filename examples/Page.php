<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use EloquentValidation\Database\Eloquent\ModelRules;


class Page extends Model implements ModelRules
{
    protected $fillable = [
        'is_active',
        'slug',
        'name',
        'description',
        'image',
        'title',
        'meta_description',
        'meta_keywords',
    ];

    public static function rules()
    {
        return [
            'id'               => 'required|integer',
            'is_active'        => 'boolean',
            'slug'             => 'required|string|max:255',
            'name'             => 'required|string|max:255',
            'description'      => 'required|string|max:65535',
            'image'            => 'nullable|string|max:255',
            'title'            => 'required|string|max:255',
            'meta_description' => 'required|string|max:255',
            'meta_keywords'    => 'required|string|max:255',
        ];
    }
}
