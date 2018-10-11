<?php

use Illuminate\Support\Facades\Route;

Route::get('/phpinfo', 'Davidpiesse\NovaPhpinfo\Http\Controllers\PhpInfo@get');
