<?php

namespace Davidpiesse\NovaPhpinfo;

class Filter {
    const All = -1;
    const General = 1;
    const Credits = 2;
    const Configuration = 4;
    const Modules = 8;
    const Environment = 16;
    const Variables = 32;
    const License = 64;

    public static function list(){
        $oClass = new \ReflectionClass(__CLASS__);
        return $oClass->getConstants();
    }

}