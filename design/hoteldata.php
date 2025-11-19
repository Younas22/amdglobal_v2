<?php
// hoteldata.php

header('Content-Type: application/json');

// Print GET request data
echo "<pre>";
print_r($_GET);
echo "</pre>";

// Optional: if you also want to send JSON response back to AJAX
echo json_encode([
    'status' => 'success',
    'received_data' => $_GET
]);
?>
