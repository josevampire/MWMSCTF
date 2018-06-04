<?php
	function footer($pageName) {
		$pathToRoot = '';
		if ($pageName != 'index' && $pageName != 'scoreboard' && $pageName != 'admin') {
			$pathToRoot = '../';
		}
		?>
		<p>&copy; 2016 Nicko, Inc.
			&nbsp;&nbsp;&nbsp;
			<a href = "<?php echo $pathToRoot ?>index.php">Home</a>
			&nbsp;&nbsp;&nbsp;
			<a href = "<?php echo $pathToRoot ?>problems/crypto.php">Crypto</a>
			&nbsp;&nbsp;&nbsp;
			<a href = "<?php echo $pathToRoot ?>problems/trivia.php">Trivia</a>
			&nbsp;&nbsp;&nbsp;
			<a href = "<?php echo $pathToRoot ?>problems/web.php">Web</a>
			&nbsp;&nbsp;&nbsp;
			<a href = "<?php echo $pathToRoot ?>problems/recon.php">Recon</a>
			&nbsp;&nbsp;&nbsp;
			<a href = "<?php echo $pathToRoot ?>problems/grabBag.php">Grab Bag</a>
			&nbsp;&nbsp;&nbsp;
			<a href = "<?php echo $pathToRoot ?>problems/reversing.php">Reversing</a>
			&nbsp;&nbsp;&nbsp;
			<a href = "<?php echo $pathToRoot ?>problems/flash.php">Flash</a>
			&nbsp;&nbsp;&nbsp;
			<a href = "<?php echo $pathToRoot ?>scoreboard.php">Score Board</a></p>
			&nbsp;&nbsp;&nbsp;
			<a href = "<?php echo $pathToRoot ?>teachingMaterials/presentation.pdf" download>Pres. Download</a></p>
			<img src = "<?php echo $pathToRoot ?>images/logo.png" alt = "logo" class = "image">
			<?php
	}
	?>
