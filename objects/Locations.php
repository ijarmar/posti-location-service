<?php 
namespace postiApi;

class Locations {

    private $api;

    public function __construct(string $apiURL, string $lang = null) {
        $this->apiURL = $apiURL;

        if($lang == null) {
            $this->lang = 'fi';
        } else {
            $this->lang = $lang;
        }
    }
    
    public function getLocationsByCity(string $city, bool $raw = false) {

        $result = CurlRequest::curlInitiate($this->apiURL . '?city=' . $city);
        $output = CurlRequest::getOutput($result, $this->lang); // slim version of info

        if($raw) {
            return $result;
        }
        return $output;
    }

    public function getLocationsByZipCode(int $zipCode, bool $raw = false) {

        $result = CurlRequest::curlInitiate($this->apiURL . '?zipCode=' . $zipCode);
        $output = CurlRequest::getOutput($result, $this->lang);

        if($raw) {
            return $result;
        }
        return $output;
    }

    public function getLocationsByMunicipality(string $municipality) {

        $result = CurlRequest::curlInitiate($this->apiURL . '?municipality=' . $municipality);
        $output = CurlRequest::getOutput($result);

        if($raw) {
            return $result;
        }
        return $output;
    }

    public function getLocationsByPupCode(int $pupCode, bool $raw = false) {

        $result = CurlRequest::curlInitiate($this->apiURL . '?pupCode=' . $pupCode);
        $output = CurlRequest::getOutput($result);

        if($raw) {
            return $result;
        }
        return $output;
    }

    public function getAllLocations(string $countryCode, int $limit, bool $raw = false) {

        $top = '&top=25';
        
        if($limit != null) {
            $top = '&top=' . str($limit);
        }

        $result = CurlRequest::curlInitiate($this->apiURL . '?countryCode=' . $countryCode . $top);
        $output = CurlRequest::getOutput($result);

        if($raw) {
            return $result;
        }
        return $output;
    }

    public function getLocationsByStrictZipCode(int $zipCode, bool $strict = false, bool $raw = false) {
        if($strict) {
            $strict = 'true';
        } else {
            $strict = 'false';
        }

        $result = CurlRequest::curlInitiate($this->apiURL . '?zipCode=' . $zipCode . '&strictZipCode=' . $strict);
        $output = CurlRequest::getOutput($result);

        if($raw) {
            return $result;
        }
        return $output;
    }

    public function getLocationsByLatitude(float $lat, int $limit, float $distance, bool $raw = false) {
        // can recieve only one param - limit || distance one has to be null

        if($distance != 0 && $limit != 0) {
            $distance = '';
            $limit = '&top=' . $limit;
        }
        else if($limit == 0 && $distance != 0) {
            $limit = '';
            $distance = '&distance=' . $distance;
        } else {
            $distance = '';
            $limit = '&top=' . $limit;
        }

        $result = CurlRequest::curlInitiate($this->apiURL . '?lat=' . $lat . $limit . $distance);
        $output = CurlRequest::getOutput($result);

        if($raw) {
            return $result;
        }
        return $output;
    }

    public function getLocationsByLongitude(float $lng, int $limit, float $distance, bool $raw = false) {
        // can recieve only one param - limit || distance has to be equal to 0

        if($distance != 0 && $limit != 0) {
            $distance = '';
            $limit = '&top' . $limit;
        }
        else if($limit == 0 && $distance != 0) {
            $limit = '';
            $distance = '&distance=' . $distance;
        } else {
            $distance = '';
            $limit = '&top=' . $limit;
        }

        $result = CurlRequest::curlInitiate($this->apiURL . '?lng=' . $lng . $limit . $distance);
        $output = CurlRequest::getOutput($result);

        if($raw) {
            return $result;
        }
        return $output;
    }

    public function getGeographicalBoxByCoordinates(float $topLeftLat, float $topLeftLng, float $bottomRightLat, float $bottomRightLng, bool $raw = false) {

        $result = CurlRequest::curlInitiate($this->apiURL . 
                                            '?topLeftLat=' . $topLeftLat .
                                            '&topLeftLng=' . $topLeftLng . 
                                            '&bottomRightLat=' . $bottomRightLat .
                                            '&bottomRightLng=' . $bottomRightLng);
        $output = CurlRequest::getOutput($result);

        if($raw) {
            return $result;
        }
        return $output;
    }
    
}
?>