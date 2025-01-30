<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

echo json_encode([
    'email' => 'meshackmuuo595@gmail.com',
    'timestamp' => date(DATE_ISO8601),
    'github_url' => 'link to my github repo'
]);