<?php

session_start();

require "config.php";

spl_autoload_register(function($class){

    if (file_exists('controllers/'.$class.'.php')) {
        require 'controllers/'.$class.'.php';
    } 
    
    else if (file_exists('controllersReport/'.$class.'.php')) {
        require 'controllersReport/'.$class.'.php';
    } 

    else if (file_exists('report/'.$class.'.php')) {
        require 'report/'.$class.'.php';
    } 
    
    else if (file_exists('models/'.$class.'.php')){
        require 'models/'.$class.'.php';
    }
    
    else if (file_exists('core/'.$class.'.php')){
        require 'core/'.$class.'.php';
    }   
});

$core = new Core();
$core->start();
