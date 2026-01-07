<?php

$shop = getenv('SHOPIFY_SHOP_DOMAIN');
$accessToken = getenv('SHOPIFY_ACCESS_TOKEN');
$apiVersion = "2025-01";

if (!$shop || !$accessToken) {
    die('Environment variables not found');
}

$url = "https://$shop/admin/api/$apiVersion/products.json";

$ch = curl_init($url);

curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    "X-Shopify-Access-Token: $accessToken",
    "Content-Type: application/json"
]);

$response = curl_exec($ch);

if (curl_errno($ch)) {
    echo 'Curl Error: ' . curl_error($ch);
}

curl_close($ch);

echo "<pre>";
print_r(json_decode($response, true));
