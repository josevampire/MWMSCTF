<?php
	function indexBody() {
		if (!$_SESSION['gameInProgress'] && !$_SESSION['admin']) {
			echo '<center><h3>Welcome to the first annual MSCTF!!</h3></center>
			<div class="panel panel-default">
				<div class="panel-body">
				    <p>The game is currently closed. To view questions please wait until the game opens or login with an administrator account.</p>
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
						<b><p class="alert alert-warning">The crypto300 question has been moved to crypto500. In the process the scores for this problem were reset. The flag is the same so to get the points back just renter it in to crypto500.</p></b>

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
						2. Please do not share flags. The game is more fun when everyone does their own work.
				</div>
			</div>
			';
		}
	}
?>
