<?php

namespace Codium\SmsCapture;

use Illuminate\Notifications\Events\NotificationSending;
use Illuminate\Support\Facades\Event;

class ServiceProvider extends \Illuminate\Support\ServiceProvider
{
    /**
     * Boot service provider.
     *
     * @return void
     */
    public function boot()
    {
        $this->mergeConfigFrom(
            __DIR__.'/../config/sms-capture.php',
            'sms-capture'
        );
        $this->loadRoutesFrom(__DIR__.'/../routes/web.php');
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'sms-capture');

        $this->publishes([
            __DIR__.'/../config/sms-capture.php' => config_path('sms-capture.php'),
            __DIR__.'/../resources/views' => resource_path('views/vendor/sms-capture'),
        ]);

        Event::listen(NotificationSending::class, [CaptureOutgoingSms::class, 'handle']);
    }
}
