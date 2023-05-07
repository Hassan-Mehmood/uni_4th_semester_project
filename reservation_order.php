<?php require 'header.php';

$sql_query = 'SELECT * FROM item';
$result = mysqli_query($conn, $sql_query);

$reservation_id = $_GET['id'];


?>
<div class="order_modal">
  <section>
    <div class="modal">
      <div class="modal_menu_items">
        <?php
        if (mysqli_num_rows($result) > 0) {
          while ($row = mysqli_fetch_assoc($result)) { ?>
            <div class="modal_menu_item">
              <div class="modal_menu_item_img">
                <img src="./uploads/<?= $row['image'] ?>" alt="Food Item Image" />
              </div>
              <div class="modal_menu_text">
                <div>
                  <h4 class="modal_menu_item_name">
                    <?= $row['name'] ?>
                    <span class="modal_menu_item_price">$<?= $row['price'] ?></span>
                  </h4>
                  <p><?= $row['description']  ?></p>
                  <button class="modal_menu_item_btn">
                    <a href="./Script/reservation_order_add.php?item_id=<?= $row['id']  ?>&reservation_id=<?= $reservation_id ?>" class="btn btn-primary">
                      Add Order
                    </a>
                  </button>
                </div>
              </div>
            </div>
        <?php }
        } ?>
      </div>
    </div>
  </section>
</div>

<?php require 'footer.php' ?>