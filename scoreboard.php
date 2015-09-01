<?php
	define('pageName', 'scoreboard');
	include 'helpers/preHTMLCode.php';
	include 'helpers/htmlHeader.php';
	include 'helpers/nav.php';
	include 'helpers/footer.php';
	include 'helpers/header.php';
	include 'helpers/scoreboard.php';
?>
<!DOCTYPE html>
<html>
	<head>
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
					<div class="panel-heading"><h3 style="display:inline;padding-right:10px">Scoreboard and Ranks</h3>* denotes row is not shows to general users</div>
						<table class="table table-hover table-striped" id='scoreboard'>
							<?php
								scoreboard();
							?>
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
