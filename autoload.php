<?php


function app_autoload($controller){
    include 'controllers/' . $controller . '.php';
}

spl_autoload_register("app_autoload");