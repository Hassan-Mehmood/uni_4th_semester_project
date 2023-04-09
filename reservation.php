<?php
require 'header.php';
$form_error = '';
$table_error = false;
$reservation_sucess = false;
$show_table = false;
$show_form = true;

// if the table is already reserved show the "already resereved table" message to the user else show "the table reserved" to the user.
$query = 'DELETE FROM reservation WHERE reservation_date < (CURDATE())';
$conn->query($query);

$sql_query = 'SELECT * FROM reservation';
$check_user_reservations = mysqli_query($conn, $sql_query);


$invalid_email = '';
$invalid_phone_number = '';

if (isset($_SESSION['active_user'])) {
  $active_user = $_SESSION['active_user'];
} else {
  header("Location: http://localhost/Restaurant%20management%20system/user_login.php");
}

$reserved_Tables = [];
$sql = 'SELECT table_number FROM reservation';
$result = $conn->query($sql);

while ($table = $result->fetch_assoc()) {
  array_push($reserved_Tables, $table['table_number']);
}

if (isset($_POST['reservation'])) {
  $name = htmlspecialchars($_POST['name']);
  $phone = htmlspecialchars($_POST['phone']);
  $table_number = htmlspecialchars($_POST['table_number']);
  $timeAndDate = htmlspecialchars($_POST['date']);
  $attendees = htmlspecialchars($_POST['attendees']);


  // Feeling pretty embarrassed about this code :( 
  // But I just don't have the motivation to fix it right now
  if (empty(trim($name)) || empty(trim($phone)) || empty(trim($timeAndDate)) || empty(trim($attendees)) || in_array($table_number, $reserved_Tables) || !preg_match('/^[0-9]{11}+$/', $phone)) {
    if (in_array($table_number, $reserved_Tables)) $table_error = true;
    else if (!preg_match('/^[0-9]{11}+$/', $phone)) $invalid_phone_number = 'Invalid Phone number';
    else $form_error = 'Empty fields';
  } else {

    $sql_query = "INSERT INTO reservation (customer_id, reservation_name, phone, table_number, reservation_date, num_of_attendees) VALUES (?, ?, ?, ?, ?, ?)";

    if ($stmt = mysqli_prepare($conn, $sql_query)) {
      mysqli_stmt_bind_param($stmt, "isssss", $active_user['id'], $name, $phone, $table_number, $timeAndDate, $attendees);
      mysqli_stmt_execute($stmt);
      mysqli_stmt_get_result($stmt);

      $reservation_sucess = true;
    } else {
      $form_error = 'Something went wrong';
    }
  }
} ?>

<section class="form max_width">
  <div>

    <?php if ($show_table) { ?>
      <table>
        <tr>
          <th>ID</th>
          <th>Reservation Name</th>
          <th>Phone Number</th>
          <th>Date</th>
          <th>Table number</th>
          <th>Num of attendees</th>
        </tr>
        <?php if (mysqli_num_rows($result) > 0) {
          while ($row = mysqli_fetch_assoc($result)) { ?>
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
    <?php } ?>

    <form class="modal-content reservation_form" action="" method="post">
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
  </div>
</section>

<?php require 'footer.php' ?>