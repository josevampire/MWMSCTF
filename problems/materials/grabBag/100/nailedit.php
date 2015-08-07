<?php
  $timeDiff = time() - $_GET['key'];
  if (1 < $timeDiff) {
    header('Location: ../../../../index.php');
  } else {
    include '../../../../helpers/mysqlLogin.php';
    session_start();
    $_SESSION["answerState"] = 20 + 1;
    $user = $_SESSION['username'];
    $sql = "UPDATE scores SET grabBag100='TRUE' WHERE user='$user'";
    mysqli_query($conn, $sql);
    $sql = "UPDATE scores SET score= score + 100 WHERE user='$user'";
    mysqli_query($conn, $sql);
    header('Location:../../../grabBag.php');
  }
?>
