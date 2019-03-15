<?php
namespace postiApi;
class CurlRequest {

    public static function curlInitiate(string $url) {
        $curl = curl_init(); // start curl session

        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_URL, $url);
        $res = curl_exec($curl);

        $httpCode = curl_getinfo($curl, CURLINFO_HTTP_CODE); // response code
        
        if($httpCode != 200) {
            echo $httpCode;
        }

        curl_close($curl);

        $res = json_decode($res, true);

        if(empty($res['locations'])) {
            return array("message" => "Error in used parameters");
        }
        
        return $res; // returns an array
    }

    public static function getOutput($result, $lang = null) {

        $output = [];

        foreach($result['locations'] as $location) {
            if(empty($lang)) {
                $outputObj = new Output($location);
            } else {
                $outputObj = new Output($location, $lang);
            }
        
            array_push($output, array(
                                "id" => $outputObj->getId(),
                                "type" => $outputObj->getType(),
                                "postalCode" => $outputObj->getPostalCode(),
                                "address" => $outputObj->getAddress(),
                                "publicName" => $outputObj->getPublicName(),
                                "labelName" => $outputObj->getLabelName(),
                                "countryCode" => $outputObj->getCountryCode(),
                                "phoneNumber" => $outputObj->getCustomerServicePhoneNumber(),
                                "availability" => $outputObj->getAvailability(),
                                "wheelChairAccess" => $outputObj->getWheelChairAccess(),
                                "pupCode" => $outputObj->getPupCode(),
                                "routingCode" => $outputObj->getRoutingServiceCode(),
                                "coordinates" => $outputObj->getLocationCoordinates()
                                )
            );
        }

        return $output; // returns array 
    }
}
?>