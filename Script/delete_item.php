<?php
require_once 'connection.php';
$id = $_GET['id'];
$query = "DELETE FROM item WHERE id=$id";
$queryResult = mysqli_query($conn, $query);
header('location: http://localhost/Restraunt%20management%20system/admin.php');
