<?php
require 'header.php';
$form_error = '';

$invalid_email = '';
$invalid_phone_number = '';

if (isset($_SESSION['active_user'])) {
  $active_user = $_SESSION['active_user'];
}

if (isset($_POST['reservation'])) {
  $name = htmlspecialchars($_POST['name']);
  $phone = htmlspecialchars($_POST['phone']);
  $table_number = htmlspecialchars($_POST['table_number']);
  $timeAndDate = htmlspecialchars($_POST['date']);
  $attendees = htmlspecialchars($_POST['attendees']);


  //There is a glitch in these if statements 
  //Will solve it later
  if (!preg_match('/^[0-9]{11}+$/', $phone)) $invalid_phone_number = 'Invalid Phone number';

  if (empty(trim($name)) || empty(trim($phone)) || empty(trim($timeAndDate)) || empty(trim($attendees))) {
    $form_error = 'Empty fields';
  } else {

    $sql_query = "INSERT INTO reservation (customer_id, reservation_name, phone, table_number, reservation_date, num_of_attendees) VALUES (?, ?, ?, ?, ?, ?)";

    if ($stmt = mysqli_prepare($conn, $sql_query)) {
      mysqli_stmt_bind_param($stmt, "isssss", $active_user['id'], $name, $phone, $table_number, $timeAndDate, $attendees);
      mysqli_stmt_execute($stmt);
      mysqli_stmt_get_result($stmt);
    } else {
      $form_error = 'Something went wrong';
    }
  }
}


?>

<section class="form max_width">
  <div>
    <form class="modal-content reservation_form" action="" method="post">
      <div class="container">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>

        <label for="phone">Phone:</label>
        <input type="text" id="phone" name="phone" required>

        <label for="party">Time and date:</label>
        <input id="party" type="datetime-local" name="date" />

        <label for="table_number">Table number:</label>
        <input type="number" id="table_number" name="table_number" min="1" max='12' required>

        <label for="attendees">Number of Attendees:</label>
        <input type="number" id="attendees" name="attendees" min="1" required>

        <button type="submit" name="reservation">Submit</button>
      </div>
    </form>
  </div>
</section>

<?php require 'footer.php' ?>