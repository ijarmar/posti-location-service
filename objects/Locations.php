<?php 
namespace postiApi;

class Locations {

    private $api;

    public function __construct(string $apiURL) {
        $this->apiURL = $apiURL;
    }
    
    public function getLocationsByCity(string $city) {

        $result = CurlRequest::curlInitiate($this->apiURL . '?city=' . $city);
        $result = json_decode($result, true);

        return $result;
    }

    public function getLocationsByZipCode(int $zipCode) {

        $result = CurlRequest::curlInitiate($this->apiURL . '?zipCode=' . $zipCode);
        $result = json_decode($result, true);

        return $result;
    }

    public function getLocationsByMunicipality( string $municipality) {

        $result = CurlRequest::curlInitiate($this->apiURL . '?municipality=' . $municipality);
        $result = json_decode($result, true);

        return $result;
    }

    public function getLocationsByPupCode(int $pupCode) {

        $result = CurlRequest::curlInitiate($this->apiURL . '?pupCode=' . $pupCode);
        $result = json_decode($result, true);

        return $result;
    }

    public function getAllLocations(string $countryCode, int $limit = null) {
        
        if($limit = null) {
            $limit = 100;
        }

        $result = CurlRequest::curlInitiate($this->apiURL . '?countryCode=' . $countryCode . '&top=' . $limit);
        $result = json_decode($result, true);

        return $result; // returns array with posti locations in the country limited by $limit
    }

    public function getLocationsByStrictZipCode(int $zipCode, bool $strict) {

        /**
         * This is a DocBlock.
         **/

        $result = CurlRequest::curlInitiate($this->apiURL . '?zipCode=' . $zipCode . '&strictZipCode=' . $strict);
        $result = json_decode($result, true);

        return $result;
    }

    public function getLocationsByCoordinates() {

    }
    
}
?>