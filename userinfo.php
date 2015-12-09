<?php
	define('pageName', 'userinfo');
	include 'helpers/preHTMLCode.php';
	include 'helpers/htmlHeader.php';
	include 'helpers/nav.php';
	include 'helpers/footer.php';
	include 'helpers/header.php';
  include 'helpers/userinfo.php';
	if ($_SESSION['admin'] != 'TRUE') {
		header("Location: index.php");
	}
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
						if (isset($_GET['user'])) {
              userinfo($_GET['user']);
            } else {
              echo '<div class="alert alert-danger" role="alert"><h4>No user info provided.<h4></div>';
            }
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
