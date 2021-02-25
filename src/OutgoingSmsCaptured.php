<?php

namespace Codium\SmsCapture;

use Illuminate\Broadcasting\Channel;
use Illuminate\Support\Facades\Config;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class OutgoingSmsCaptured implements ShouldBroadcast
{
    use Dispatchable;
    use InteractsWithSockets;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(
        public $recipient,
        public $message,
        public $date
    ) {
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new Channel(Config::get('sms-capture.broadcasting.channel'));
    }

    /**
     * Name of the event to broadcast.
     *
     * @return string
     */
    public function broadcastAs()
    {
        return Config::get('sms-capture.broadcasting.event');
    }
}
