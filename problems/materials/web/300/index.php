<?php
	if(isset($_COOKIE['admin'])) {
		if ($_COOKIE['admin'] == '1') {
			$auth = 'true';
		} else if ($_COOKIE['admin'] == '0'){
			$auth = 'false';
		} else {
			$auth = 'unknown';
		}
		setcookie("admin", "0");
	} else {
		setcookie("admin", "0");
	}
	include '../webFlags.php';
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Secure Logon</title>
    <link href="../../../../bootstrap-3.3.4-dist/css/bootstrap.min.css" rel="stylesheet">
	</head>
	<body>
    <h1 style="margin:10px">Super Secret Stuff Login Page</h1>
		<?php
			if ($auth == 'true') {
				echo '<h4 class="text-success" style="margin: 0px 0px 0px 10px">Welcome administrator!</h4><br><h5 class="text-success" style="margin: 0px 0px 10px 10px">' . $web300 . '</h5>';
			} else if ($auth == 'false') {
				echo '<h4 class="text-danger" style="margin: 0px 0px 0px 10px">No admin rights. Please login.</h4>';
			} else {
				echo '<h4 class="text-warning" style="margin: 0px 0px 0px 10px">Unknown auth code!</h4>';
			}
		?>
    <form style="width:150px">
      <input type="text" class="form-control" name="username" placeholder="Username" style="margin:10px">
      <input type="text" class="form-control" name="password" placeholder="Password" style="margin:10px">
      <button type="submit" class="btn" style="margin-left:10px">Sign In</button>
    </form>
  </body>
</html>
