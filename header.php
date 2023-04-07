<?php
session_start();
require_once './Script/connection.php';
require_once './Script/functions.php';
$active_user = '';

if (isset($_SESSION['active_user'])) {
  $active_user = $_SESSION['active_user'];
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="./Styles/style.css" />
  <title>Restaurant Management System</title>
</head>

<body>
  <nav class="nav">
    <div class="max_width nav_container">
      <div class="logo">
        <img src="./Images/logo.png" alt="Logo" class="logo_img" />
        <h1>Dinery</h1>
      </div>
      <ul class="nav_links">
        <li><a href="index.php">Home</a></li>
        <li><a href="index.php#about_us">About us</a></li>
        <li><a href="menu.php">Menu</a></li>
        <li><a href="reservation.php">Reservation</a></li>
        <li>
          <?php if (!$active_user) { ?>
            <a href="user_login.php">Login</a>
          <?php } else { ?> <a href="./Script/user_logout.php">Log out</a> <?php } ?>
        </li>
        <li><a href="admin.php">Admin</a></li>

      </ul>
    </div>
  </nav>