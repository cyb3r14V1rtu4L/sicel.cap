<?php
/**
 * Created by PhpStorm.
 * User: Cyberio
 * Date: 9/02/17
 * Time: 04:35 PM
 */
$root = $_SERVER['DOCUMENT_ROOT'];

include __DIR__.'/../Core/Config.php';
include __DIR__.'/../vendor/autoload.php';
include __DIR__.'/../config/database.php';

use Illuminate\Database\Capsule\Manager as Capsule;


Capsule::schema()->create('users', function ($table) {
    $table->increments('id');
    $table->integer('member_id');
    $table->string('name');
    $table->string('email')->unique();
    $table->string('password');
    $table->rememberToken();
    $table->timestamps();
});

Capsule::schema()->table('users',function($table){
    $table->integer('type')->after('password');
});
