<?php

echo "Hello my php file deploy<br>";
$token = $_SERVER['SHOPIFY_ACCESS_TOKEN'] ?? null;
echo "tokan  ======",$token ;

echo "<br>";
$token = getenv('SHOPIFY_ACCESS_TOKEN');
echo "tokan2  ======",$token ;
echo "<br>";
$envPath = __DIR__ . '/.env';

echo "dddddddddddddddd<br>";
if (!file_exists($envPath)) {
    echo'.env file not found';
    die;
}

$env = parse_ini_file($envPath);

$shop = $env['SHOPIFY_SHOP_DOMAIN'] ?? null;
$accessToken = $env['SHOPIFY_ACCESS_TOKEN'] ?? null;
echo "$shop this is shop name and $accessToken this token";