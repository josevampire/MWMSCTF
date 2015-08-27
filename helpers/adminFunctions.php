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
				$userSignUp = mysqli_real_escape_string($conn, stripslashes($_POST['newUserUsername']));
				$passSignUp = mysqli_real_escape_string($conn, stripslashes($_POST['newUserPassword']));
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
			case 'resetScore':
				$result = mysqli_query($conn, "SELECT * FROM settings WHERE name = 'resetState'");
				$row = mysqli_fetch_assoc($result);
				if ($_GET['attempt'] == 'init' && $row['value'] == 1) {
					header("Location: ../admin.php");
				} else if ($_GET['attempt'] == 'cancel' && $row['value'] == 1) {
					$result = mysqli_query($conn, "SELECT * FROM settings WHERE name = 'resetScoreInit'");
					$row = mysqli_fetch_assoc($result);
					if ($row['value'] == $_SESSION['username']) {
						$result = mysqli_query($conn, "UPDATE settings SET value = '' WHERE name = 'resetScoreInit'");
						$result = mysqli_query($conn, "UPDATE settings SET value = '0' WHERE name = 'resetState'");
					}
					header("Location: ../admin.php");
				}
				$username = $_SESSION['username'];
				if ($row['value'] == 0 && $_GET['attempt'] == 'init') {
					$username = $_SESSION['username'];
					$result = mysqli_query($conn, "UPDATE settings SET value = '$username' WHERE name = 'resetScoreInit'");
					if ($result == 'TRUE') {
						$result = mysqli_query($conn, "UPDATE settings SET value = '1' WHERE name = 'resetState'");
					}
					header("Location: ../admin.php");
				} else if ($row['value'] == 1 && $_GET['attempt'] == 'finalize') {
					$result = mysqli_query($conn, "SELECT * FROM settings WHERE name = 'resetScoreInit'");
					$row = mysqli_fetch_assoc($result);
					if ($row['value'] != $username) {
					  $result = mysqli_query($conn, "SELECT * FROM scores");
						if ($result != 'FALSE') {
							while($row = mysqli_fetch_array($result)) {
								$user = $row['user'];
								foreach ($row as $key => $value) {
									if (gettype($key) == "string" && is_numeric(substr($key, -3))) {
										$result2 = mysqli_query($conn, "UPDATE scores SET $key = 'FALSE' WHERE user = '$user'");
									}
								}
							}
							$result = mysqli_query($conn, "UPDATE settings SET value = '' WHERE name = 'resetScoreInit'");
							$result = mysqli_query($conn, "UPDATE settings SET value = '0' WHERE name = 'resetState'");
							header('Location: ../admin.php');
						} else {
							echo "Query failed";
							echo "<br>";
							var_dump($result);
							die();
						}
					}
				} else {
					header('Location: ../admin.php');
				}
				break;
			default:
				print_r($_GET);
				die("Not a valid action");
		}
	}
?>
