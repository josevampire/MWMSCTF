<!DOCTYPE html>
<html>
	<head>
		<meta charset="ISO-8859-1">
		<link rel="stylesheet" type="text/css" href="../style.css">
		<link href="../bootstrap-3.3.4-dist/css/bootstrap.min.css" rel="stylesheet">
		<title>Flash</title>
	</head>
	<body>

		<script src="../bootstrap-3.3.4-dist/jquery-1.11.3.min.js"></script>
		<script src="../bootstrap-3.3.4-dist/js/bootstrap.min.js"></script>
		<?php 
			define('pageName', 'flash');
		?>
		<div id="wrapper">
			<div id="header">
				<h1>Millard West MSCTF 2015</h1>
			</div>
			<div id="nav">
				<?php
					include '../helpers/nav.php';
					nav(pageName);
				?>
			</div>
			<div id="body">
				<div class="alert alert-danger" role="alert">No flash challenges yet! We'll announce when one is ready.</div>
			</div>
			<div id = "footer">
					<p>&copy; 2015 Nicko, Inc. 
					&nbsp;&nbsp;&nbsp;
					<a href = "../index.html">Home</a>
					&nbsp;&nbsp;&nbsp;
					<a href = "crypto.html">Crypto</a>
					&nbsp;&nbsp;&nbsp;
					<a href = "trivia.html">Trivia</a>
					&nbsp;&nbsp;&nbsp;
					<a href = "web.html">Web</a>
					&nbsp;&nbsp;&nbsp;
					<a href = "recon.html">Recon</a>
					&nbsp;&nbsp;&nbsp;
					<a href = "grabBag.html">Grab Bag</a>
					&nbsp;&nbsp;&nbsp;
					<a href = "flash.html">Flash</a>
					&nbsp;&nbsp;&nbsp;
					<a href = "../scoreboard.html">Score Board</a></p>
				<img src = "../images/logo.png" alt = "logo" class = "image">
			</div>
		</div>
	</body>
</html>