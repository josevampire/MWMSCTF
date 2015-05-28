<?php
	function footer($pageName) {
		$pathToRoot = '';
		if ($pageName != 'index' && $pageName != 'scoreboard') {
			$pathToRoot = '../';
		}
		echo '<p>&copy; 2015 Nicko, Inc. 
			&nbsp;&nbsp;&nbsp;
			<a href = "' . $pathToRoot . 'index.php">Home</a>
			&nbsp;&nbsp;&nbsp;
			<a href = "' . $pathToRoot . 'problems/crypto.php">Crypto</a>
			&nbsp;&nbsp;&nbsp;
			<a href = "' . $pathToRoot . 'problems/trivia.php">Trivia</a>
			&nbsp;&nbsp;&nbsp;
			<a href = "' . $pathToRoot . 'problems/web.php">Web</a>
			&nbsp;&nbsp;&nbsp;
			<a href = "' . $pathToRoot . 'problems/recon.php">Recon</a>
			&nbsp;&nbsp;&nbsp;
			<a href = "' . $pathToRoot . 'problems/grabBag.php">Grab Bag</a>
			&nbsp;&nbsp;&nbsp;
			<a href = "' . $pathToRoot . 'problems/flash.php">Flash</a>
			&nbsp;&nbsp;&nbsp;
			<a href = "' . $pathToRoot . 'scoreboard.php">Score Board</a></p>
			<img src = "' . $pathToRoot . 'images/logo.png" alt = "logo" class = "image">
		';
	}
?>