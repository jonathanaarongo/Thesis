<?php

require_once './vendor/autoload.php';

use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;

$serviceAccount = ServiceAccount::fromJsonFile( __DIR__.'/secret/thesisdb-fe122-firebase-adminsdk-sbyej-5feaaab60b.json');

$factory = (new Factory)
    ->withServiceAccount($serviceAccount)
    ->withDatabaseUri('https://thesisdb-fe122.firebaseio.com/')
    ->create();

$database = $factory->getDatabase();

die(print_r($database));