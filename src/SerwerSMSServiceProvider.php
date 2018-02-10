<?php
namespace KDuma\SMS\Drivers\SerwerSMS;

use KDuma\SMS\SMSManager;
use Illuminate\Foundation\Application;
use Illuminate\Support\ServiceProvider;

class SerwerSMSServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->make(SMSManager::class)->extend('serwersms', function (Application $app, array $config) {
            return new SerwerSMSDriver(
                $config['login'] ?? '',
                $config['password'] ?? '',
                $config
            );
        });
    }
}