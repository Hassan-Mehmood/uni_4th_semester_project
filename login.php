<?php require 'header.php'  ?>

<section class="login_form max_width">
  <div>  
    <form class="modal-content" method="post">
      <div class="container">
        <label for="uname"><b>Username</b></label>
        <input type="text" placeholder="Enter Username" name="uname" required>

        <label for="psw"><b>Password</b></label>
        <input type="password" placeholder="Enter Password" name="psw" required>
          
        <button type="submit" class='login_form_button'>Login</button>
      </div>
    </form>
  </div>
</section>

<?php require 'footer.php' ?>