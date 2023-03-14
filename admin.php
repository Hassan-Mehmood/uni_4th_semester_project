<?php
session_start();
require 'header.php';

$empty_fields = '';

// Checking if the admin is logged in
if (!isset($_SESSION['admin'])) {
  // If adming is not loggedin redirect to the login page
  header("Location: http://localhost/Restraunt%20management%20system/admin_login.php");
}

if (isset($_POST['add_item'])) {

  $itemName = htmlspecialchars($_POST['item_name']);
  $price = htmlspecialchars($_POST['item_price']);
  $description = htmlspecialchars($_POST['description']);
  $category = htmlspecialchars($_POST['category']);

  if (empty(trim($itemName)) || empty(trim($price)) || empty(trim($description)) || empty(trim($category))) {
    $empty_fields = 'Empty Fields';
  } else {

    // $sql_query = 'INSERT INTO '


  }
}



?>

<div class="max_width">
  <section class="admin_menu_section " id="menu">
    <div class="add_menu_item_button">
      <button id="add_item_btn">Add Item</button>
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
            <button id="edit_item_btn">Edit</button>
            <button>Delete</button>
          </div>
        </div>
      <?php } ?>
    </div>
  </section>

  <section class="add_menu_item hidden">
    <form class="modal-content" action="" method="post">
      <div class="container">
        <div class="menu_header">
          <h3>Add Item</h3>
          <img src="./Images/close.png" alt="Close" class="add_close_icon_img">
        </div>
        <label for="item_name"><b>Item Name</b></label>
        <input type="text" name="item_name" class="item_name" id="item_name" required>

        <label for="item_price"><b>Price</b></label>
        <input type="price" name="price" class="item_price" id="item_price" required>

        <label for="item_description"><b>Description</b></label>
        <textarea type="Description" name="description" class="item_Description" id="item_description" required> </textarea>

        <label for="item_category"><b>Category</b></label>
        <input type="category" name="category" class="item_category" id="item_category" required>

        <button type="submit" class='login_form_button' name="add_item">
          Add Item
        </button>
      </div>
    </form>
  </section>

  <section class="edit_menu_item hidden">
    <form class="modal-content" method="post">
      <div class="container">
        <div class="menu_header">
          <h3>Edit Item</h3>
          <img src="./Images/close.png" alt="Close" class="edit_close_icon_img">
        </div>
        <label for="item_name"><b>Item Name</b></label>
        <input type="text" name="item_name" class="item_name" id="item_name" required>

        <label for="item_price"><b>Price</b></label>
        <input type="price" name="price" class="item_price" id="item_price" required>

        <label for="item_description"><b>Description</b></label>
        <textarea type="Description" name="description" class="item_Description" id="item_description" required> </textarea>

        <label for="item_category"><b>Category</b></label>
        <input type="category" name="category" class="item_category" id="item_category" required>

        <button type="submit" class='login_form_button'>
          Edit Item
        </button>
      </div>
    </form>
  </section>
</div>

<?php require 'footer.php' ?>