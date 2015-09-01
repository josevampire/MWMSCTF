<?php
	if (!isset($_GET['admin'])) {
		header("Location: index.php?admin=FALSE");
	}
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
			if ($_GET['admin'] == 'FALSE') {
        echo '<h4 class="text-danger" style="margin:10px">No admin rights. Please login.</h4>';
      } else if ($_GET['admin'] == 'TRUE') {
        echo '<h4 class="text-success" style="margin: 0px 0px 0px 10px">Welcome administrator!</h4><br><h5 class="text-success" style="margin: 0px 0px 10px 10px">flag("broDoYouEvenGetVar")</h5>';
      } else {
        echo '<h4 class="text-warning" style="margin:10px">Unknow permission. Admin var does not match specs.</h4>';
      }
    ?>
    <form style="width:150px">
      <input type="text" class="form-control" name="username" placeholder="Username" style="margin:10px">
      <input type="text" class="form-control" name="password" placeholder="Password" style="margin:10px">
      <button type="submit" class="btn" style="margin-left:10px">Sign In</button>
    </form>
  </body>
</html>
