<?php

header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");

if (!isset($_GET['url']) || empty($_GET['url'])) {

    echo json_encode([
        "code" => 1,
        "msg" => "URL kosong"
    ]);

    exit;
}

$url = $_GET['url'];

$api = "https://api.ryzumi.net/api/downloader/tiktok?url=" . urlencode($url);

$options = [
    "http" => [
        "method" => "GET",
        "header" => "User-Agent: Mozilla/5.0\r\n"
    ],
    "ssl" => [
        "verify_peer" => false,
        "verify_peer_name" => false
    ]
];

$context = stream_context_create($options);

$response = @file_get_contents($api, false, $context);

if ($response === FALSE) {

    echo json_encode([
        "code" => 1,
        "msg" => "Gagal ambil API"
    ]);

    exit;
}

echo $response;
?>