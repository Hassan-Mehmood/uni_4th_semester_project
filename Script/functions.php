<?php

function username_exists($conn, $sql_query, $username_value)
{
  if ($stmt = mysqli_prepare($conn, $sql_query)) {
    mysqli_stmt_bind_param($stmt, "s", $username_value);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if ($result->num_rows > 0) {
      return true;
    } else {
      return false;
    }
  }
}
