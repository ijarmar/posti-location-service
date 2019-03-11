<?php 
require_once("objects/Curl.php");

class Locations {

    private $api;

    public function __construct($apiURL) {
        $this->apiURL = $apiURL;
    }
    
    public function getLocationsByCity($city) {

        $result = CurlRequest::curlInitiate($this->apiURL . '?city=' . $city);
        $result = json_decode($result, true);

        return $result;
    }

    public function getLocationsByZip($zipCode) {

        $result = CurlRequest::curlInitiate($this->apiURL . '?zipCode=' . $zipCode);
        $result = json_decode($result, true);

        return $result;
    }

    public function getLocationsByMunicipality($municipality) {

        $result = CurlRequest::curlInitiate($this->apiURL . '?municipality=' . $municipality);
        $result = json_decode($result, true);

        return $result;
    }

    public function getLocationsByPupCode($pupCode) {

        $result = CurlRequest::curlInitiate($this->apiURL . '?pupCode=' . $pupCode);
        $result = json_decode($result, true);

        return $result;
    }

    public function getAllPublicNames($countryCode) {
        
        $result = CurlRequest::curlInitiate($this->apiURL . '?countryCode=' . $countryCode);
        $result = json_decode($result, true);

        $res = [];

        foreach ($result['locations'] as $location) {
            array_push($res ,$location['publicName']['fi']);
        }

        return $res; // returns array with Posti location names
    }

    public function getAddressByPublicName($publicName) {

        $result = CurlRequest::curlInitiate($this->apiURL . '?countryCode=FI');
        $result = json_decode($result, true);

        $res = [];

        $pname = array_search($publicName, $result);
        $address = array_search($address, $result);

        // push publicName to address array
        
        // search array with array_search and save two elements in variables
        
        // push variables to $res array and return

    }
}
?>