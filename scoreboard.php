<!DOCTYPE html>
<html>
	<head>
		<meta charset="ISO-8859-1">
		<link rel="stylesheet" type="text/css" href="style.css">
		<link href="bootstrap-3.3.4-dist/css/bootstrap.min.css" rel="stylesheet">
		<title>Score Board</title>
	</head>
	<body>
		<script src="bootstrap-3.3.4-dist/jquery-1.11.3.min.js"></script>
		<script src="bootstrap-3.3.4-dist/js/bootstrap.min.js"></script>
		<?php 
			define('pageName', 'scoreboard');
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
			<div id="body">
				<div class="panel panel-default">
					<div class="panel-heading">Scoreboard and Ranks</div>
					<table class="table table-hover">
						<tr>
						    <th>Rank</th>
						    <th>Team Name</th> 
						    <th>Points</th>
					  	</tr>
					  	<tr>
						  	<tr class="success">
						    <td><b>#1</b></td>
						    <td>1337 Haxors</td> 
						    <td>94</td>
						</tr>
						<tr>
							<tr class="warning">
						    <td><b>#2</b></td>
						    <td>The Best</td> 
						    <td>91</td>
						</tr>
						<tr>
							<tr class="active">
						    <td><b>#3</b></td>
						    <td>Yo Peeps</td> 
						    <td>87</td>
						</tr>
						<tr>
					    	<td><b>#4</b></td>
					    	<td>Nick</td> 
					    	<td>4</td>
						</tr>
						<tr>
					    	<td><b>#5</b></td>
					    	<td>Nico</td> 
					    	<td>-14</td>
						</tr>
					</table>
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