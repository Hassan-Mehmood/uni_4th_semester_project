<?php
require 'header.php';
$form_error = '';
?>

<section class="form max_width">
  <div>
    <form class="modal-content reservation_form" action="" method="post">
      <div class="container">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>

        <label for="phone">Phone:</label>
        <input type="text" id="phone" name="phone" required>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>

        <!-- <label for="date">Date:</label>
        <input type="date" id="date" name="date" required>

        <label for="time">Time:</label>
        <input type="time" id="time" name="time" required> -->

        <label for="party">Enter a date and time for your party booking:</label>
        <input id="party" type="datetime-local" name="partydate" />

        <label for="attendees">Number of Attendees:</label>
        <input type="number" id="attendees" name="attendees" min="1" required>

        <button type="submit">Submit</button>
      </div>
    </form>
  </div>
</section>

<?php require 'footer.php' ?>