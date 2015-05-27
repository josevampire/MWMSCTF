<!DOCTYPE html>
<html>
	<head>
		<meta charset="ISO-8859-1">
		<link rel="stylesheet" type="text/css" href="style.css">
		<link href="bootstrap-3.3.4-dist/css/bootstrap.min.css" rel="stylesheet">
		
		<title>CTF Home Page</title>
	</head>
	<body>
		<script src="bootstrap-3.3.4-dist/jquery-1.11.3.min.js"></script>
		<script src="bootstrap-3.3.4-dist/js/bootstrap.min.js"></script>
		<?php 
			define('pageName', 'index');
		?>
		<div id="wrapper">
			<div id="header">
				<h1>Millard West MSCTF 2015</h1>
			</div>
			<div id="nav">
				<?php
					include 'helpers/nav.php';
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
							    Put random info here.
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
			</div>
			<div id = "footer">
				<p>&copy; 2015 Nicko, Inc. 
					&nbsp;&nbsp;&nbsp;
					<a href = "index.html">Home</a>
					&nbsp;&nbsp;&nbsp;
					<a href = "problems/crypto.html">Crypto</a>
					&nbsp;&nbsp;&nbsp;
					<a href = "problems/trivia.html">Trivia</a>
					&nbsp;&nbsp;&nbsp;
					<a href = "problems/web.html">Web</a>
					&nbsp;&nbsp;&nbsp;
					<a href = "problems/recon.html">Recon</a>
					&nbsp;&nbsp;&nbsp;
					<a href = "problems/grabBag.html">Grab Bag</a>
					&nbsp;&nbsp;&nbsp;
					<a href = "problems/flash.html">Flash</a>
					&nbsp;&nbsp;&nbsp;
					<a href = "scoreboard.html">Score Board</a></p>
				<img src = "images/logo.png" alt = "logo" class = "image">
			</div>
		</div>
	</body>
</html>