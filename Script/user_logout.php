<?php
session_start();
$_SESSION['active_user'] = '';
session_destroy();
header("Location: http://localhost/Restaurant%20management%20system/index.php");
