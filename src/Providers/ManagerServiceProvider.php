<?php

namespace Seo\Manager\Providers;

use Artesaos\SEOTools\Facades\SEOTools;
use Illuminate\Foundation\AliasLoader;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Seo\Manager\Models\Manager;
use Seo\Manager\SeoManager;
use Seo\Manager\Services\SeoService;
use function config;

class ManagerServiceProvider extends ServiceProvider
{


    /**
     * @param Request $request
     */
    public function boot(Request $request)
    {
        if (Schema::hasTable('laravel_seo_managers')) {

            $this->seoService($request);
        }
        $this->loadViewsFrom(__DIR__ . '/../resource/views', 'seo-manager');
        $this->loadRoutesFrom(__DIR__ . '/../routes/web.php');
        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');
        $this->publishes([
            __DIR__ . '/../public' => public_path('vendor/seo_manager'),
        ], 'public');


    }


    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->registerProvider('Artesaos\SEOTools\Providers\SEOToolsServiceProvider');

        $this->app->singleton('seomanager', function () {
            return new SeoManager();
        });

        $this->makeAlias('SEO', SEOTools::class);
        $this->makeAlias('SeoManager', SeoManager::class);

    }

    /**
     * make aliases
     * @param $class
     * @param $alias
     */
    public function makeAlias($class, $alias)
    {
        $this->app->booting(function () use ($class, $alias) {
            $loader = AliasLoader::getInstance();
            $loader->alias($class, $alias);
        });
    }

    /**
     * make provider
     * @param $provider
     */
    public function registerProvider($provider)
    {
        $this->app->register($provider);
    }

    /**
     * make seo for request page
     * @param $request
     */
    public function seoService($request)
    {
        SeoService::seoForAllPages($request);
    }
}
