# Eloquent validation

Laravel eloquent model validation rules.

### Contents

1. [Compatibility](#compatibility)
2. [Installation](#installation)
   1. [Composer](#composer)
3. [Usage](#usage)
   1. [Add model rules](#add-model-rules)
   2. [Validate request](#validate-request)
   3. [Inherit model rules](#inherit-model-rules)
   4. [Form request validation](#form-request-validation)
4. [Author](#author)
5. [License](#license)

## Compatibility

Library | Version
------- | -------
Laravel | >= 6.0

## Installation

### Composer

```bash
composer require tarkhov/eloquent-validation
```

## Usage

### Add model rules

Add validation rules by implemeting `ModelRules` interface to your model and define array of rules. Optional you can define validation attributes and messages by implemeting ModelAttributes and ModelMessages interfaces.

```php
<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use EloquentValidation\Database\Eloquent\ModelAttributes;
use EloquentValidation\Database\Eloquent\ModelMessages;
use EloquentValidation\Database\Eloquent\ModelRules;

class Page extends Model implements ModelAttributes, ModelMessages, ModelRules
{
    protected $fillable = [
        'is_active',
        'slug',
        'name',
        'description',
        'image',
        'head_title',
        'meta_description',
        'meta_keywords',
    ];

    public static function rules(): array
    {
        return [
            'id'               => ['required', 'integer'],
            'is_active'        => ['boolean'],
            'slug'             => ['nullable', 'string', 'max:255'],
            'name'             => ['required', 'string', 'max:255'],
            'description'      => ['required', 'string', 'max:65535'],
            'image'            => ['nullable', 'string', 'max:255'],
            'head_title'       => ['nullable', 'string', 'max:255'],
            'meta_description' => ['nullable', 'string', 'max:255'],
            'meta_keywords'    => ['nullable', 'string', 'max:255'],
        ];
    }

    public static function attributes(): array
    {
        return [
            'is_active'        => 'is active',
            'head_title'       => 'head title',
            'meta_description' => 'meta description',
            'meta_keywords'    => 'meta keywords',
        ];
    }

    public static function messages(): array
    {
        return [
            'is_active.boolean' => 'The :attribute value must be boolean.',
            'name.required'     => 'Please provide :attribute.',
            'head_title.string' => 'Value of :attribute must be string.',
        ];
    }
}
```

### Validate request

```php
<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Arr;

use App\Models\Page;

class PageController extends Controller
{
    public function create(Request $request)
    {
        $attributes = Page::attributes();
        $messages = Page::messages();
        $rules = Arr::except(Page::rules(), ['id']);
        $data = $request->only(array_keys($rules));
        $validator = Validator::make($data, $rules, $messages, $attributes);
        if ($validator->fails()) {  
            abort(400);  
        }

        $page = Page::create($data);
        if (!$page) {
            abort(400);  
        }

        return response()->json($page->toArray());
    }

    public function update(Request $request, $id)
    {
        $page = Page::findOrFail($id);

        $attributes = Page::attributes();
        $messages = Page::messages();
        $rules = Arr::except(Page::rules(), ['id']);
        $data = $request->only(array_keys($rules));
        $validator = Validator::make($data, $rules, $messages, $attributes);
        if ($validator->fails()) {  
            abort(400);  
        }

        $page = $page->fill($data)->save();
        if (!$page) {
            abort(400);  
        }

        return response()->json($page->toArray());
    }
}
```

### Inherit model rules

```php
<?php
namespace App\Models;

class Product extends Page
{
    public function getFillable(): array
    {
        $this->fillable = array_merge($this->fillable, [
            'price',
            'sku',
        ]);
        return $this->fillable;
    }

    public static function rules(): array
    {
        return array_merge(parent::rules(), [
            'price' => ['required', 'numeric', 'between:0,9999999999999.99'],
            'sku'   => ['nullable', 'string', 'max:255'],
        ]);
    }
}
```

### Form request validation

```php
<?php
namespace App\Http\Requests;

use EloquentValidation\Foundation\Http\SaveFormRequest;
use App\Models\Page;

class SavePageRequest extends SaveFormRequest
{
    protected $model = 'App\Models\Page';

    public function authorize()
    {
        return true;
    }
}
```

Form request controller.

```php
<?php
namespace App\Http\Controllers;

use App\Models\Page;
use App\Http\Requests\SavePageRequest;

class PageController extends Controller
{
    public function create(SavePageRequest $request)
    {
        $page = Page::create($request->validated());
        if (!$page) {
            abort(400);  
        }

        return response()->json($page->toArray());
    }

    public function update(SavePageRequest $request, $id)
    {
        $page = Page::findOrFail($id);
        $page->fill($request->validated())->save();

        return response()->json($page->toArray());
    }
}
```

Customize form request validation fields.

```php
<?php
namespace App\Http\Requests;

class UpdatePageNameRequest extends UpdatePageRequest
{
    protected $fields = ['name'];
}
```

Update page name.

```php
<?php
namespace App\Http\Controllers;

use App\Models\Page;
use App\Http\Requests\UpdatePageNameRequest;

class PageController extends Controller
{
    public function update(UpdatePageNameRequest $request, $id)
    {
        $page = Page::findOrFail($id);
        $page->fill($request->validated())->save();

        return response()->json($page->toArray());
    }
}
```

## Author

**Alexander Tarkhov**

* [Facebook](https://www.facebook.com/alex.tarkhov)
* [Twitter](https://twitter.com/alextarkhov)
* [Medium](https://medium.com/@tarkhov)
* [LinkedIn](https://www.linkedin.com/in/tarkhov/)

## License

This project is licensed under the **MIT License** - see the `LICENSE` file for details.
