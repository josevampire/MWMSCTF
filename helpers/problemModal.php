<?php
	if (!$_SESSION['gameInProgress'] && !$_SESSION['admin'] && !$_SESSION['beta']) {
		header("Location: ../index.php");
	}

	function problemModal($pageName, $problemNum, $pointValue) {
		$titleName;
		$pathToRoot = '';
		if ($pageName != 'index' && pageName != 'scoreboard') {
			$pathToRoot = '../';
		}
		$user = $_SESSION['username'];

		include 'mysqlLogin.php';

		$result = mysqli_query($conn, "SELECT * FROM questions WHERE category = '$pageName' AND pointValue = '$pointValue'");

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
			if ($row["answer"] == NULL) {
				$disabledForm = 'id="disabledInput" placeholder="This challange has no flag." disabled';
			} else {
				$disabledForm = 'placeholder=""';
			}
		}	else {
			$questionText = "No question yet, check back later!";
			$disabledForm = 'id="disabledInput" placeholder="Question not yet open." disabled';
		}

		if (!$_SESSION['signedIn']) {
			$disabledForm = 'id="disabledInput" placeholder="You must be signed in to answer questions." disabled';
		}

		$result = mysqli_query($conn, "SELECT lockOutUntil FROM scores WHERE user = '$user'");
		$row = mysqli_fetch_assoc($result);
		if ($row['lockOutUntil'] != '0' && $_SESSION['username'] != 'Guest') {
			$completedText = ' has-success';
			$disabledForm = 'id="disabledInput" placeholder="You are locked out of the system." disabled';
		}

		$result = mysqli_query($conn, "SELECT * FROM scores WHERE user = '$user'");
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
		} else if ($pageName == 'exploit') {
			$titleName = 'exploit';
		} else if ($pageName == 'web') {
			$titleName = 'Web';
		} else if($pageName == 'flash'){
			$titleName = 'Flash';
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
							$result = mysqli_query($conn, "SELECT lockOutUntil FROM scores WHERE user = '$user'");
							$row = mysqli_fetch_assoc($result);
							$lockOutTime = $row['lockOutUntil'];
							if ($lockOutTime == "") {
								$lockOutTime = "0";
							}
				      if (($_SESSION['answerState'] > 0 && $_SESSION['answerState'] % 10 == $problemNum) || ($lockOutTime != "0" && $_SESSION['username'] != 'Guest')) {
								if ($_SESSION['answerState'] > 30 || $lockOutTime != "0") {
									$lockOutString = date('g:i:s', $lockOutTime);
									echo '<div class="alert alert-danger" role="alert">You have been locked out until ' . $lockOutString . '.</div>';
								}	else if ($_SESSION['answerState'] > 20) {
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
				        <button type="submit" class="btn btn-primary"' . $disabledForm . '>Submit</button>
				      </div>
			      </form>
			    </div>
			  </div>
			</div>
		</div>
		';
	}
?>
