<!DOCTYPE html>
<html>
	<head>
		<meta charset="ISO-8859-1">
		<link rel="stylesheet" type="text/css" href="../style.css">
		<link href="../bootstrap-3.3.4-dist/css/bootstrap.min.css" rel="stylesheet">
		<title>Web</title>
	</head>
	<body>

		<script src="../bootstrap-3.3.4-dist/jquery-1.11.3.min.js"></script>
		<script src="../bootstrap-3.3.4-dist/js/bootstrap.min.js"></script>
		<?php 
			define('pageName', 'web');
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
				<div class="row-fluid">
					<div class="col-xs-6 col-md-6">
					    <button type="button" class="thumbnail">
					    <img src="../images/thumbnails/web/100.png" alt="Crypto for 100">
					    </button>
					</div>
					<div class="col-xs-6 col-md-6">
					    <button type="button" class="thumbnail">
					    <img src="../images/thumbnails/web/200.png" alt="Crypto for 100">
					    </button>
					</div>
					<div class="col-xs-6 col-md-6">
					    <button type="button" class="thumbnail">
					    <img src="../images/thumbnails/web/300.png" alt="Crypto for 100">
					    </button>
					</div>
					<div class="col-xs-6 col-md-6">
					    <button type="button" class="thumbnail">
					    <img src="../images/thumbnails/web/400.png" alt="Crypto for 100">
					    </button>
					</div>
					<div class="col-xs-6 col-md-6">
					    <button type="button" class="thumbnail">
					    <img src="../images/thumbnails/web/500.png" alt="Crypto for 100">
					    </button>
					</div>
				</div>
			</div>
			<div id = "footer">
				<?php
					include '../helpers/footer.php';
					footer(pageName);
				?>
			</div>
		</div>
	</body>
</html>