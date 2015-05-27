<!DOCTYPE html>
<html>
	<head>
		<meta charset="ISO-8859-1">
		<link rel="stylesheet" type="text/css" href="../style.css">
		<link href="../bootstrap-3.3.4-dist/css/bootstrap.min.css" rel="stylesheet">
		<title>Recon</title>
	</head>
	<body>
		<script src="../bootstrap-3.3.4-dist/jquery-1.11.3.min.js"></script>
		<script src="../bootstrap-3.3.4-dist/js/bootstrap.min.js"></script>
		<?php 
			define('pageName', 'recon');
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
					    <button type="button" class="thumbnail" data-toggle="modal" data-target="#modal1">
					    <img src="../images/thumbnails/recon/100.png" alt="Recon for 100">
					    </button>
					    <div class="modal fade" id="modal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
						  <div class="modal-dialog">
						    <div class="modal-content">
						      <div class="modal-header">
						        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						        <h4 class="modal-title" id="myModalLabel">Recon: 100 </h4>
						      </div>
						      <div class="modal-body">
						        <p> Nico plays a highschool sport at the varsity level. What is his current jersey number for that sport? </p>
						        <div class="input-group">
								  <span class="input-group-addon" id="basic-addon1">Answer</span>
								  <input type="text" class="form-control" placeholder="" aria-describedby="basic-addon1">
								</div>
						      </div>
						      <div class="modal-footer">
						        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						        <button type="button" class="btn btn-primary">Submit</button>
						      </div>
						    </div>
						  </div>
						</div>
					</div>
					<div class="col-xs-6 col-md-6">
					    <button type="button" class="thumbnail">
					    <img src="../images/thumbnails/recon/200.png" alt="Recon for 200">
					    </button>
					</div>
					<div class="col-xs-6 col-md-6">
					    <button type="button" class="thumbnail">
					    <img src="../images/thumbnails/recon/300.png" alt="Recon for 300">
					    </button>
					</div>
					<div class="col-xs-6 col-md-6">
					    <button type="button" class="thumbnail">
					    <img src="../images/thumbnails/recon/400.png" alt="Recon for 400">
					    </button>
					</div>
					<div class="col-xs-6 col-md-6">
					    <button type="button" class="thumbnail">
					    <img src="../images/thumbnails/recon/500.png" alt="Recon for 500">
					    </button>
					</div>
				</div>
			</div>
			<div id = "footer">
					<p>&copy; 2015 Nicko, Inc. 
					&nbsp;&nbsp;&nbsp;
					<a href = "../index.html">Home</a>
					&nbsp;&nbsp;&nbsp;
					<a href = "crypto.html">Crypto</a>
					&nbsp;&nbsp;&nbsp;
					<a href = "trivia.html">Trivia</a>
					&nbsp;&nbsp;&nbsp;
					<a href = "web.html">Web</a>
					&nbsp;&nbsp;&nbsp;
					<a href = "recon.html">Recon</a>
					&nbsp;&nbsp;&nbsp;
					<a href = "grabBag.html">Grab Bag</a>
					&nbsp;&nbsp;&nbsp;
					<a href = "flash.html">Flash</a>
					&nbsp;&nbsp;&nbsp;
					<a href = "../scoreboard.html">Score Board</a></p>
				<img src = "images/logo.png" alt = "logo" class = "image">
			</div>
		</div>
	</body>
</html>