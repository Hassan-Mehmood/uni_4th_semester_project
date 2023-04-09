<?php

$form_error = '';
$table_error = false;
$reservation_sucess = false;
$show_table = false;
$show_form = true;

// if the table is already reserved show the "already resereved table" message to the user else show "the table reserved" to the user.
$query = 'DELETE FROM reservation WHERE reservation_date < (CURDATE())';
$conn->query($query);

$active_user_id = $_SESSION['active_user']['id'];
$sql_query = "SELECT * FROM reservation WHERE customer_id = 9";
$check_user_reservations = mysqli_query($conn, $sql_query);

if (mysqli_num_rows($check_user_reservations) > 0) $show_table = true;


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
}
