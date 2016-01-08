<?php
  $sql = "SELECT * FROM scores";
  $result = mysqli_query($conn, $sql);
  if ($result) {
    while($row = mysqli_fetch_array($result)) {
      $score = 0;
      foreach ($row as $key => $value) {
        if (gettype($key) == "string" && is_numeric(substr($key, -3))) {
          if ($value != "FALSE") {
            $score += intval(substr($key, -3));
          }
        }
      }
      $user = $row['user'];
      $sql = "UPDATE scores SET score = $score WHERE user = '$user'";
  		mysqli_query($conn, $sql);
    }
  } else {
    die("Score table fetch failed.");
  }
?>
