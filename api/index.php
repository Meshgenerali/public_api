<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json; charset=UTF-8');

$email = "meshackmuuo595@gmail.com";
$current_datetime = gmdate('Y-m-d\TH:i:s\Z');
$github_url = '<https://github.com/Meshgenerali/public_api.git>';

$response = [
    "email" => $email,
    "current_datetime" => $current_datetime,
    "github_url" => $github_url
];

echo json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
