<?php
	function nav($pageName) {
		$pathToRoot = '';
		if ($pageName != 'index' && pageName != 'scoreboard') {
			$pathToRoot = '../';
		}

		echo '
			<nav class="navbar navbar-default">
			<div class="container-fluid">
			<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			</button>
		';

        echo '<a class="navbar-brand" href="#"><img src="' . $pathToRoot . 'images/logo.png"></a>';

		echo '
			</div>
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			<ul class="nav navbar-nav">
		';
	    if ($pageName == 'index') {
	        echo '<li class="active"><a href="#">Home<span class="sr-only">(current)</span></a></li>';
	    } else {
	    	echo '<li><a href="' . $pathToRoot . 'index.php">Home</a></li>';
	    }
	    if ($pageName == 'crypto') {
	        echo '<li class="active"><a href="#">Crypto<span class="sr-only">(current)</span></a></li>';
	    } else {
	    	echo '<li><a href="' . $pathToRoot . 'problems/crypto.php">Crypto</a></li>';
	    }
	    if ($pageName == 'trivia') {
	        echo '<li class="active"><a href="#">Trivia<span class="sr-only">(current)</span></a></li>';
	    } else {
	    	echo '<li><a href="' . $pathToRoot . 'problems/trivia.php">Trivia</a></li>';
	    }
	    if ($pageName == 'web') {
	        echo '<li class="active"><a href="#">Web<span class="sr-only">(current)</span></a></li>';
	    } else {
	    	echo '<li><a href="' . $pathToRoot . 'problems/web.php">Web</a></li>';
	    }
	    if ($pageName == 'recon') {
	        echo '<li class="active"><a href="#">Recon<span class="sr-only">(current)</span></a></li>';
	    } else {
	    	echo '<li><a href="' . $pathToRoot . 'problems/recon.php">Recon</a></li>';
	    }
	    if ($pageName == 'grabBag') {
	        echo '<li class="active"><a href="#">Grab Bag<span class="sr-only">(current)</span></a></li>';
	    } else {
	    	echo '<li><a href="' . $pathToRoot . 'problems/grabBag.php">Grab Bag</a></li>';
	    }
		if ($pageName == 'flash') {
	        echo '<li class="active"><a href="#">Flash<span class="sr-only">(current)</span></a></li>';
	    } else {
	    	echo '<li><a href="' . $pathToRoot . 'problems/flash.php">Flash</a></li>';
	    }
	    echo '
		      </ul>
		      <ul class="nav navbar-nav navbar-right">
		';
		if ($pageName == 'scoreboard') {
	        echo '<li class="active"><a href="#">ScoreBoard<span class="sr-only">(current)</span></a></li>';
	    } else {
	    	echo '<li><a href="' . $pathToRoot . '/scoreboard.php">Score Board</a></li>';
	    }
	    echo '
				</ul>
		    </div>
		  </div>
		</nav>
		';
	}
?>