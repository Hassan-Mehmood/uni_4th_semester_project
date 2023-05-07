<?php

require_once 'connection.php';

$item_id = $_GET['item_id'];
$reservation_id = $_GET['reservation_id'];

// Add code here to validate input and check authorization...

$sql = "INSERT INTO orders (item_id, reservation_id) VALUES (?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ii", $item_id, $reservation_id);
$stmt->execute();

// Add code here to handle success or failure...
header('location: http://localhost/Restaurant%20management%20system/reservation.php?order_result=success');

$stmt->close();
