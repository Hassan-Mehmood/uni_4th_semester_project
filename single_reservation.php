<?php require 'header.php';

$reservation_id = $_GET['id'];

$sql = "SELECT o.*, r.*, i.*
        FROM orders o
        INNER JOIN reservation r ON o.reservation_id = r.id
        INNER JOIN item i ON o.item_id = i.id
        WHERE o.reservation_id = $reservation_id";

$result = mysqli_query($conn, $sql);
?>


<section class="table-section max-width">
  <div class="reservation_details">
    <div>
      <?php
      if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) { ?>
          <p>Reservation ID: <span><?php echo $row['reservation_id'] ?></span></p>
          <p>Reservation Name: <span><?php echo $row['reservation_name'] ?></span></p>
          <p>Phone: <span><?php echo $row['phone'] ?></span></p>
          <p>Table Number: <span><?php echo $row['table_number'] ?></span></p>
          <p>Date: <span><?php echo $row['reservation_date'] ?></span></p>
          <p>Number of Attendees: <span><?php echo $row['num_of_attendees'] ?></span></p>
          <p>Ordered Item: <span><?php echo $row['name'] ?></span></p>
          <p>Description: <span>><?php echo $row['description'] ?></span></p>
          <p>Price: <span><?php echo $row['price'] ?>$</span></p>
      <?php }
      } ?>
    </div>
  </div>
</section>
<?php require 'footer.php'; ?>