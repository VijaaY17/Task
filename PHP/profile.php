
<?php
use MongoDB\Driver\ServerApi;

$uri = 'mongodb+srv://user:Wf8BKTYYRVFYmFii@uniops.edjbssv.mongodb.net/?retryWrites=true&w=majority&appName=uniops';
$apiVersion = new ServerApi(ServerApi::V1);
$client = new MongoDB\Client($uri, [], ['serverApi' => $apiVersion]);

try {
    $client->selectDatabase('admin')->command(['ping' => 1]);
    echo "Pinged your deployment. You successfully connected to MongoDB!\n";
} catch (Exception $e) {

    echo "Error connecting to MongoDB: " . $e->getMessage() . "\n";
}

?>