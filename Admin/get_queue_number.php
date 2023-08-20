<?php
// Kode ini simulasi untuk menghasilkan nomor antrian secara acak.
$queueNumber = rand(1, 100);

$response = array(
    'queueNumber' => $queueNumber
);

header('Content-Type: application/json');
echo json_encode($response);
?>