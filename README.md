# Manager

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Software License][ico-license]](LICENSE.md)
[![Build Status][ico-travis]][link-travis]
[![Coverage Status][ico-scrutinizer]][link-scrutinizer]
[![Quality Score][ico-code-quality]][link-code-quality]
[![Total Downloads][ico-downloads]][link-downloads]


This is where your description should go. Try and limit it to a paragraph or two, and maybe throw in a mention of what
PSRs you support to avoid any confusion with users and contributors.

## Structure

If any of the following are applicable to your project, then the directory structure should follow industry best practices by being named the following.

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
- [All Contributors][link-contributors]

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/Seo/Manager.svg?style=flat-square
[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/Seo/Manager/master.svg?style=flat-square
[ico-scrutinizer]: https://img.shields.io/scrutinizer/coverage/g/Seo/Manager.svg?style=flat-square
[ico-code-quality]: https://img.shields.io/scrutinizer/g/Seo/Manager.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/Seo/Manager.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/Seo/Manager
[link-travis]: https://travis-ci.org/Seo/Manager
[link-scrutinizer]: https://scrutinizer-ci.com/g/Seo/Manager/code-structure
[link-code-quality]: https://scrutinizer-ci.com/g/Seo/Manager
[link-downloads]: https://packagist.org/packages/Seo/Manager
[link-author]: https://github.com/VaheSaroyan
[link-contributors]: ../../contributors
