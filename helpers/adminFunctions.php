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
						$endEpoch = time() + ($_POST['gameHours'] * 60 * 60) + ($_POST['gameMins'] * 60);
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
				print_r($_POST);
				break;
			default:
				die("Not a valid action");
		}
	}
?>
