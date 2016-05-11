<?php
	function footer($pageName) {
		$pathToRoot = '';
		if ($pageName != 'index' && $pageName != 'scoreboard' && $pageName != 'admin') {
			$pathToRoot = '../';
		}
		echo '<p>&copy; 2016 Nicko, Inc.
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
			<a href = "' . $pathToRoot . 'problems/reversing.php">Reversing</a>
			&nbsp;&nbsp;&nbsp;
			<a href = "' . $pathToRoot . 'problems/flash.php">Flash</a>
			&nbsp;&nbsp;&nbsp;
			<a href = "' . $pathToRoot . 'scoreboard.php">Score Board</a></p>
			&nbsp;&nbsp;&nbsp;
			<a href = "' . $pathToRoot . 'teachingMaterials/presentation.pdf" download>Pres. Download</a></p>
			<img src = "' . $pathToRoot . 'images/logo.png" alt = "logo" class = "image">
		';
	}
?>
