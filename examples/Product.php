<?php
namespace App;

class Product extends Page
{
    public function getFillable()
    {
        $this->fillable = array_merge($this->fillable, [
            'price',
            'sku',
        ]);
        return $this->fillable;
    }

    public static function rules()
    {
        return array_merge(parent::rules(), [
            'price' => 'required|numeric|between:0,9999999999999.99',
            'sku'   => 'nullable|string|max:255',
        ]);
    }
}
