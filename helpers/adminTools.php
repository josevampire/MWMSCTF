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
    include 'adminFunctions.php';
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
				<h4>Add a User</h4>
        ';
        if(isset($_GET['userCreation'])){
          if($_GET['userCreation'] == 'FALSE'){
            echo '
               <p class = "bg-danger" style = "width: 300px; padding:10px; margin-top: 15px"><b>Error! Account could not be created.</b></p>
            ';
          }
          else if($_GET['userCreation'] == 'TRUE'){
            echo '
                <p class = "bg-success" style = "width: 300px; padding:10px; margin-top: 15px"><b>Account successfully created.</b></p>
            ';
          }
        }
        echo'
        <form method="post" class="form" action="helpers/adminFunctions.php?action=addUser" style="width:300px;display:block" autocomplete="off">
          <input style="display:none" type="text" name="fakeusernameremembered"/>
          <input style="display:none" type="password" name="fakepasswordremembered"/>
          <div class="form-group">
            <label for="inputUsername"> Username </label>
            <input type="text" class="form-control" name="username" placeholder="Username" autocomplete ="off" />
          </div>
          <div class="form-group">
            <label for="inputPassword">Password</label>
            <input type="password" class="form-control" name="password" placeholder="Password" autocomplete ="off" />
          </div>
          <label for="checkbox1">Admin</lable>
          <input type="checkbox" name="admin" value="true"/>
          <br>
          <br>
          <button type="submit" class="btn btn-default" style="margin:0px">Sign up</button>
        </form>
          </div>
        </div>
      ';
  }

  function toggleFlashChallenges(){
    include 'mysqlLogin.php';
		$sql = "SELECT * FROM questions WHERE category = 'flash'";
		$result = mysqli_query($conn, $sql);
    if($result){
  		while($row = mysqli_fetch_assoc($result)){
        if($row['pointValue'] == '100' && $row['isActive'] == 'TRUE'){
          $col100 = 'btn-success';
          $bText100 = 'Active';
        } else if ($row['pointValue'] == '100' && $row['isActive'] == 'FALSE'){
          $col100 = 'btn-danger';
          $bText100 = 'Inactive';
        }
        if($row['pointValue'] == '200' && $row['isActive'] == 'TRUE'){
          $col200 = 'btn-success';
          $bText200 = 'Active';
        } else if ($row['pointValue'] == '200' && $row['isActive'] == 'FALSE'){
          $col200 = 'btn-danger';
          $bText200 = 'Inactive';
        }
        if($row['pointValue'] == '300' && $row['isActive'] == 'TRUE'){
          $col300 = 'btn-success';
          $bText300 = 'Active';
        } else if ($row['pointValue'] == '300' && $row['isActive'] == 'FALSE'){
          $col300 = 'btn-danger';
          $bText300 = 'Inactive';
        }
        if($row['pointValue'] == '400' && $row['isActive'] == 'TRUE'){
          $col400 = 'btn-success';
          $bText400 = 'Active';
        } else if ($row['pointValue'] == '400' && $row['isActive'] == 'FALSE'){
          $col400 = 'btn-danger';
          $bText400 = 'Inactive';
        }
        if($row['pointValue'] == '500' && $row['isActive'] == 'TRUE'){
          $col500 = 'btn-success';
          $bText500 = 'Active';
        } else if ($row['pointValue'] == '500' && $row['isActive'] == 'FALSE'){
          $col500 = 'btn-danger';
          $bText500 = 'Inactive';
        }
      }
    }
    echo '
      <div class = "panel panel-default">
        <div class = "panel-body">
          <h4> Toggle Flash Challenges </h4>
            <a href="helpers/adminFunctions.php?action=switchFlash&flashNum=100" class="btn btn-default '. $col100 .'" style="display:inline-block">Flash 100 '. $bText100 .'</a>
            <a href="helpers/adminFunctions.php?action=switchFlash&flashNum=200" class="btn btn-default '. $col200 .'" style="display:inline-block">Flash 200 '. $bText200 .'</a>
            <a href="helpers/adminFunctions.php?action=switchFlash&flashNum=300" class="btn btn-default '. $col300 .'" style="display:inline-block">Flash 300 '. $bText300 .'</a>
            <a href="helpers/adminFunctions.php?action=switchFlash&flashNum=400" class="btn btn-default '. $col400 .'" style="display:inline-block">Flash 400 '. $bText400 .'</a>
            <a href="helpers/adminFunctions.php?action=switchFlash&flashNum=500" class="btn btn-default '. $col500 .'" style="display:inline-block">Flash 500 '. $bText500 .'</a>
        </div>
      </div>
    ';
  }


  function resetScores() {
    $pannelElements = '';
    $pannelElements .= '<div id="infoGroup" class="pull-right">';
    include 'mysqlLogin.php';
    $sql = "SELECT * FROM settings WHERE name = 'resetState'";
  	$result = mysqli_query($conn, $sql);
  	$row = mysqli_fetch_assoc($result);
    if ($row['value'] == 1) {
      $sql = "SELECT * FROM settings WHERE name = 'resetScoreInit'";
    	$result = mysqli_query($conn, $sql);
    	$row = mysqli_fetch_assoc($result);
      if ($_SESSION['username'] == $row['value']) {
        $pannelElements .= '
        <div class="alert alert-warning" role="alert" style="width:250px;float:left;padding:6px 15px 6px 15px;margin:0px">
          <p class="pull-right">You have initiated a reset</p>
        </div>
        <a href="helpers/adminFunctions.php?action=resetScore&attempt=cancel" class="btn btn-default pull-right" style="display:inline-block">Cancel reset</a>
        ';
      } else {
      $pannelElements .= '
      <div class="alert alert-warning" role="alert" style="width:250px;float:left;padding:6px 15px 6px 15px;margin:0px">
        <p class="pull-right">' . $row['value'] . ' has initiated a reset</p>
      </div>
      <a href="helpers/adminFunctions.php?action=resetScore&attempt=finalize" class="btn btn-default pull-right" style="display:inline-block">Finialize Score Reset</a>
      ';
      }
    } else {
      $pannelElements .= '<a href="helpers/adminFunctions.php?action=resetScore&attempt=init" class="btn btn-default pull-right" style="display:inline-block">Initate Score Reset</a>';
    }
    $pannelElements .= '</div>';
    echo '
    <div class="panel panel-default">
      <div class="panel-body">
        <h4 style="display:inline-block">Reset Scores</h4>
        ' . $pannelElements . '
      </div>
    </div>
    ';
  }
?>
