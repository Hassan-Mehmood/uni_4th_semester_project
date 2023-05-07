<?php
require 'header.php';
$form_error = '';
$form_response = '';

// Checking if the admin is logged in
if (!isset($_SESSION['admin'])) {
  // If adming is not loggedin redirect to the login page
  header("Location: http://localhost/Restaurant%20management%20system/admin_login.php");
}

if (isset($_POST['add_item'])) {
  $itemName = htmlspecialchars($_POST['item_name']);
  $price = htmlspecialchars($_POST['price']);
  $description = htmlspecialchars($_POST['description']);
  $category = htmlspecialchars($_POST['category']);

  //Process the image that is uploaded by the user
  $target_dir = "uploads/";
  $target_file = $target_dir . basename($_FILES["mainImage"]["name"]);
  $uploadOk = 1;
  $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

  // Check if image file is a actual image or fake image
  $check = getimagesize($_FILES["mainImage"]["tmp_name"]);
  if ($check !== false) {
    $uploadOk = 1;
  } else {
    $form_error = "File is not an image.";
    $uploadOk = 0;
  }

  // Check file size
  if ($_FILES["mainImage"]["size"] > 500000) {
    $form_error = "Sorry, your file is too large.";
    $uploadOk = 0;
  }

  // Allow certain file formats
  if ($imageFileType != "jpg" && $imageFileType != "jpeg" && $imageFileType != "png" && $imageFileType != "gif") {
    $form_error = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
  }

  if ($uploadOk == 0) {
    $form_error = "Sorry, your file was not uploaded.";
  } else {
    if (move_uploaded_file($_FILES["mainImage"]["tmp_name"], $target_file)) {
      $image = basename($_FILES["mainImage"]["name"]);

      if (empty(trim($itemName)) || empty(trim($price)) || empty(trim($description)) || empty(trim($category))) {
        $form_error = 'Empty Fields';
      } else if (!preg_match('/^[0-9]*$/', $price)) {
        $form_error = 'Price should be a number';
      } else {
        $sql_query = "INSERT INTO item (name, description, price, category, image) VALUES (?, ?, ?, ?, ?)";
        if ($stmt = mysqli_prepare($conn, $sql_query)) {
          mysqli_stmt_bind_param($stmt, "ssiss", $itemName, $description, $price, $category, $image);
          mysqli_stmt_execute($stmt);
          $result = mysqli_stmt_get_result($stmt);
          $form_response = 'Item added';
          header("Location: http://localhost/Restaurant%20management%20system/admin.php");
        } else {
          $form_response = 'Something went wrong';
        }
      }
    } else {
      $form_error = "Sorry, there was an error uploading your file.";
    }
  }
}
?>


<section class="add_menu_item">
  <form class="modal-content" action="" method="post" enctype="multipart/form-data">
    <div class="container">
      <a href="admin.php">Back</a>
      <div class="menu_header">
        <h3>Add Item</h3>
      </div>
      <label for="item_name"><b>Item Name</b></label>
      <input type="text" name="item_name" class="item_name" id="item_name">

      <label for="item_price"><b>Price</b></label>
      <input type="text" name="price" class="item_price" id="item_price">

      <label for="item_description"><b>Description</b></label>
      <textarea type="Description" name="description" class="item_Description" id="item_description"></textarea>

      <label for="item_category"><b>Category</b></label>
      <input type="category" name="category" class="item_category" id="item_category">

      <div class="imageContainer">
        <label class="imageLabel" id="mainImageLabel">
          <!-- <img src="./Images/image_icon.png" alt=""> -->
          Upload the SVG, PNG, JPG etc
        </label>
        <img id="mainUploadPreview" />
        <label for="mainImage" class="imageUpload">
          Browse
        </label>
        <input type="file" id="mainImage" name="mainImage" />
      </div>

      <span class="admin_login_error"><?= $form_error; ?></span>
      <span class="add_item_form_response"><?= $form_response; ?></span>
      <button type="submit" class='login_form_button' name="add_item">
        Add Item
      </button>
    </div>
  </form>
</section>


<?php require 'footer.php'; ?>