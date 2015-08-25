<?php
	include 'mysqlLogin.php';

	if (!isset($_SESSION)) {
		session_start();
	}
	$sql = "SELECT * FROM users WHERE username = '" . $_SESSION['username'] . "'";
	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_assoc($result);
	if (!$row['admin']) {
		header("Location: ../index.php");
	}

	if (isset($_GET["action"])) {
		switch ($_GET["action"]) {
			case 'switchState':
				$sql = "SELECT * FROM settings WHERE name = 'gameInProgress'";
				$result = mysqli_query($conn, $sql);
				$row = mysqli_fetch_assoc($result);
				if ($row['value'] == 'TRUE') {
					$sql = "UPDATE settings SET value = '' WHERE name = 'openUntil'";
					$result = mysqli_query($conn, $sql);
					$sql = "UPDATE settings SET value = 'FALSE' WHERE name = 'gameInProgress'";
					$result = mysqli_query($conn, $sql);
				} else {
					if (isset($_POST)) {
						if (date('i')) {
							$timeDiff = (7 * 60 * 60);
						} else {
							$timeDiff = (8 * 60 * 60);
						}
						$endEpoch = time() + ($_POST['gameDays'] * 24 * 60 * 60) + ($_POST['gameHours'] * 60 * 60) + ($_POST['gameMins'] * 60);
						$sql = "UPDATE settings SET value =" . $endEpoch . " WHERE name = 'openUntil'";
						$result = mysqli_query($conn, $sql);
						$sql = "UPDATE settings SET value = 'TRUE' WHERE name = 'gameInProgress'";
						$result = mysqli_query($conn, $sql);
					} else {
						die("No POST vars found");
					}
				}
				header("Location: ../admin.php");
				break;
			case 'addUser':
				$userSignUp = mysqli_real_escape_string($conn, stripslashes($_POST['username']));
				$passSignUp = mysqli_real_escape_string($conn, stripslashes($_POST['password']));
				$result = mysqli_query($conn, "SELECT * FROM users WHERE username = '$userSignUp'");
				$count = mysqli_num_rows($result);

				if($userSignUp == NULL || $count > 0 || $passSignUp == NULL){
					header("Location: ../admin.php?userCreation=FALSE");
				}
				else{
					if(isset($_POST['admin'])){
						$result = mysqli_query($conn, "INSERT INTO users (username, password, admin) VALUES ('$userSignUp', '$passSignUp', 'TRUE')");
					}
					else{
						$result = mysqli_query($conn, "INSERT INTO users (username, password, admin) VALUES ('$userSignUp', '$passSignUp', 'FALSE')");
					}
					header("Location: ../admin.php?userCreation=TRUE");
				}
				break;
			default:
				die("Not a valid action");
		}
	}
?>
