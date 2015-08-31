<?php
	function scoreboard() {
		include "mysqlLogin.php";
		include "scoreTabulation.php";

		echo '
			<tr>
			    <th>Rank</th>
			    <th>Team Name</th>
			    <th>Points</th>
		  	</tr>';

		$sql = "SELECT * FROM scores ORDER BY score DESC";
		$result = mysqli_query($conn, $sql);
		if ($result) {
			$rowNum = 1;
			$lastScore = -1;
			$rowTags = "";
	    while($row = mysqli_fetch_array($result)) {
	        if ($row['showOnBoard'] == 'FALSE') {
						continue;
					}
					$rank = "";
	        if ($lastScore != $row['score']) {
	        	$rank = "#$rowNum";
	        	if ($rowNum == 1) {
		        	$rowTags = 'class="success"';
		        } else if ($rowNum == 2) {
		        	$rowTags = 'class="warning"';
		        } else if ($rowNum == 3) {
		        	$rowTags = 'class="info"';
		        } else {
		        	$rowTags = '';
		        }
	 				}
	        if ($row['user'] == $_SESSION['username']) {
						echo "
						<tr>
						  	<tr " . $rowTags . ">
							    <td style='width:40px; border-right:1px solid #ddd; text-align:center'><b>$rank</b></td>
							    <td><b>" . $row['user'] . "</b></td>
							    <td><b>" . $row["score"] . "</b></td>
								</tr>";
	        } else {
	        	echo "
						<tr>
						  	<tr " . $rowTags . ">
						    <td style='width:40px; border-right:1px solid #ddd; text-align:center'><b>$rank</b></td>
						    <td>" . $row['user'] . "</td>
						    <td>" . $row["score"] . "</td>
						</tr>";
	        }
	        $rowNum++;
	        $lastScore = $row['score'];
	    }
    } else {
    	die("Query failed");
    }
	}
?>
