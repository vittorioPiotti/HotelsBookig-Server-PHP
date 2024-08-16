<?php

require_once __DIR__ . '/src/autoloader.php';

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");


$fapi = new FAPI();
$fapi->listener();



?>