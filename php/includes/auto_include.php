<?php
    spl_autoload_register('myAutoloader');

    function myAutoloader($class){
    $path="../classes/";
    $extension=".php";
    $fullpath=$path.$class.$extension;


    include_once $fullpath;
    }