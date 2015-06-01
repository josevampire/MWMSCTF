<!DOCTYPE html>
<html>
	<head>
		<?php 
			define('pageName', 'flash');
			include '../helpers/nav.php';
			include '../helpers/footer.php';
			include '../helpers/htmlHeader.php';
			include '../helpers/signinButton.php';
		?>
		<title>Flash</title>
		<?php
			htmlHeader(pageName);
		?>
	</head>
	<body>

		<script src="../bootstrap-3.3.4-dist/jquery-1.11.3.min.js"></script>
		<script src="../bootstrap-3.3.4-dist/js/bootstrap.min.js"></script>
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
				<div class="alert alert-danger" role="alert">No flash challenges yet! We'll announce when one is ready.</div>
			</div>
			<div id = "footer">
				<?php
					footer(pageName);
				?>
			</div>
		</div>
	</body>
</html>