<?php require 'header.php';
$form_error = '';
$form_response = '';
$id = $_GET['id'];

// Checking if the admin is logged in
if (!isset($_SESSION['admin'])) {
  // If adming is not loggedin redirect to the login page
  header("Location: http://localhost/Restraunt%20management%20system/admin_login.php");
}

if (isset($_POST['update_item'])) {
  $itemName = htmlspecialchars($_POST['item_name']);
  $price = htmlspecialchars($_POST['price']);
  $description = htmlspecialchars($_POST['description']);
  $category = htmlspecialchars($_POST['category']);

  if (empty(trim($itemName)) || empty(trim($price)) || empty(trim($description)) || empty(trim($category))) {
    $form_error = 'Empty Fields';
  } else if (!preg_match('/^[0-9]*$/', $price)) {
    $form_error = 'Price should be a number';
  } else {
    $sql_query = "UPDATE item SET name=?, description=?, price=?, category=? WHERE id=$id";

    if ($stmt = mysqli_prepare($conn, $sql_query)) {
      mysqli_stmt_bind_param($stmt, "ssis", $itemName, $description, $price, $category);
      mysqli_stmt_execute($stmt);
      $result = mysqli_stmt_get_result($stmt);

      $form_response = 'Item edited';
    } else {
      $form_response = 'Something went wrong';
    }
  }
}


// Getting the item to populate the form
$query = "SELECT * FROM item WHERE id=$id";
$queryResult = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($queryResult);



?>


<section class="edit_menu_item hidden">
  <form class="modal-content" method="post">
    <div class="container">
      <div class="menu_header">
        <h3>Edit Item</h3>
      </div>
      <label for="item_name"><b>Item Name</b></label>
      <input type="text" name="item_name" class="item_name" id="item_name" value="<?= $row['name'] ?>" required>

      <label for="item_price"><b>Price</b></label>
      <input type="price" name="price" class="item_price" id="item_price" value="<?= $row['price'] ?>" required>

      <label for="item_description"><b>Description</b></label>
      <textarea name="description" class="item_Description" required><?= $row['description'] ?></textarea>

      <label for="item_category"><b>Category</b></label>
      <input type="category" name="category" class="item_category" id="item_category" value="<?= $row['category'] ?>" required>

      <span class="admin_login_error"><?= $form_error; ?></span>
      <span class="add_item_form_response"><?= $form_response; ?></span>
      <button type="submit" class='login_form_button' name="update_item">
        Edit Item
      </button>
    </div>
  </form>
</section>

<?php require 'footer.php'; ?>