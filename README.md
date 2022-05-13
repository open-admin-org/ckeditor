Integrate CKEDITOR into open-admin
======

This is a `open-admin` extension that integrates `CKEDITOR` into the `open-admin` form.

## Screenshot

![field-ckeditor](https://user-images.githubusercontent.com/86517067/149800371-a99f23ba-c979-4122-bb7d-2cc32ecd0982.png)

## Installation

```bash
composer require open-admin-ext/ckeditor
```

Then
```bash
php artisan vendor:publish --tag=open-admin-ckeditor
```

## Configuration

In the `extensions` section of the `config/admin.php` file, add some configuration that belongs to this extension.
```php

    'extensions' => [

        'ckeditor' => [

            //Set to false if you want to disable this extension
            'enable' => true,

            // Editor configuration
            'config' => [

            ]
        ]
    ]

```
The configuration of the editor can be found in [CKEditor Documentation](https://ckeditor.com/docs/ckeditor4/latest/guide/), such as configuration language and height.
```php
    'config' => [
        'language'      => 'de',
        'height'        => 500,
        'contentsCss'   => '/css/frontend-body-content.css',
    ]
```

## Usage

Use it in the form:
```php
$form->ckeditor('content');

// Set config
$form->ckeditor('content')->options(['lang' => 'fr', 'height' => 500,'contentsCss' => '/css/frontend-body-content.css']);
```

Problems?
------------
If ckeditor is not showing up and tells you that it's not found run the lines below to clear the compiled services and packages.

```bash
php artisan optimize:clear
```

License
------------
Licensed under [The MIT License (MIT)](LICENSE).
