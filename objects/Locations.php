<?php 
namespace postiApi;

class Locations {

    private $api;

    public function __construct(string $apiURL, string $lang = null) {
        $this->apiURL = $apiURL;

        if(empty($lang)) {
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

    public function getLocationsByCoordinates(float $lat, float $lng, int $limit = 10, int $distance = 0) {

        if(isset($limit) && isset($distance)) {
            $distance = '&distance' . $distance;
            $limit = '&top=' . $limit;
        } else {
            $distance = '';
            $limit = '&top=' . $limit;
        }

        $result = CurlRequest::curlInitiate($this->apiURL . '?lat=' . $lat . '&lng='. $lng . $limit . $distance);
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

    public function getAllWheelChairLocations(string $city = '') {

        if(isset($city)) {
            $city = '?city=' . $city;
            $country = '';
        } else {
            $country = '?countryCode=FI';
        }

        $result = CurlRequest::curlInitiate($this->apiURL . $country . $city);
        $output = CurlRequest::getOutput($result);

        $wheelChairAccessTrue = [];

        foreach($output as $posti) {
            if(in_array('wheelChairAccess => true', $posti)) {
                array_push($wheelChairAccessTrue, $posti);
            }
        }

        return $wheelChairAccessTrue;
    }

    public function getAvailableLocations(string $city) {

        $currentTime = getdate();
        $availablePosti = [];

        $todayDay = $currentTime['wday'] - 1;
        $nowHour = $currentTime['hours'];
        $nowMinutes = $currentTime['minutes'];
        $timeNow = $nowHour . '.' . $nowMinutes + 1;

        $result = CurlRequest::curlInitiate($this->apiURL . '?city=' . $city);

        foreach($result['locations'] as $posti) {

            $openingTimes = $posti['openingTimes'];
            $today = $openingTimes[$todayDay];
            $timeTo = $today['timeToWithPoint'];

            if($timeTo > $timeNow) {
                array_push($availablePosti, $posti);
            }
                
        }

        return $availablePosti;
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

    public function getLocationsByCoordinatesRaw(float $lat, float $lng, int $limit = 10, int $distance = 0) {

        if(isset($limit) && isset($distance)) {
            $distance = '&distance' . $distance;
            $limit = '&top=' . $limit;
        } else {
            $distance = '';
            $limit = '&top=' . $limit;
        }

        $result = CurlRequest::curlInitiate($this->apiURL . '?lat=' . $lat . '&lng='. $lng . $limit . $distance);
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

    public function getAllWheelChairLocationsRaw(string $city = '') {
        if(isset($city)) {
            $city = '?city=' . $city;
            $country = '';
        } else {
            $country = '?countryCode=FI';
        }

        $result = CurlRequest::curlInitiate($this->apiURL . $country . $city);

        $wheelChairAccessTrue = [];

        foreach($result['locations'] as $posti) {
            if(in_array('wheelChairAccess => true', $posti)) {
                array_push($wheelChairAccessTrue, $posti);
            }
        }

        return $wheelChairAccessTrue;
    }
    
}
?>