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

![example snippet](https://github.com/sovelluskontti/posti-location-service/carbon.png)