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
				    <p>This page is currently only partly functional. Some questions are available and can be found by using the 
				    links on the categories pages, however, submitting the actual answers does not yet work. (Its in the 
				    works!) For our demo today please navigate to the questions we have written (list below) and finish as 
				    many as you can in the time given.</p>

				    <p>Questions that have been written are: Cypto for 100, Trivia for 100, Recon for 100, and Grab Bag for 200.</p>

				    <p>Good luck!!</p>
				</div>
			</div>
			<div class="panel panel-default">
				<div class="panel-heading">
				    <h3 class="panel-title">Rules</h3>
				</div>
				<div class="panel-body">
				    Rules go here.
				</div>
			</div>
			';
		}
	}
?>