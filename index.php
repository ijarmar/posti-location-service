<?php 
header('Content-Type: text/html; charset=utf-8');

require "vendor/autoload.php";

$url = 'https://locationservice.posti.com/location';

$locations = new postiApi\Locations($url);
//$info = ['id', 'address', 'pupCode']; // elements to be recieved
//$info = [04130];
//$info = [null];

//$arr = $locations->getLocationsByCity('Sibbo', $info);

//echo '<body><pre>' . print_r($arr) . '</pre></body>';
//print_r($arr['locations'][1]['type']); // output element of array

//$arr = $locations->getAllPublicNames('FI');

$arr = $locations->getAllLocations('FI');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
   <?php print_r($arr); ?> 
</body>
</html>