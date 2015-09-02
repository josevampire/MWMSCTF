<?php
  include '../../../../helpers/mysqlLogin.php';
  include '../webFlags.php';
  $username = $_POST["username"];
  $password = $_POST["password"];
  $debug = $_POST["debug"];
  $query = "SELECT * FROM web500 WHERE username='$username' AND password='$password'";
  $result = mysqli_query($conn, $query);

  if (intval($debug)) {
    echo "<pre>";
    echo "username: ", htmlspecialchars($username), "\n";
    echo "password: ", htmlspecialchars($password), "\n";
    echo "SQL query: ", htmlspecialchars($query), "\n";
    if (mysqli_errno($conn) !== 0) {
      echo "SQL error: ", htmlspecialchars(mysqli_error($conn)), "\n";
    }
    echo "</pre>";
  }

  if (mysqli_num_rows($result) !== 1) {
    echo "<h1>Login failed.</h1>";
  } else {
    echo "<h1>Logged in!</h1>";
    echo "<p>Your flag is: " . $web500 . "</p>";
  }

?>
