<?php
session_start();
$_SESSION['active_user'] = '';
header("Location: http://localhost/Restraunt%20management%20system/index.php");
