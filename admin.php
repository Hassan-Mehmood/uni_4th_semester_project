<?php require 'header.php';


// Checking if the admin is logged in
if (isset($_SESSION['user'])) {
  print "session exists";
} else {
  // If adming is not loggedin redirect to the login page
  header("Location: http://localhost/Restraunt%20management%20system/login.php");
}


?>




<?php require 'footer.php' ?>