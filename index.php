<?php 
	define('pageName', 'index');
	include 'helpers/preHTMLCode.php';
	include 'helpers/htmlHeader.php';
	include 'helpers/nav.php';
	include 'helpers/footer.php';
	include 'helpers/signinButton.php';
?>
<!DOCTYPE html>
<html>
	<head>
		<title>CTF Home Page</title>
		<?php
			htmlHeader(pageName);
		?>
	</head>
	<body>
		<script src="bootstrap-3.3.4-dist/jquery-1.11.3.min.js"></script>
		<script src="bootstrap-3.3.4-dist/js/bootstrap.min.js"></script>
		<div id="wrapper">

			<div id="header">
				<h1>Millard West MSCTF 2015</h1>
				<?php
					signinButton(pageName);
				?>
			</div>

			<div id="nav">
				<?php
					nav(pageName);
				?>
			</div>

			<div class="panel panel-body" id = "body">
				<div class="panel-body">
					<center><h3>Welcome to the first annual MSCTF!!</h3></center>
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
				</div>
			</div>
			<div id = "footer">
				<?php
					footer(pageName);
				?>
			</div>
		</div>
	</body>
</html>