<?php 
session_start();
$apiUrl = 'https://showmarket-api.herokuapp.com/api/';

function getJson($api){
    global $apiUrl;
    $response = file_get_contents($apiUrl.$api);
    $response = json_decode($response);
    $response = json_decode(json_encode($response), true);
    return $response;
}
function curlPost($url, $data=NULL, $req = NULL,$headers = NULL,) {
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    if(!empty($data)){
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    }

    if (!empty($headers)) {
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    }

    if (!empty($req)) {
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $req);
    }
    $response = curl_exec($ch);

    if (curl_error($ch)) {
        trigger_error('Curl Error:' . curl_error($ch));
    }
    curl_close($ch);
    return $response;
}


function curlJson($url, $data=NULL, $req = NULL,$headers = NULL,){
    
    $postdata = json_encode($data);
    $ch = curl_init($url); 
    curl_setopt($ch, CURLOPT_POST, 1);
    if (!empty($req)) {
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $req);
    }
    curl_setopt($ch, CURLOPT_POSTFIELDS, $postdata);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
    $result = json_decode(curl_exec($ch), true);
    curl_close($ch);
    return $result;
}
function city_get_all(){
    return getJson('cities')['data'];
}
function category_get_all(){
    return getJson('category')['data'];
}
function bussines_get_all(){
    return getJson('category')['data'];
}
function service_get_all(){
    return getJson('service')['data'];
}
function category_get($x){
    return getJson('category')['data'][$x];
}