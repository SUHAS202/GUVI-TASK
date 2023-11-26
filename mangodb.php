<?php
require_once 'vendor/autoload.php';
$databaseConnection = new MongoDB\Client('mongodb://localhost:27017');
$myDatabase = $databaseConnection->myDB;
$userCollection = $myDatabase->user;
    