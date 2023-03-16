<?php
// session_start();
require 'header.php';

$form_error = '';

// Checking if the admin is logged in
if (!isset($_SESSION['admin'])) {
  // If adming is not loggedin redirect to the login page
  header("Location: http://localhost/Restraunt%20management%20system/admin_login.php");
}
?>

<div class="max_width">
  <section class="admin_menu_section " id="menu">
    <div class="add_menu_item_button">
      <a href="add_item.php">Add Item</a>
    </div>
    <div class="admin_menu_items">
      <?php for ($i = 0; $i < 5; $i++) { ?>
        <div class="admin_menu_item">
          <div class="item_info">
            <div class="menu_item_img">
              <img src="./Images/menu_item1.jpg" alt="Food Item Image" />
            </div>
            <div class="menu_item_text">
              <h4 class="menu_item_name">Salmon Roll</h4>
              <span class="menu_item_price">$18</span>
              <p class="menu_item_detail">
                Lorem ipsum, dolor sit amet consectetur adipisicing elit. Similique, nisi.
              </p>
            </div>
          </div>
          <div>
            <a href="edit_item.php">Edit</a>
            <a>Delete</a>
          </div>
        </div>
      <?php } ?>
    </div>
  </section>
</div>

<?php require 'footer.php' ?>