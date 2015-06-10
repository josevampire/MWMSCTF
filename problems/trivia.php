<?php 
	define('pageName', 'trivia');
	include '../helpers/problemModal.php';
	include '../helpers/nav.php';
	include '../helpers/footer.php';
	include '../helpers/htmlHeader.php';
	include '../helpers/signinButton.php';
	include '../helpers/preHTMLCode.php';
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Cryptography</title>
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