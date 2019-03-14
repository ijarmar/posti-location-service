<?php 
header('Content-Type: text/html; charset=utf-8');

require "vendor/autoload.php";

$url = 'https://locationservice.posti.com/api/2/location/';

$locations = new postiApi\Locations($url);

//$arr = $locations->getLocationsByCity('Sibbo', $info);

//echo '<body><pre>' . print_r($arr) . '</pre></body>';
//print_r($arr['locations'][1]['type']); // output element of array

//$arr = $locations->getAllPublicNames('FI');

//$allLocations = $locations->getAllLocations('FI', 0);

/* $sijainnit = array();
foreach ($allLocations as $location) {

    $postoffice = new PostOffice($location);
    array_push($sijainnit, $postOffice);
    
    $postOffice->getStreetNumber(sv);
    # code...
    // palauttaa array, 
} */

//$arr = $locations->getLocationsByCity('Sibbo');
//$arr = $locations->getLocationsByStrictZipCode(13100);
//$arr = $locations->getLocationsByLatitude(61.021528, 0, 500);
//$arr = $locations->getLocationsByLongitude(24.469359, 0, 1);
//$arr = $locations->getGeographicalBoxByCoordinates(60.226850265683396, 24.861389789074657, 60.118482801480674, 25.00262781092524);
$outputObjects = $locations->getLocationsByCity('Espoo');

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
   <?php # print_r($outputObjects[0]['address']); ?>
   <?php # print_r($outputObjects[0]->getAdress()); ?> 
   <?php print("<pre>" . print_r($outputObjects, true) . "</pre>") ?> 


</body>
</html>