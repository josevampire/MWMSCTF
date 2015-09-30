<?php
	function nav($pageName) {
		$pathToRoot = '';
		if ($pageName != 'index' && $pageName != 'scoreboard' && $pageName != 'admin') {
			$pathToRoot = '../';
		}
		$disabledText = '';
		$href = TRUE;

		if (!$_SESSION['gameInProgress'] && !$_SESSION['admin'] && !$_SESSION['beta']) {
			$disabledText = 'disabled';
			$href = FALSE;
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

        echo '<img style="padding-right:6px" class="navebar-brand" src="' . $pathToRoot . 'images/logo.png">';

		echo '
			</div>
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			<ul class="nav navbar-nav">
		';
	    if ($pageName == 'index') {
	        echo '<li class="active"><a>Home<span class="sr-only">(current)</span></a></li>';
	    } else {
	    	echo '<li><a href="' . $pathToRoot . 'index.php">Home</a></li>';
	    }
	    if ($pageName == 'crypto') {
	        echo '<li class="active ' . $disabledText . '"><a>Crypto<span class="sr-only">(current)</span></a></li>';
	    } else {
	    	echo '<li class=" ' . $disabledText . '"><a'; if ($href) {echo ' href="' . $pathToRoot . 'problems/crypto.php"';} echo '>Crypto</a></li>';
	    }
	    if ($pageName == 'exploit') {
	        echo '<li class="active ' . $disabledText . '"><a>Exploit<span class="sr-only">(current)</span></a></li>';
	    } else {
	    	echo '<li class=" ' . $disabledText . '"><a'; if ($href) {echo ' href="' . $pathToRoot . 'problems/exploit.php"';} echo '>Exploit</a></li>';
	    }
	    if ($pageName == 'web') {
	        echo '<li class="active ' . $disabledText . '"><a>Web<span class="sr-only">(current)</span></a></li>';
	    } else {
	    	echo '<li class=" ' . $disabledText . '"><a'; if ($href) {echo ' href="' . $pathToRoot . 'problems/web.php"';} echo '>Web</a></li>';
	    }
	    if ($pageName == 'recon') {
	        echo '<li class="active ' . $disabledText . '"><a>Recon<span class="sr-only">(current)</span></a></li>';
	    } else {
	    	echo '<li class=" ' . $disabledText . '"><a'; if ($href) {echo ' href="' . $pathToRoot . 'problems/recon.php"';} echo '>Recon</a></li>';
	    }
	    if ($pageName == 'grabBag') {
	        echo '<li class="active ' . $disabledText . '"><a>Grab Bag<span class="sr-only">(current)</span></a></li>';
	    } else {
	    	echo '<li class=" ' . $disabledText . '"><a'; if ($href) {echo ' href="' . $pathToRoot . 'problems/grabBag.php"';} echo '>Grab Bag</a></li>';
	    }
		if ($pageName == 'flash') {
	        echo '<li class="active ' . $disabledText . '"><a>Flash<span class="sr-only">(current)</span></a></li>';
	    } else {
	    	echo '<li class=" ' . $disabledText . '"><a'; if ($href) {echo ' href="' . $pathToRoot . 'problems/flash.php"';} echo '>Flash</a></li>';
	    }
	    if ($_SESSION['admin']) {
	    	if ($pageName == 'admin') {
		        echo '<li class="active"><a>Admin<span class="sr-only">(current)</span></a></li>';
		    } else {
		    	echo '<li><a href="' . $pathToRoot . 'admin.php">Admin</a></li>';
		    }
	    }
	    echo '
		      </ul>
		      <ul class="nav navbar-nav navbar-right">
		';
		if ($pageName == 'scoreboard') {
	        echo '<li class="active"><a>Score Board<span class="sr-only">(current)</span></a></li>';
	    } else {
	    	echo '<li><a href="' . $pathToRoot . 'scoreboard.php">Score Board</a></li>';
	    }
	    echo '
				</ul>
		    </div>
		  </div>
		</nav>
		';
	}
?>
