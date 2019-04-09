<?php
/**
 * Created by PhpStorm.
 * User: Cyberio
 * Date: 9/02/17
 * Time: 03:18 PM
 */
use Illuminate\Database\Capsule\Manager as Capsule;

$capsule = new Capsule;

$capsule->addConnection([
    'driver'=>'mysql',
    'host'=>DB_HOST,
    'database'=>DB_NAME,
    'username'=>DB_USER,
    'password'=>DB_PASS,
    'charset' => 'utf8',
    'collation'=>'utf8_unicode_ci'

]);

$capsule->setAsGlobal();
$capsule->bootEloquent();
