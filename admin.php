<?php
	define('pageName', 'admin');
	include 'helpers/preHTMLCode.php';
	include 'helpers/htmlHeader.php';
	include 'helpers/nav.php';
	include 'helpers/footer.php';
	include 'helpers/header.php';
	include 'helpers/adminTools.php';
	if ($_SESSION['admin'] != 'TRUE') {
		header('Location: index.php');
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Administration Tools</title>
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
					<div class="panel-body">
						<h3 style='padding-left: 10px'>Administration Tools</h3>
						<hr>
						<?php
							toggleGameState();
							resetScores();
							toggleFlashChallenges();
							addUserField();
						?>
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
