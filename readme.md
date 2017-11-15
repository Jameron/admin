This package has been built to work with Laravel 5.4.33 and later. Some older versions may not be compatible. If you are starting fresh, create your laravel application first thing and install the regulator package. 

[jameron/regulator](https://github.com/jameron/regulator)

1) Add the package to your compose.json file:

```json
    "jameron/admin": "*",
```

```
composer update
```

**NOTE  Laravel 5.5+ users there is auto-discovery so you can ignore steps 2 and 3

2) Update your providers:

```php
    Jameron\Admin\AdminServiceProvider::class,
```

3) Update your Facades:

```php
        'Admin' => Jameron\Admin\Facades\RegulatorFacade::class,
```

4) Publish the config:

```
php artisan vendor:publish
```

5) Install Bootstrap 4 and Popper.js (Bootstrap wants it)

First uninstall that old bootstrap 3 sass
```
npm uninstall --save bootstrap-sass
```

Then install bootstrap 4 and its dependency popper.js

```
npm install popper.js --save
npm install bootstrap@4.0.0-beta.2 --save
```

open up `resources/assets/js/bootstrap.js` and add this line <underline>after Jquery before bootstrap</underline>:

```window.Popper = require('popper.js').default;```


6) Update the layout file both of these views: 

```
resources/views/auth/login.blade.php
resources/views/auth/register.blade.php

```

to use 

```php
@extends('admin::layouts.app')
```

Optionally if you would like to use the Admin Bootstrap 4 login form delete the form that comes with Laravel and add in the Admin sign_in view partial in the container. The login.blade file might look like this:

```php
@extends('admin::layouts.app')

@section('content')
    <div class="container">
        @include('admin::partials.forms.sign_in')
    </div>
@endsection
```

7) Update webpack config

```javascript
   .sass('resources/assets/admin/sass/admin.scss', 'public/css')
```
