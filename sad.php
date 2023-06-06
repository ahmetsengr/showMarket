<?php
$apiUrl = 'https://showmarket-api.herokuapp.com/api/';
function apiCek($api){
    global $apiUrl;
    $response = file_get_contents($apiUrl.$api);
    $response = json_decode($response, true);
    return $response;
}
$services =apiCek('service')['data'];
print_r($services);

?>