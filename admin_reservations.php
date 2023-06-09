<?php
require 'header.php';

// Checking if the admin is logged in
if (!isset($_SESSION['admin'])) {
  // If adming is not loggedin redirect to the login page
  header("Location: http://localhost/Restaurant%20management%20system/admin_login.php");
}
//get all reservations
$sql_query = 'SELECT * FROM reservation';
$result = mysqli_query($conn, $sql_query);
?>

<div class="max_width">
  <section class="admin_menu_section " id="menu">
    <div class="admin_reservations">
      <a href="admin.php" class="back_btn">Back</a>
    </div>
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
  </section>
</div>

<?php
require 'footer.php';
?>