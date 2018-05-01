# Manager
[![Build Status](https://travis-ci.org/VaheSaroyan/seomanager.svg?branch=master)](https://travis-ci.org/VaheSaroyan/seomanager.svg?branch=master)
> Statistics
[![Latest Stable Version](https://poser.pugx.org/seo/manager/v/stable)](https://packagist.org/packages/seo/manager)
[![Total Downloads](https://poser.pugx.org/seo/manager/downloads)](https://packagist.org/packages/seo/manager)
[![License](https://poser.pugx.org/seo/manager/license)](https://packagist.org/packages/seo/manager)
[![Latest Unstable Version](https://poser.pugx.org/seo/manager/v/unstable)](https://packagist.org/packages/seo/manager)
[![Monthly Downloads](https://poser.pugx.org/seo/manager/d/monthly)](https://packagist.org/packages/seo/manager)
[![Daily Downloads](https://poser.pugx.org/seo/manager/d/daily)](https://packagist.org/packages/seo/manager)


## Structure


```       
src/
tests/
vendor/
```


## Installation
### 1 - Dependency
The first step is using composer to install the package and automatically update your `composer.json` file, you can do this by running:
```shell
composer require seo/manager
```
> **Note**: If you are using Laravel 5.5, the steps 2 and 3, for providers and aliases, are unnecessaries. SeoManager supports Laravel new [Package Discovery](https://laravel.com/docs/5.5/packages#package-discovery).

### 2 - Provider
You need to update your application configuration in order to register the package so it can be loaded by Laravel, just update your `config/app.php` file adding the following code at the end of your `'providers'` section:

> `config/app.php`

```php
// file START ommited
    'providers' => [
        // other providers ommited
        Seo\Manager\Providers\ManagerServiceProvider::class,
    ],
// file END ommited
```



### 3 - Facade

> Facades are not supported in Lumen.

In order to use the `SeoManager` facade, you need to register it on the `config/app.php` file, you can do that the following way:

```php
// file START ommited
    'aliases' => [
        // other Facades ommited
       
             'SeoManager'=>Seo\Manager\Facades\SeoManager::class,
             
                 ],
// file END ommited
```


### 4 Configuration

#### Publish config

In your terminal type
```shell
php artisan vendor:publish
php artisan migrate
php artisan storage:link
```


In `seo_manager.php` configuration file you can determine the properties of the default values and some behaviors.



### Meta tags Generator
With **SEOMeta** you can create meta tags to the `head`

- 1 add `{!! SEO::generate(true) !!}` to site `head`

- 2 add `{!! SeoManager::generateManager() !!}` to site `body` *you can be shut seo manager in admin permission*
### EX
```blade
@if(Auth::user->hasRole() == 'admin')
{!! SeoManager::generateManager() !!}
@endif
```
- 3 usage in controller
```php
use Seo\Manager\Facades\SeoManager;

class HomeController extends Controller
{
 public function index(Request $request)
    {
       SeoManager::seoManager($request,$keywords, $title, $description, $ogType, $image = null, $locale = null, $locales = null, $canonical = null);

       return view('home');
    }
}
```

## Testing

``` bash
$ composer test
```

## Security

If you discover any security related issues, please email vahe.saroyan.web@gmail.com instead of using the issue tracker.

## Credits

- [Vahe Saroyan][link-author]

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/Seo/Manager.svg?style=flat-square
[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square
[ico-travis]: https://travis-ci.org/VaheSaroyan/seo.svg?branch=master
[ico-scrutinizer]: https://img.shields.io/scrutinizer/coverage/g/Seo/Manager.svg?style=flat-square
[ico-code-quality]: https://img.shields.io/scrutinizer/g/Seo/Manager.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/Seo/Manager.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/seo/manager
[link-travis]: https://travis-ci.org/Seo/Manager
[link-scrutinizer]: https://scrutinizer-ci.com/g/Seo/Manager/code-structure
[link-code-quality]: https://scrutinizer-ci.com/g/Seo/Manager
[link-downloads]: https://packagist.org/packages/Seo/Manager
[link-author]: https://github.com/VaheSaroyan
[link-contributors]: ../../contributors
