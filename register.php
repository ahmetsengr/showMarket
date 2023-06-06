<?php
require_once('functions.php');

$register= curlJson('showmarket-api.herokuapp.com/api/auth/register', [
    'name' => 'husow',
    'surname' => 'asd',
    'mail' => 'i@no13.web.tr',
    'gsm' => '905443955688',
    'password' => '123456123465',
]);
print_r($register);