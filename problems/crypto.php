<!DOCTYPE html>
<html>
	<head>
		<meta charset="ISO-8859-1">
		<link rel="stylesheet" type="text/css" href="../style.css">
		<link href="../bootstrap-3.3.4-dist/css/bootstrap.min.css" rel="stylesheet">
		<title>Cryptography</title>
	</head>
	<body>

		<script src="../bootstrap-3.3.4-dist/jquery-1.11.3.min.js"></script>
		<script src="../bootstrap-3.3.4-dist/js/bootstrap.min.js"></script>
		<?php 
			define('pageName', 'crypto');
			include '../helpers/problemModal.php';
			include '../helpers/nav.php';
			include '../helpers/footer.php';
		?>
		<div id="wrapper">
			<div id="header">
				<h1>Millard West MSCTF 2015</h1>
			</div>
			<div id="nav">
				<?php
					nav(pageName);
				?>
			</div>
			<div id="body">
				<div class="row-fluid">
					<div class="col-xs-6 col-md-6">
					    <?php
					    	problemModal(pageName, 1, 100);
					    ?>
					</div>
					<div class="col-xs-6 col-md-6">
					    <?php
					    	problemModal(pageName, 2, 200);
					    ?>
					</div>
					<div class="col-xs-6 col-md-6">
					    <?php
					    	problemModal(pageName, 3, 300);
					    ?>
					</div>
					<div class="col-xs-6 col-md-6">
					    <?php
					    	problemModal(pageName, 4, 400);
					    ?>
					</div>
					<div class="col-xs-6 col-md-6">
					    <?php
					    	problemModal(pageName, 5, 500);
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