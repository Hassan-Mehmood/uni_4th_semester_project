<?php
require 'header.php';
include './Script/reservation_script.php';
?>

<section class="form max_width">
  <div>
    <div id="reservation_table">
      <?php if ($show_table) { ?>
        <h1 class="reservation_table_heading">Your Reservation</h1>
        <table>
          <tr>
            <th>ID</th>
            <th>Reservation Name</th>
            <th>Phone Number</th>
            <th>Date</th>
            <th>Table number</th>
            <th>Num of attendees</th>
          </tr>
          <?php if (mysqli_num_rows($check_user_reservations) > 0) {
            while ($row = mysqli_fetch_assoc($check_user_reservations)) { ?>
              <tr>
                <td><?= $row['id'] ?></td>
                <td><?= $row['reservation_name'] ?></td>
                <td><?= $row['phone'] ?></td>
                <td><?= $row['reservation_date'] ?></td>
                <td><?= $row['table_number'] ?></td>
                <td><?= $row['num_of_attendees'] ?></td>
              </tr>
          <?php }
          } ?>
        </table>
        <button id="reservation_table_button" class="reservation_table_button">Add new</button>
    </div>

  <?php } else { ?>

    <form class="modal-content reservation_form" action="./Script/reservation_script.php" method="post">
      <div class="container">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" value="<?= $_POST['name'] ?? '' ?>" required>

        <label for="phone">Phone:</label>
        <input type="text" id="phone" name="phone" value="<?= $_POST['phone'] ?? '' ?>" required>

        <label for="party">Time and date:</label>
        <input id="party" type="datetime-local" name="date" value="<?= $_POST['date'] ?? '' ?>" />

        <label for="table_number">Table number:</label> <?php if ($table_error) { ?>
          <span class="reservation_table_error">Table already booked</span>
        <?php } ?>
        <input type="number" id="table_number" name="table_number" min="1" max='12' value="<?= $_POST['table_number'] ?? '' ?>" required>

        <label for="attendees">Number of Attendees:</label>
        <input type="number" id="attendees" name="attendees" min="1" value="<?= $_POST['attendees'] ?? '' ?>" required>

        <span class="admin_login_error"><?= $form_error; ?></span>

        <button type="submit" name="reservation">Submit</button>

        <?php if ($reservation_sucess) { ?>
          <span class="reservation_table_success">Reservation booked</span>
        <?php } ?>

      </div>
    </form>
  <?php } ?>
  </div>
</section>

<?php require 'footer.php' ?>