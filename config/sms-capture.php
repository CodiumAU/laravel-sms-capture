<?php

return [

    'broadcasting' => [
        'channel' => 'SmsCapture',
        'event' => 'OutgoingSmsCaptured',
    ],

    'environments' => [
        'local',
    ],

    'pusher' => env('PUSHER_APP_KEY'),

];
