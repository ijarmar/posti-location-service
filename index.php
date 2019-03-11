<?php 
require_once("objects/Locations.php");

$url = 'https://locationservice.posti.com/location';

$locations = new Locations($url);
//$info = ['id', 'address', 'pupCode']; // elements to be recieved
//$info = [04130];
//$info = [null];

//$arr = $locations->getLocationsByCity('Sibbo', $info);

//echo '<body><pre>' . print_r($arr) . '</pre></body>';
//print_r($arr['locations'][1]['type']); // output element of array

$arr = $locations->getAllPublicNames('FI');

print_r(json_encode($arr, JSON_PRETTY_PRINT));
?>