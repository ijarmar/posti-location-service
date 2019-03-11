<?php 
require_once("objects/Curl.php");

class Locations {

    private $api;

    public function __construct($api) {
        $this->api = $api;
    }
    
    public function getLocationsByCity($city, $elementsArr) {

        $result = Curl::curlInitiate($this->api . '?city=' . $city);
        $result = json_decode($result, true);

        return $result;
    }

    public function getLocationsByZip($zip) {

        $result = Curl::curlInitiate($this->api . '?zipCode=' . $zip);
        $result = json_decode($result, true);

        return $result;
    }

    public function getLocationsByMunicipality($municipality) {

        $result = Curl::curlInitiate($this->api . '?municipality=' . $municipality);
        $result = json_decode($result, true);

        return $result;
    }

    public function getLocationsByPupCode($pupCode) {

        $result = Curl::curlInitiate($this->api . '?pupCode=' . $pupCode);
        $result = json_decode($result, true);

        return $result;
    }

    public function getAllPublicNames($countryCode) {
        
        $result = Curl::curlInitiate($this->api . '?countryCode=' . $countryCode);
        $result = json_decode($result, true);

        $res = [];

        foreach ($result['locations'] as $location) {
            array_push($res ,$location['address']['fi']);
        }

        return $res;
    }
}
?>