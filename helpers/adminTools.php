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
      echo '
      <div class="panel panel-default">
  			<div class="panel-body">
  				<h4 style="display:inline-block">Toggle game State</h4>
  				<a href="helpers/adminFunctions.php?action=switchState" class="btn btn-default pull-right" style="display:inline-block">'. $buttonText . '</a>
  			</div>
  		</div>
  		';
		} else {
      echo '
      <div class="panel panel-default">
  			<div class="panel-body">
  				<h4 style="display:inline-block">Toggle Game State</h4>
          <form class="form-inline pull-right" method="post" action="helpers/adminFunctions.php?action=switchState">
            <div class="form-group">
              <label class="sr-only" for="gameLength">Game Length (in hours)</label>
              <div class="input-group" style="width:175px">
                <input type="text" class="form-control" id="gameLength" placeholder="Game Days" name="gameDays">
                <div class="input-group-addon">Days</div>
              </div>
              <div class="input-group" style="width:175px">
                <input type="text" class="form-control" id="gameLength" placeholder="Game Hours" name="gameHours">
                <div class="input-group-addon">Hours</div>
              </div>
              <div class="input-group" style="width:175px">
                <input type="text" class="form-control" id="gameLength" placeholder="Game Mins" name="gameMins">
                <div class="input-group-addon">Mins</div>
              </div>
            </div>
            <button type="submit" class="btn btn-primary">Start Game</button>
          </form>
  			</div>
  		</div>
  		';
		}
	}

  function addUserField() {
    echo '
    <div class="panel panel-default">
			<div class="panel-body">
				<h4 style="display:inline-block">Add a User</h4>
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
