<?php 
header('Content-Type: text/html; charset=utf-8');

require "vendor/autoload.php";

$url = 'https://locationservice.posti.com/api/2/location';

$locations = new postiApi\Locations($url);

//$arr = $locations->getLocationsByCity('Sibbo', $info);

//$arr = $locations->getAllPublicNames('FI');

//$allLocations = $locations->getAllLocations('FI', 0);

/* $sijainnit = array();
foreach ($allLocations as $location) {

    $postoffice = new PostOffice($location);
    array_push($sijainnit, $postOffice);
    
    $postOffice->getStreetNumber('sv');
    // palauttaa array, 
} */

//$arr = $locations->getLocationsByCity('Sibbo');
//$arr = $locations->getLocationsByStrictZipCode(13100);
//$arr = $locations->getLocationsByLatitude(61.021528, 0, 500);
//$arr = $locations->getLocationsByLongitude(24.469359, 0, 1);
//$arr = $locations->getGeographicalBoxByCoordinates(60.226850265683396, 24.861389789074657, 60.118482801480674, 25.00262781092524);
//$arr = $locations->getLocationsByCity('Espoo');
$arr = $locations->getAllWheelChairLocations('Helsinki');

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
   <?php print("<pre>" . print_r($arr, true) . "</pre>") ?> 
   <?php //echo $outputObjects[0]['wheelChairAccess'] ?> 
</body>
</html>