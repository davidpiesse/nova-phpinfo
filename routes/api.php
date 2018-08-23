<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Davidpiesse\NovaPhpinfo\PhpInfo;
use Davidpiesse\NovaPhpinfo\Filter;

Route::get('/phpinfo', function (Request $request) {
    return PhpInfo::get(Filter::All);
});
