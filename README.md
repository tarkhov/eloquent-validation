# Eloquent validation

Laravel eloquent model validation rules.

### Contents

1. [Installation](#installation)
   1. [Composer](#composer)
2. [Usage](#usage)
   1. [Model rules](#model-rules)
   2. [Model form request](#model-form-request)
3. [Author](#author)
4. [License](#license)

## Installation

### Composer

```bash
composer require tarkhov/eloquent-validation
```

## Usage

### Model rules

```php
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
```

### Model form request

```php
<?php
namespace App\Http\Requests;

use EloquentValidation\Foundation\Http\CreateFormRequest;
use App\Page;

class CreatePage extends CreateFormRequest
{
    protected $model = 'Page';
}
```

## Author

**Alexander Tarkhov**

* [Facebook](https://www.facebook.com/alex.tarkhov)
* [Twitter](https://twitter.com/alextarkhov)
* [Medium](https://medium.com/@tarkhov)
* [Product Hunt](https://www.producthunt.com/@tarkhov)

## License

This project is licensed under the **MIT License** - see the `LICENSE` file for details.
