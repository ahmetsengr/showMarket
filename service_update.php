<?php
require_once('functions.php');

$s =  curlJson('showmarket-api.herokuapp.com/api/service/get-by-category', [
    "category" => "Sinema"
], 'GET');
print_r($s);