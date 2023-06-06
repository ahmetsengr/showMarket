<?php
require_once('functions.php');

$service_add = curlJson('showmarket-api.herokuapp.com/api/service', [
    "user"=> "12321",
    "name"=> "Pera Konseri",
    "companyName"=> "Biletix",
    "sector"=> ['Konser'],
    "category"=> ['Konser', 'Festival'],
    "city"=> ['İzmir'],
    "distinct"=> ['Bayraklı'],
    "questions"=> ['Hes gerekli mi?', 'Soru falan'],
    "answer"=> ['evet gerekli', 'cevap falan'],
    "title"=> "Pera Konseri",
    "description"=> "Pera Konseri izmirde!!!",
    "img"=> "GSR-Website-Mobile_Homepage-Cover@4x.png",
    "rating"=> "0",
    "ratingCount"=> "0",
    "comments"=> "0",
    "about"=> "sadsadsa",
    "isActive"=> 1,
    "showHome"=> 1,
], 'POST');
 
print_r($service_add);