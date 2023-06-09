<?php
// session_start();
require 'header.php';

$form_error = '';

if (isset($_POST['login'])) {
  $username = htmlspecialchars($_POST['uname']);
  $password = htmlspecialchars($_POST['password']);

  if (empty(trim($username)) || empty(trim($password))) {
    $form_error = 'Empty fields';
  } else {
    // User login
    $sql_query = "SELECT * FROM customer WHERE username = $username AND password = PASSWORD($password)";
    if ($stmt = mysqli_prepare($conn, $sql_query)) {
      mysqli_stmt_bind_param($stmt, "ss", $username, $password);
      mysqli_stmt_execute($stmt);
      $result = mysqli_stmt_get_result($stmt);

      if ($result->num_rows == 1) {
        $_SESSION['active_user'] = $result->fetch_assoc();
        header("Location: http://localhost/Restaurant%20management%20system/index.php");
      } else {
        $form_error = 'Incorrect username or password';
      }
    }
  }
}
?>

<section class="form max_width">
  <div>
    <form class="modal-content" action="" method="post">
      <div class="container">
        <label for="uname"><b>Username</b></label>
        <input type="text" placeholder="Enter Username" name="uname" class="username">

        <label for="password"><b>Password</b></label>
        <input type="password" placeholder="Enter Password" name="password" class="password">
        <div class="form_error_container">
          <span class="admin_login_error"><?= $form_error; ?></span>
          <span>Don't have an account? <a href="user_signup.php">Sign up</a></span>
        </div>
        <button type="submit" class='login_form_button' name="login">Login</button>
      </div>
    </form>
  </div>
</section>

<?php require 'footer.php' ?>