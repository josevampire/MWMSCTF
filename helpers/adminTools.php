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

  function toggleGameState() {
		include 'mysqlLogin.php';
		$sql = "SELECT * FROM settings WHERE name = 'gameInProgress'";
		$result = mysqli_query($conn, $sql);
		$row = mysqli_fetch_assoc($result);
		if ($row['value'] == 'TRUE') {
			$buttonText = 'Stop Game';
		} else {
			$buttonText = 'Start Game';
		}
		echo '
		<div class="panel panel-default">
			<div class="panel-body">
				<h4 style="display:inline-block">Toggle game status.</h4>
				<a href="helpers/adminFunctions.php?action=switchState" class="btn btn-default pull-right" style="display:inline-block">'. $buttonText . '</a>
			</div>
		</div>
		';
	}

  function addUserField() {
    echo '
    <div class="panel panel-default">
			<div class="panel-body">
				<h4 style="display:inline-block">Add a User.</h4>
        <form method="post" class="form" action="helpers/adminFunctions.php?action=addUser" style="width:300px;display:block">
        <div class="form-group">
          <label for="inputUsername"> Username </label>
          <input type="text" class="form-control" name="username" placeholder="Username">
        </div>
        <div class="form-group">
          <label for="inputPassword">Password</label>
          <input type="password" class="form-control" name="password" placeholder="Password">
        </div>
        <label for="checkbox1">Admin</lable>
        <input type="checkbox" id="checkbox1" name="admin" value="true"/>
        <br>
        <br>
        <button type="submit" class="btn btn-default" style="margin:0px">Sign in</button>
      </div>
    </div>
    ';
  }
?>
