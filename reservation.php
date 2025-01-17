<?php
require 'header.php';

$form_error = '';
$table_error = false;
$reservation_sucess = false;
$show_table = false;
// $show_form = true;
$order_result = $_GET['order_result'];

if (isset($_SESSION['active_user'])) {
  $active_user = $_SESSION['active_user'];
  $active_user_id = $active_user['id'];
} else {
  header("Location: http://localhost/Restaurant%20management%20system/user_login.php");
}


// if the table is already reserved show the "already resereved table" message to the user else show "the table reserved" to the user.
$query = 'DELETE FROM reservation WHERE reservation_date < (CURDATE())';
$conn->query($query);

$active_user_id = $_SESSION['active_user']['id'];

$sql_query = "SELECT * FROM reservation WHERE customer_id = $active_user_id";
$check_user_reservations = mysqli_query($conn, $sql_query);

// $orders_query = "SELECT * FROM orders";
// $check_orders = mysqli_query($conn, $orders_query);

if (mysqli_num_rows($check_user_reservations) > 0) $show_table = true;

$invalid_email = '';
$invalid_phone_number = '';



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
}
?>

<section class="table-section max_width">
  <div>
    <div id="reservation_table" class="reservation_table <?= $show_table ? '' : 'hide' ?>">
      <?= $order_result === 'success' ? 'Items added to your order' : '' ?>
      <h1 class="reservation_table_heading" style="margin-bottom: 20px;">Your Reservations</h1>
      <table>
        <tr>
          <th>ID</th>
          <th>Reservation Name</th>
          <th>Phone Number</th>
          <th>Date</th>
          <th>Table number</th>
          <th>Num of attendees</th>
          <th>Actions</th>
          <th>Details</th>
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
              <td>
                <a href="reservation_order.php?id=<?= $row['id'] ?>" class="reservation_table_action_btn">
                  Order
                </a>
              </td>
              <td>
                <a href="single_reservation.php?id=<?= $row['id'] ?>" class="reservation_table_action_btn">
                  Check Order
                </a>
              </td>
            </tr>
        <?php }
        } ?>
      </table>
      <button id="reservation_table_button" class="reservation_table_button">Add new</button>
    </div>

    <form id="reservation_form" class="modal-content reservation_form <?= $show_table ? 'hide' : '' ?>" action="" method="post">
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
        <button id="reservation_form_button" class="reservation_table_button">Check reservations</button>


      </div>
    </form>
  </div>
</section>

<?php require 'footer.php' ?>