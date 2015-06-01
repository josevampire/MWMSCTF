<!DOCTYPE html>
<html>
	<head>
		<?php 
			define('pageName', 'scoreboard');
			include 'helpers/nav.php';
			include 'helpers/footer.php';
			include 'helpers/htmlHeader.php';
			include 'helpers/signinButton.php';
		?>
		<title>Score Board</title>
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
				<?php
					footer(pageName);
				?>
			</div>
		</div>
	</body>
</html>