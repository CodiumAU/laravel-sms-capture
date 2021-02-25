<?php

use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Route;

Route::get('__sms', function () {
    return View::make('sms-capture::sms');
});
