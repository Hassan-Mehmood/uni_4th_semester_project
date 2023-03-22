<?php
// session_start();
require 'header.php';

// if (isset($_SESSION['admin'])) {
//   header("Location: http://localhost/Restraunt%20management%20system/admin.php");
// }

$form_error = '';
$invalid_email = '';
$invalid_phone_number = '';
$username_exists = false;

if (isset($_POST['user_signup'])) {
  $username = htmlspecialchars($_POST['uname']);
  $fullname = htmlspecialchars($_POST['full_name']);
  $email = htmlspecialchars($_POST['email']);
  $phone = htmlspecialchars($_POST['phone']);
  $password = htmlspecialchars($_POST['password']);


  //There is a glitch in these if statements 
  //Will solve it later
  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) $invalid_email = 'Invalid Email';
  if (!preg_match('/^[0-9]{11}+$/', $phone)) $invalid_phone_number = 'Invalid Phone number';



  if (empty(trim($username)) || empty(trim($fullname)) || empty(trim($email)) || empty(trim($phone))  || empty(trim($password))) {
    $form_error = 'Empty fields';
  } else {
    $check_username_query = "SELECT * FROM customer WHERE username = ?";
    $username_exists = username_exists($conn, $check_username_query, $username);

    if ($username_exists) {
      $form_error = 'Username already exists';
    } else {
      $sql_query = "INSERT INTO customer (username, full_name, email, phone_number, password) VALUES (?, ?, ?, ?, PASSWORD(?))";

      if ($stmt = mysqli_prepare($conn, $sql_query)) {
        mysqli_stmt_bind_param($stmt, "sssss", $username, $email, $fullname, $phone, $password);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_get_result($stmt);
        header("Location: http://localhost/Restraunt%20management%20system/user_login.php");
      } else {
        $form_error = 'Something went wrong';
      }
    }
  }
}
?>

<section class="form signup_form max_width">
  <div>
    <form class="modal-content" action="" method="post">
      <div class="container">
        <label for="uname"><b>Username</b></label>
        <input type="text" name="uname" class="username">

        <label for="full_name"><b>Full Name</b></label>
        <input type="text" name="full_name" class="full_name">

        <label for="email"><b>E-mail</b></label> <span class="admin_login_error"><?= $invalid_email; ?></span>

        <input type="email" name="email" class="email">

        <label for="phone"><b>Phone number</b></label> <span class="admin_login_error"><?= $invalid_phone_number; ?></span>
        <input type="text" name="phone" class="phone">

        <label for="password"><b>Password</b></label>
        <input type="password" name="password" class="password">

        <div class="form_error_container">
          <span class="admin_login_error"><?= $form_error; ?></span>
          <span>Already have an account? <a href="user_login.php">Log in</a></span>
        </div>
        <button type="submit" class='login_form_button' name="user_signup">Signup</button>
      </div>
    </form>
  </div>
</section>

<?php require 'footer.php' ?>