<?php

namespace Davidpiesse\NovaPhpinfo\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Davidpiesse\NovaPhpinfo\Filter;
use Davidpiesse\NovaPhpinfo\PhpInfo as PhpInfoService;

class PhpInfo extends Controller
{
    public function get(Request $request)
    {
        return PhpInfoService::get(Filter::All);
    }
}
