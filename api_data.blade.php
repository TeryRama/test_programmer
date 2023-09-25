<?php
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://recruitment.fastprint.co.id/tes/api_tes_programmer");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

// Jika API memerlukan metode POST
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, "username=tesprogrammer180923C17&password=" . md5("bisacoding-18-09-23"));

// Jika API memerlukan header khusus
$headers = array(
    "Header-Name: Header-Value",  // Contoh header
);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

$response = curl_exec($ch);

if (curl_errno($ch)) {
    // Menampilkan pesan error
    echo 'Error:' . curl_error($ch);
}

curl_close($ch);

$data = json_decode($response, true);
// Proses $data sesuai kebutuhan Anda
