
<?php

require __DIR__.'/vendor/autoload.php';

use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;

// This assumes that you have placed the Firebase credentials in the same directory
// as this PHP file.
$serviceAccount = ServiceAccount::fromJsonFile(__DIR__.'/fir-test-c339f-firebase-adminsdk-0a34f-bd32325457.json');

//$storage = (new Factory())->createStorage();

//$storageClient = $storage->getStorageClient();
//$defaultBucket = $storage->getBucket();
//$anotherBucket = $storage->getBucket('another-bucket');

$firebase = (new Factory)
    ->withServiceAccount($serviceAccount)
    // The following line is optional if the project id in your credentials file
    // is identical to the subdomain of your Firebase project. If you need it,
    // make sure to replace the URL with the URL of your project.
    ->withDatabaseUri('https://fir-test-c339f.firebaseio.com/')
    ->create();

$database = $firebase->getDatabase();

?>