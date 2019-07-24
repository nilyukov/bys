<?php

spl_autoload_register(function($className){
    $classPaths = [
        '/components/',
        '/models/'
    ];
    foreach ($classPaths as $path) {
        $path = ROOT . $path . $className . '.php';
        if(is_file($path)) {
            include_once $path;
        }
    }
});