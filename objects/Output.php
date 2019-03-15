<?php 
namespace postiApi;

class Output {

    public function __construct(array $outputArray, string $lang = null) {
        $this->outputArray = $outputArray;
        
        if(empty($lang)) {
            $lang = 'fi';
        }
        $this->lang = $lang;
    }

    public function getRawOutput() {
        return $this->outputArray;
    }

    public function getId() {
        return $this->outputArray['id'];
    }

    public function getType() {
        return $this->outputArray['type'];
    }

    public function getPostalCode() {
        return $this->outputArray['postalCode'];
    }

    public function getAddress() {
        return $this->outputArray['address'][$this->lang];
    }

    public function getPublicName() {
        return $this->outputArray['publicName'][$this->lang];
    }

    public function getLabelName() {
        return $this->outputArray['labelName'][$this->lang];
    }

    public function getCountryCode() {
        return $this->outputArray['countryCode'];
    }

    public function getCustomerServicePhoneNumber() {

        if($this->outputArray['customerServicePhoneNumber'] != '') {
            return $this->outputArray['customerServicePhoneNumber'];
        }
        return 'false';
    } 

    public function getAvailability() {

        if($this->outputArray['availability'] != '') {
            return $this->outputArray['availability'];
        }
        return 'false';
    }

    public function getWheelChairAccess() {

        if($this->outputArray['wheelChairAccess'] === true) { // true
            return $this->outputArray['wheelChairAccess'];
        }
        return 'false';
    }

    public function getPupCode() {
        return $this->outputArray['pupCode'];
    }

    public function getRoutingServiceCode() {
        return $this->outputArray['routingServiceCode'];
    }

    public function getLocationCoordinates() {
        return $this->outputArray['location'];
    }

}
?>