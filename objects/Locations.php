<?php 
namespace postiApi;

class Locations {

    private $api;

    public function __construct(string $apiURL, string $lang = null) {
        $this->apiURL = $apiURL;

        if($this->checkIfNull($lang)) {
            $lang = 'fi';
        }
        $this->lang = $lang;
    }
    
    public function getLocationsByCity(string $city) {

        $result = CurlRequest::curlInitiate($this->apiURL . '?city=' . $city);
        $output = CurlRequest::getOutput($result, $this->lang); // slim version of info

        return $output;
    }

    public function getLocationsByZipCode(int $zipCode) {

        $result = CurlRequest::curlInitiate($this->apiURL . '?zipCode=' . $zipCode);
        $output = CurlRequest::getOutput($result, $this->lang);

        return $output;
    }

    public function getLocationsByMunicipality(string $municipality) {

        $result = CurlRequest::curlInitiate($this->apiURL . '?municipality=' . $municipality);
        $output = CurlRequest::getOutput($result);

        return $output;
    }

    public function getLocationsByPupCode(int $pupCode) {

        $result = CurlRequest::curlInitiate($this->apiURL . '?pupCode=' . $pupCode);
        $output = CurlRequest::getOutput($result);

        return $output;
    }

    public function getAllLocations(string $countryCode, int $limit) {

        $top = '&top=25';
        
        if($limit != 0) {
            $top = '&top=' . str($limit);
        }

        $result = CurlRequest::curlInitiate($this->apiURL . '?countryCode=' . $countryCode . $top);
        $output = CurlRequest::getOutput($result);

        return $output;
    }

    public function getLocationsByStrictZipCode(int $zipCode) {

        $result = CurlRequest::curlInitiate($this->apiURL . '?zipCode=' . $zipCode . '&strictZipCode=true');
        $output = CurlRequest::getOutput($result);

        return $output;
    }

    public function getLocationsByLatitude(float $lat, int $limit, float $distance) {
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

        return $output;
    }

    public function getLocationsByLongitude(float $lng, int $limit, float $distance) {
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

        return $output;
    }

    public function getGeographicalBoxByCoordinates(float $topLeftLat, float $topLeftLng, float $bottomRightLat, float $bottomRightLng) {

        $result = CurlRequest::curlInitiate($this->apiURL . 
                                            '?topLeftLat=' . $topLeftLat .
                                            '&topLeftLng=' . $topLeftLng . 
                                            '&bottomRightLat=' . $bottomRightLat .
                                            '&bottomRightLng=' . $bottomRightLng);
        $output = CurlRequest::getOutput($result);

        return $output;
    }

    public function getLocationsByCityRaw(string $city) {
        $result = CurlRequest::curlInitiate($this->apiURL . '?city=' . $city);
        return $result;
    }

    public function getLocationsByZipCodeRaw(int $zipCode) {
        $result = CurlRequest::curlInitiate($this->apiURL . '?zipCode=' . $zipCode);
        return $result;
    }

    public function getLocationsByMunicipalityRaw(string $municipality) {
        $result = CurlRequest::curlInitiate($this->apiURL . '?municipality=' . $municipality);
        return $result;
    }

    public function getLocationsByPupCodeRaw(int $pupCode) {
        $result = CurlRequest::curlInitiate($this->apiURL . '?pupCode=' . $pupCode);
        return $result;
    }

    public function getAllLocationsRaw(string $countryCode, int $limit) {
        $top = '&top=25';
        
        if($limit != 0) {
            $top = '&top=' . str($limit);
        }

        $result = CurlRequest::curlInitiate($this->apiURL . '?countryCode=' . $countryCode . $top);
        return $result;
    }

    public function getLocationsByStrictZipCodeRaw(string $zipCode) {
        $result = CurlRequest::curlInitiate($this->apiURL . '?zipCode=' . $zipCode . '&strictZipCode=true');
        return $result;
    }

    public function getLocationsByLatitudeRaw(float $lat, int $limit, float $distance) {
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
        return $result;
    }

    public function getLocationsByLongitudeRaw(float $lng, int $limit, float $distance) {
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

        $result = CurlRequest::curlInitiate($this->apiURL . '?lng=' . $lng . $limit . $distance);
        return $result;
    }

    public function getGeographicalBoxByCoordinatesRaw(float $topLeftLat, float $bottomLeftLng, float $bottomRightLat, float $topRightLng) {
        $result = CurlRequest::curlInitiate($this->apiURL . 
        '?topLeftLat=' . $topLeftLat .
        '&topLeftLng=' . $topLeftLng . 
        '&bottomRightLat=' . $bottomRightLat .
        '&bottomRightLng=' . $bottomRightLng);
        return $result;
    }

    private function checkIfNull($param) {
        if($param == null) {
            return true;
        }
        return false;
    }
    
}
?>