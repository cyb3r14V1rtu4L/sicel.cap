<?php

date_default_timezone_set('America/Mexico_City');

error_reporting(E_ALL);
ini_set('display_errors', 1);


//directorio del proyecto
define('ROOT', realpath(dirname(__FILE__)));
define('DS', DIRECTORY_SEPARATOR);


//directorio app
define("APPPATH", ROOT . '/App');

use Core\Session;

//autoload con namespaces
function autoload_classes($class_name)
{
    $filename = ROOT . '/' . str_replace('\\', '/', $class_name) .'.php';
    /*echo $filename.'<br>';*/
    if(is_file($filename))
    {
        include_once $filename;
    }
}

spl_autoload_register('autoload_classes');

include('Core/Config.php');
//registramos el autoload autoload_classes
require 'vendor/autoload.php';
require 'config/database.php';

Session::init();


//$inflection = new \Core\Inflection;

$app= new \Core\App;

$app->run();