<?php

namespace CustomPlugin\Providers;

use Plenty\Plugin\ServiceProvider;

/**
 * Class CustomPluginServiceProvider
 * @package CustomPlugin\Providers
 */
class CustomPluginServiceProvider extends ServiceProvider
{
    /**
    * Register the route service provider
    */
    public function register()
    {
        $this->getApplication()->register(CustomPluginRouteServiceProvider::class);
    }
}