<?php
	function indexBody($pageName) {

		$pathToRoot = '';
		if ($pageName != 'index' && $pageName != 'scoreboard' && $pageName != 'admin' && $pageName != 'userinfo' && $pageName != 'questionStats') {
			$pathToRoot = '../';
		}

		if (!$_SESSION['gameInProgress'] && !$_SESSION['admin'] && !$_SESSION['beta']) {
			echo '<center><h3>Welcome MW Comp Sci Students!</h3></center>
			<div class="panel panel-default">
				<div class="panel-body">
				    <p>The game is currently closed. To view questions please wait until the game opens or login with an administrator account.</p>
				</div>
			</div>
			<div class="panel panel-default">
				<div class="panel-heading">
				    <h3 class="panel-title">Beta Users</h3>
				</div>
				<div class="panel-body">
				  	<button type="button" class="btn btn-info btn-lg btn-block" data-toggle="modal" data-target="#modalBeta" style ="margin: 0px auto; width: 400px"> Beta Sign In </button>
						<div class="modal fade" id="modalBeta" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="false">
						  <div class="modal-dialog">
						    <div class="modal-content">
						      <form method="post" action="' . $pathToRoot . 'helpers/betaLogin.php?pageName=' . $pageName . '">
							      <div class="modal-header">
							        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							        <h4 class="modal-title" id="myModalLabel">Beta Sign In</h4>
							      </div>
							      <div class="modal-body">';
							      	if ($_SESSION['betaFail']) {
								      	echo '<div class="alert alert-danger" role="alert">The pin is incorrect. Please try again.</div>';
							      		$_SESSION['betaFail'] = FALSE;
							      	}
							      	echo '
							        	<p> Enter the pin for beta question access. </p>
									  		<div class="form-group">
									    		<label for="inputPin"> Beta Pin </label>
									    		<input type="text" class="form-control" name="betaPin" placeholder="Pin">
											  </div>
											</div>
							      	<div class="modal-footer">
												<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
							        	<button type="submit" class="btn">Enter Beta</button>
							      	</div>
						      	</form>
						    	</div>
					      </div>
							</div>
						</div>
					</div>
			';
		} else if($_SESSION['beta']){
				echo '<center><h3>Welcome to the first annual MSCTF!!</h3></center>
				<div class="panel panel-default">
					<div class ="panel-heading">
						<h3 class = "panel-title"> Beta </h3>
					</div>
					<div class="panel-body">
					    <p>Thank you for testing out our site. You can view questions even when the game is not active.</p>
					</div>
				</div>
				<div class="panel panel-default">
					<div class="panel-heading">
					    <h3 class="panel-title">Info</h3>
					</div>
					<div class="panel-body">
							<b><p class="alert alert-danger">While <a href="https://www.raspberrypi.org/forums/viewtopic.php?f=66&t=119796" target="_blank">this</a> is not against the rules, come on, really? (Aaron we know it was you)</p></b>

					    <p>Thank you for being a beta tester for this site. Click around, explore, find the flags. If you have any feedback, questions, or comments, please send them to info@mwmsctf.com.</p>

					    <p>Good luck!!</p>
					</div>
				</div>
				<div class="panel panel-default">
					<div class="panel-heading">
					    <h3 class="panel-title">Rules</h3>
					</div>
					<div class="panel-body">
					    1. Attacks against game infrastructure are strictly prohibited.
							<br>
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; a. Brute forcing will result in a 5 minute lock out.
							<br>
							2. Please do not share flags. The game is more fun when everyone does their own work.
					</div>
				</div>
				';

		} else {
		echo '<center><h3>Welcome to the first annual MSCTF!!</h3></center>
			<div class="panel panel-default">
				<div class="panel-heading">
				    <h3 class="panel-title">Info</h3>
				</div>
				<div class="panel-body">
				    <p>Thank you for being a beta tester for this site. Click around, explore, find the flags. If you have any feedback, questions, or comments, please send them to info@mwmsctf.com.</p>

				    <p>Good luck!!</p>
				</div>
			</div>
			<div class="panel panel-default">
				<div class="panel-heading">
				    <h3 class="panel-title">Rules</h3>
				</div>
				<div class="panel-body">
				    1. Attacks against game infrastructure are strictly prohibited.
						<br>
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; a. Brute forcing will result in a 5 minute lock out.
						<br>
						2. Please do not share flags. The game is more fun when everyone does their own work.
				</div>
			</div>
			';
		}
	}
?>
