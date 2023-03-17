<?php
// session_start();
require 'header.php';

$form_error = '';

// Checking if the admin is logged in
if (!isset($_SESSION['admin'])) {
  // If adming is not loggedin redirect to the login page
  header("Location: http://localhost/Restraunt%20management%20system/admin_login.php");
}

$sql_query = 'SELECT * FROM item';
$result = mysqli_query($conn, $sql_query);
?>

<div class="max_width">
  <section class="admin_menu_section " id="menu">
    <div class="add_menu_item_button">
      <a href="add_item.php">Add Item</a>
    </div>
    <div class="admin_menu_items">
      <?php
      if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) { ?>
          <div class="admin_menu_item">
            <div class="item_info">
              <div class="menu_item_img">
                <img src="./Images/menu_item1.jpg" alt="Food Item Image" />
              </div>
              <div class="menu_item_text">
                <h4 class="menu_item_name"><?= $row['name'] ?></h4>
                <span class="menu_item_price">$<?= $row['price'] ?></span>
                <p class="menu_item_detail">
                  <?= $row['description'] ?>
                </p>
              </div>
            </div>
            <div>
              <a href="edit_item.php?id=<?= $row['id'] ?>">Edit</a>
              <a href="./Script/delete_item.php?id=<?= $row['id'] ?>">Delete</a>
            </div>
          </div>
      <?php }
      } ?>
    </div>
  </section>
</div>

<?php require 'footer.php' ?>