<?php
  $timeDiff = time() - $_GET['key'];
  if (1 < $timeDiff) {
    echo "Access denied!!
          Time diff not in tolerance.
          Time diff was " . $timeDiff . ". ";
    echo '<a href="../../../../index.php">Go home</a>';
  } else {
    echo "Time diff within tolerance. Awarding points. Redirecting in 3 seconds.";
    include '../../../../helpers/mysqlLogin.php';
    session_start();
    $_SESSION["answerState"] = 20 + 3;
    $user = $_SESSION['username'];
    $sql = "UPDATE scores SET grabBag300='TRUE' WHERE user='$user'";
    mysqli_query($conn, $sql);
    echo '<script>setTimeout(function(){
              var curTime = new Date().getTime() / 1000;
              window.location.href = "../../../grabBag.php";
          }, 3000);</script>';
  }
?>
