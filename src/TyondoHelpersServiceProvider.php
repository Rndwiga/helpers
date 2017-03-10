<?php namespace Tyondo\Helpers;


use Illuminate\Support\ServiceProvider;
use Illuminate\Foundation\AliasLoader;
use Tyondo\Helpers\Helpers\TyondoThemeHelper as ThemeHelper;
/**
 * A Laravel 5.3 user package
 *
 * @author: Rndwiga
 */
class TyondoHelpersServiceProvider extends ServiceProvider {
    /**
     * Indicates of loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;
    /**
     * This will be used to register config & view in 
     * your package namespace.
     */
    protected $packageName = 'tyondo_helpers';
    /**
     * @var array
     */
    protected $aliases = [
        'tyondoHelpers' => 'Tyondo\Helpers\TyondoHelpers',
    ];
    /**
     * Bootstrap the application services.
     * @param mixed
     * @return void
     */
    public function boot()
    {
        // Merge config files
        $this->mergeConfigFrom(__DIR__.'/Config/tyondo_helpers.php', $this->packageName);
		// Register Views
        $this->loadViewsFrom(__DIR__.'/Resources/views', $this->packageName);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //registering package service providers and aliases
        $this->registerResources();
        $this->registerAliases();
        $this->app->singleton('tyondoHelpers', function()
        {
            return new ThemeHelper;
        });
    }
    /**
     * @return void
     */
    protected function registerResources()
    {
        // Publish your config files
        $this->publishes([
            __DIR__.'/Config/tyondo_helpers.php' => config_path($this->packageName.'.php')
        ], 'config');
    }
    /**
     * @return void
     */
    private function registerAliases()
    {
        $loader = AliasLoader::getInstance();
        foreach ($this->aliases as $key => $alias)
        {
            $loader->alias($key, $alias);
        }
    }
}
