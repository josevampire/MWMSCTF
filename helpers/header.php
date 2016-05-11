<?php
	function signinButton($pageName) {
// Header text
		echo "<h1>Millard West MSCTF 2016</h1>";
// Sign in button
		$pathToRoot = '';
		if ($pageName != 'index' && $pageName != 'scoreboard' && $pageName != 'admin' && $pageName != 'userinfo' && $pageName != 'questionStats') {
			$pathToRoot = '../';
		}
		if ($_SESSION['loginFail']) {
			echo '
			<script type="text/javascript">
			    $(window).load(function(){
			        $("#signIn").modal("show");
			    });
			</script>';
		}
		if ($_SESSION['betaFail']) {
			echo '
			<script type="text/javascript">
			    $(window).load(function(){
			        $("#modalBeta").modal("show");
			    });
			</script>';
		}
		if ($_SESSION["signedIn"]) {
			echo '<a href="' . $pathToRoot . 'helpers/logout.php"><button type="button" class="btn btn-default">Sign Out</button></a>
			<button type="button" class="btn btn-default" disabled="disabled">Signed in as ' . $_SESSION["username"] . '</button>';
		} else {
			echo '
			<button type = "button" class="btn btn-default btn-lg pull-right" data-toggle = "modal" data-target="#signIn"> Sign In </button>
			<div class="modal fade" id="signIn" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="false">
			  <div class="modal-dialog">
			    <div class="modal-content">
			      <form method="post" action="' . $pathToRoot . 'helpers/login.php?pageName=' . $pageName . '">
				      <div class="modal-header">
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				        <h4 class="modal-title" id="myModalLabel">Sign In</h4>
				      </div>
				      <div class="modal-body">';
				      if ($_SESSION['loginFail']) {
				      	echo '<div class="alert alert-danger" role="alert">Either username or password is incorrect. Please try again.</div>';
				      	$_SESSION['loginFail'] = FALSE;
				      }
				      echo '
				        <p> Enter your account information </p>
						  <div class="form-group">
						    <label for="inputUsername"> Username </label>
						    <input type="text" class="form-control" name="username" placeholder="Username">
						  </div>
						  <div class="form-group">
						    <label for="inputPassword">Password</label>
						    <input type="password" class="form-control" name="password" placeholder="Password">
						  </div>
				      </div>
				      <div class="modal-footer">
				        <button type="submit" class="btn">Sign In</button>
				        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				      </div>
			      </form>
			    </div>
		      </div>
			</div>
			';
		}
// Game state indicator
		include $pathToRoot . 'helpers/mysqlLogin.php';
		date_default_timezone_set('America/Chicago');
		$sql = "SELECT * FROM settings WHERE name = 'gameInProgress'";
		$result = mysqli_query($conn, $sql);
		$row = mysqli_fetch_assoc($result);
		if ($row['value'] == "TRUE") {
			$sql = "SELECT * FROM settings WHERE name = 'openUntil'";
			$result = mysqli_query($conn, $sql);
			$row = mysqli_fetch_assoc($result);
			$endTimeString = date('g:i a D M j, Y', $row['value']);
			echo '<div style="display:inline" class="">
			<button type="button" class="btn btn-default" disabled="disabled">Game ends: ' . $endTimeString . '</button>
			</div>';
		} else {
			echo '<div style="display:inline" class="">
			<button type="button" class="btn btn-default" disabled="disabled">Game Closed</button>
			</div>';
		}
	}
?>
