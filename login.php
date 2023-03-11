<?php require 'header.php'; ?>

<section class="form max_width">
  <div>
    <form class="modal-content" action="" method="post">
      <div class="container">
        <label for="uname"><b>Username</b></label>
        <input type="text" placeholder="Enter Username" name="uname" class="username" required>

        <label for="password"><b>Password</b></label>
        <input type="password" placeholder="Enter Password" name="password" class="password" required>

        <button type="submit" class='login_form_button'>Login</button>
      </div>
    </form>
  </div>
</section>

<?php require 'footer.php' ?>