<?php
if (array_key_exists('location', $_REQUEST)) {
    $maps_url = 'https://maps.googleapis.com/maps/api/geocode/json?address=' . urlencode($_GET['location']);
    $maps_json = file_get_contents($maps_url);
    $maps_array = json_decode($maps_json, true);
    $lat = $maps_array['results'][0]['geometry']['location']['lat'];
    $long = $maps_array['results'][0]['geometry']['location']['lng'];
    // appid is the API key from OpenWeatherMap
    // See http://openweathermap.org/appid
    $weather_url = 'http://api.openweathermap.org/data/2.5/weather?lat='.$lat.'&lon='.$long.'&appid='.$_REQUEST['appid'];
    $weather_json = file_get_contents($weather_url, true);
    header('Content-type', 'application/json');
    print($weather_json);
}