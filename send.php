<?php
$data = json_decode(file_get_contents('php://input'), true);

if (!$data) {
    exit('Missing Post Data');
}

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://api.telegram.org/bot' . $data['token'] . '/sendMessage');
curl_setopt($ch, CURLOPT_HTTPHEADER, array("Content-type: application/json"));
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $data['jsonData']);
curl_exec($ch);
curl_close($ch);
