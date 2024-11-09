<?php

include 'vendor/autoload.php';

use Medoo\Medoo;

$database = new Medoo([
    'database_type' => 'mysql',
    'database_name' => 'documentation',
    'server' => 'localhost',
    'username' => 'root',
    'password' => ''
]);
