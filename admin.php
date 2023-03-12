<?php require 'header.php';

// Checking if the admin is logged in
// if (isset($_SESSION['user'])) {
//   print "session exists";
// } else {
//   // If adming is not loggedin redirect to the login page
//   header("Location: http://localhost/Restaurant%20management%20system/login.php");
// }

?>

<section class="admin_menu_section max_width" id="menu">
  <div class="add_menu_item_button">
    <button>Add Item</button>
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
          <button>Edit</button>
          <button>Delete</button>
        </div>
      </div>
    <?php } ?>
  </div>
</section>

<section class="add_menu_item">

</section>


<?php require 'footer.php' ?>