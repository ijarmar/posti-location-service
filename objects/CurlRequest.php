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

}
?>