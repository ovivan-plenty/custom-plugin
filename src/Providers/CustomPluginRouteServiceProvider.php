<?php

namespace CustomPlugin\Providers;

use Plenty\Plugin\RouteServiceProvider;
use Plenty\Plugin\Routing\Router;

/**
 * Class CustomPluginRouteServiceProvider
 * @package CustomPlugin\Providers
 */
class CustomPluginRouteServiceProvider extends RouteServiceProvider
{
    /**
     * @param Router $router
     */
    public function map(Router $router)
    {
        $router->get('hello-world','CustomPlugin\Controllers\CustomPluginController@getHelloWorldPage');
    }
}