<?php
require 'header.php';

$sql_query = 'SELECT * FROM item';
$result = mysqli_query($conn, $sql_query);
?>

<section class="menu_section max_width" id="menu">
  <h2 class="menu_heading">Our Menu</h2>
  <div class="menu_items">
    <?php
    if (mysqli_num_rows($result) > 0) {
      while ($row = mysqli_fetch_assoc($result)) { ?>
        <div class="menu_item">
          <div class="menu_item_img">
            <img src="./uploads/<?= $row['image'] ?>" alt="Food Item Image" />
          </div>
          <div class="menu_item_text">
            <div>
              <h4 class="menu_item_category"><?= $row['category'] ?></h4>
            </div>
            <div>
              <h4 class="menu_item_name"><?= $row['name'] ?></h4>
              <span class="menu_item_price">$<?= $row['price'] ?></span>
              <p class="menu_item_detail">
                <?= $row['description'] ?>
              </p>
            </div>
          </div>
        </div>
    <?php }
    } ?>
  </div>
</section>

<?php require 'footer.php' ?>