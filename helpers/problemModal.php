<?php
	function problemModal($pageName, $problemNum, $pointValue) {
	$titleName;
	$questionText = file('../problems/materials/' . $pageName . '/' . $pointValue . '/problem.txt') or die("Unable to open file!");
	if ($pageName == 'crypto') {
		$titleName = 'Cryptography';
	} else if ($pageName == 'flash') {
		$titleName = 'Flash';
	} else if ($pageName == 'grabBag') {
		$titleName = 'Grab Bag';
	} else if ($pageName == 'recon') {
		$titleName = 'Reconnaissance';
	} else if ($pageName == 'trivia') {
		$titleName = 'Trivia';
	} else if ($pageName == 'web') {
		$titleName = 'Web';
	} 
	echo '<button type="button" class="thumbnail" data-toggle="modal" data-target="#modal' . $problemNum . '">';
    echo '<img src="../images/thumbnails/'. $pageName . '/' . $pointValue . '.png" alt="' . $pageName . ' for ' . $pointValue . '">';
    echo '</button>
    <div class="modal fade" id="modal' . $problemNum . '" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	  <div class="modal-dialog">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title" id="myModalLabel">' . $titleName . ': ' . $pointValue . ' </h4>
	      </div>
	      <div class="modal-body">
	        <p>'. $questionText[1] .'</p>
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
	';
	}
?>