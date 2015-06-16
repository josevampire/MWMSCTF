<?php
	function problemModal($pageName, $problemNum, $pointValue) {
	$titleName;
	$pathToRoot = '';
	if ($pageName != 'index' && pageName != 'scoreboard') {
		$pathToRoot = '../';
	}

	include 'mysqlLogin.php';

	$sql = "SELECT * FROM questions WHERE category = '$pageName' AND pointValue = '$pointValue'";
	$result = mysqli_query($conn, $sql);

	$count = mysqli_num_rows($result);
	if ($count > 1) {
		die("More than one question pulled!");
	} else if ($count < 1) {
		die("No questions selected!");
	}
	$row = mysqli_fetch_assoc($result);
	$questionText;
	$disabledForm = '';
	if (!$row["question"] == NULL) {
		$questionText = $row["question"];
		$disabledForm = 'placeholder=""';
	} else {
		$questionText = "No question yet, check back later!";
		$disabledForm = 'id="disabledInput" placeholder="Question not yet open." disabled';
	}

	if (!$_SESSION['signedIn']) {
		$disabledForm = 'id="disabledInput" placeholder="You must be signed in to answer questions." disabled';
	}

	$user = $_SESSION['username'];
	$sql = "SELECT * FROM scores WHERE user = '$user'";
	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_assoc($result);
	$columnName = '$pageName $pointValue';
	$completedText = '';

	if ($row["$pageName$pointValue"] == 'TRUE') {
		$completedText = ' has-success';
		$disabledForm = 'id="disabledInput" placeholder="You have already completed this question." disabled';
	}


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

	if ($_SESSION['answerState'] > 0) {
		echo '
		<script type="text/javascript">
		    $(window).load(function(){
		        $("#modal' . $_SESSION['answerState'] % 10 . '").modal("show");
		    });
		</script>';
	}

	echo '<div class="col-xs-6 col-md-6">';
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
		      <form method="post" action="' . $pathToRoot . 'helpers/problemSubmission.php?pageName=' . $pageName . '&problemNum=' . $problemNum . '&pointValue=' . $pointValue . '">
			      <div class="modal-body' . $completedText . '">';
			      if ($_SESSION['answerState'] > 0 && $_SESSION['answerState'] % 10 == $problemNum) {
			      	if ($_SESSION['answerState'] > 20) {
				      	echo '<div class="alert alert-success" role="alert">Correct!</div>';
				    } else {
				    	echo '<div class="alert alert-danger" role="alert">Nope, keep looking.</div>';
				    }
				    $_SESSION['answerState'] = 0;
			      }
			      echo '
			        <p>'. $questionText .'</p>
			        <div class="input-group">
					  <span class="input-group-addon" id="basic-addon1">Answer</span>
					  <input type="text" class="form-control" name="keyAttempt" aria-describedby="basic-addon1"' . $disabledForm . '>
					</div>
			      </div>
			      <div class="modal-footer">
			        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			        <button type="submit" class="btn btn-primary">Submit</button>
			      </div>
		      </form>
		    </div>
		  </div>
		</div>
	</div>
	';
	}
?>