<?php

namespace Codium\SmsCapture;

use DateTime;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Config;
use Codium\SmsCapture\OutgoingSmsCaptured;
use Illuminate\Notifications\Events\NotificationSending;

class CaptureOutgoingSms
{
    /**
     * Handle the event.
     *
     * @param \Illuminate\Notifications\Events\NotificationSending $event
     * @return boolean
     */
    public function handle(NotificationSending $event): bool
    {
        if (!in_array(App::environment(), Config::get('sms-capture.environments'))) {
            return true;
        }

        switch ($event->channel) {
            case 'nexmo':
                $message = $event->notification->toNexmo($event->notifiable);

                OutgoingSmsCaptured::dispatch($event->notifiable->name, trim($message->content), (new DateTime)->format('d/m/Y H:i'));

                return false;
            case 'vonage':
                $message = $event->notification->toVonage($event->notifiable);

                OutgoingSmsCaptured::dispatch($event->notifiable->name, trim($message->content), (new DateTime)->format('d/m/Y H:i'));

                return false;
            default:
                return true;
        }
    }
}
