<?php 
	define('pageName', 'index');
	include 'helpers/preHTMLCode.php';
	include 'helpers/htmlHeader.php';
	include 'helpers/nav.php';
	include 'helpers/footer.php';
	include 'helpers/signinButton.php';
	include 'helpers/indexBody.php';
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
					<?php
						indexBody();
					?>
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