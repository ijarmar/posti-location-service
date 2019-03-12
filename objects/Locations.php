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

    public function getAllLocations(string $countryCode, int $limit) {

        $top = '&top=' . 25;
        
        if($limit == null) {
            $top = '&top=' . 25;
        } else if($limit == 0) {
            $top = '&top=' . 25;
        }

        $result = CurlRequest::curlInitiate($this->apiURL . '?countryCode=' . $countryCode . $top);
        $result = json_decode($result, true);

        return $result; // returns array with posti locations in the country limited by $limit
    }

    public function getLocationsByStrictZipCode(int $zipCode, bool $strict) {

        /**
         * This is a DocBlock.
         **/
        if($strict == null) {
            $strict = 20;
        } else if($strict == 0) {
            $strict = 20;
        }

        $result = CurlRequest::curlInitiate($this->apiURL . '?zipCode=' . $zipCode . '&strictZipCode=' . $strict);
        $result = json_decode($result, true);

        return $result;
    }

    public function getLocationsByLatitude(int $lat, int $limit, int $distance) {
        // can recieve only one param - limit || distance one has to be null

        if($distance != null && $limit != null) {
            $distance = '';
        }
        else if($limit == null && $distance != '') {
            $limit = '';
            $distance = '&distance=' . $distance;
        } else {
            $distance = '';
            $limit = '&top=' . $limit;
        }

        $result = CurlRequest::curlInitiate($this->apiURL . '?lat=' . $lat . $limit . $distance);
        $result = json_decode($result, true);

        return $result;
    }

    public function getLocationsByLongitude(int $lng, int $limit, int $distance) {
        // can recieve only one param - limit || distance one has to be null

        if($distance != null && $limit != null) {
            $distance = '';
        }
        else if($limit == null && $distance != '') {
            $limit = '';
            $distance = '&distance=' . $distance;
        } else {
            $distance = '';
            $limit = '&top=' . $limit;
        }

        $result = CurlRequest::curlInitiate($this->apiURL . '?lng=' . $lat . $limit . $distance);
        $result = json_decode($result, true);

        return $result;
    }

    public function getGeographicalBoxByCoordinates(int $topLeftLat, int $topLeftLng, int $bottomRightLat, int $bottomRightLng) {

        $result = CurlRequest::curlInitiate($this->apiURL . '&topLeftLat=' . $topLeftLat .
                                            '&topLeftLng=' . $topLeftLng . 
                                            '&bottomRightLat=' . $bottomRightLat .
                                            '&bottomRightLng=' . $bottomRightLng);
        $result = json_decode($result, true);

        return $result;
    }
    
}
?>