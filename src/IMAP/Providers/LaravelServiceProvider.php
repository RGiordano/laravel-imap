<?php
/*
* File:     LaravelServiceProvider.php
* Category: Provider
* Author:   M. Goldenbaum
* Created:  19.01.17 22:21
* Updated:  -
*
* Description:
*  -
*/

namespace Rgiordano\IMAP\Providers;

use Illuminate\Support\ServiceProvider;
use Rgiordano\IMAP\Client;
use Rgiordano\IMAP\ClientManager;

/**
 * Class LaravelServiceProvider
 *
 * @package Rgiordano\IMAP\Providers
 */
class LaravelServiceProvider extends ServiceProvider {

    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot() {
        $this->publishes([
            __DIR__.'/../../config/imap.php' => app()->basePath() . '/config' . ('imap.php' ? '/' . 'imap.php' : 'imap.php'),
        ]);
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register() {
        $this->app->singleton(ClientManager::class, function($app) {
            return new ClientManager($app);
        });

        $this->app->singleton(Client::class, function($app) {
            return $app[ClientManager::class]->account();
        });

        $this->mergeConfigFrom(__DIR__.'/../../config/imap.php', 'imap');

    }
}