# posti-location-service
Unofficial PHP client for Posti location service. Check API documentation https://api.posti.fi/api-locationservice.html

## Installation
 - Run <code>composer install</code>

## Function examples

Function | Use
-------- | ---
`getLocationsByCity($city)` | Outputs all locations of Posti in the city
`getLocationsByZipCode($zipCode)` | Outputs all locations of Posti in the area code

## Example output

<code>[0] => Array
        (
            [id] => 4569
            [type] => LOCKER
            [postalCode] => 02154
            [address] => Array
                (
                    [address] => Keilasatama 5
                    [streetName] => Keilasatama
                    [streetNumber] => 5
                    [postalCode] => 02154
                    [postalCodeName] => ESPOO
                    [municipality] => ESPOO
                )
            [publicName] => Posti Smartpost,Keilasatama 5,KULKUOIKEUDEN HALTIJOILLE
            [labelName] => c/o Posti Smartpost,Keilasatama 5,KULKUOIKEUDEN HALTIJOILLE
            [countryCode] => FI
            [phoneNumber] => null
            [availability] => 24h
            [wheelChairAccess] => null
            [pupCode] => 021543204
            [routingCode] => 3204
            [coordinates] => Array
                (
                    [lat] => 60.1733488
                    [lon] => 24.829681
                )
        )</code>