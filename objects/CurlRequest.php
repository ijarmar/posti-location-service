<?php
namespace postiApi;
class CurlRequest {

    public static function curlInitiate($url) {
        $curl = curl_init(); // start curl session

        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_URL, $url);
        $res = curl_exec($curl);

        curl_close($curl);
        
        return $res; // returns an array
    }

}
?>