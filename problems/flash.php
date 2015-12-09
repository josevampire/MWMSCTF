<?php
	define('pageName', 'flash');
	include '../helpers/preHTMLCode.php';
	include '../helpers/problemModal.php';
	include '../helpers/nav.php';
	include '../helpers/footer.php';
	include '../helpers/htmlHeader.php';
	include '../helpers/header.php';
	include '../helpers/mysqlLogin.php';
?>
<!DOCTYPE html>
<html>
	<head>
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
				<?php
					$sql = "SELECT * FROM questions WHERE category = 'flash' AND isActive = 'TRUE'";
					$result = mysqli_query($conn, $sql);
					$count = mysqli_num_rows($result);
					if ($count <= 0) {
						echo '<div class="alert alert-danger" role="alert">No flash challenges yet! We\'ll announce when one is ready.</div>';
					}
				?>
					<div class ="row-fluid">
						<?php
								$sql = "SELECT * FROM questions WHERE category = 'flash'";
								$result = mysqli_query($conn, $sql);
						    if($result){
						  		while($row = mysqli_fetch_assoc($result)){
										if($row['pointValue'] == '100' && $row['isActive'] == 'TRUE'){
											problemModal(pageName, 1, 100);
										}
										if($row['pointValue'] == '200' && $row['isActive'] == 'TRUE'){
											problemModal(pageName, 2, 200);
										}
										if($row['pointValue'] == '300' && $row['isActive'] == 'TRUE'){
											problemModal(pageName, 3, 300);
										}
										if($row['pointValue'] == '400' && $row['isActive'] == 'TRUE'){
											problemModal(pageName, 4, 400);
										}
										if($row['pointValue'] == '500' && $row['isActive'] == 'TRUE'){
											problemModal(pageName, 5, 500);
										}
									}
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
