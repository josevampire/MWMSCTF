<?php
 function questionStats(){
   $stats = array();
   $users = 0;
   include 'mysqlLogin.php';
   $sql = "SELECT * FROM scores";
   $result = mysqli_query($conn, $sql);
   if ($result) {
     while($row = mysqli_fetch_array($result)) {
       if ($row['showOnBoard'] == 'FALSE') {
         continue;
       } else {
         $users++;
       }
       foreach ($row as $key => $value) {
         if (gettype($key) == "string" && is_numeric(substr($key, -3))) {
           if (!isset($stats[$key])) {
             $stats[$key] = 0;
           }
           if ($value == 'TRUE') {
             $stats[$key] ++;
           }
         }
       }
     }
   }
   echo '<div style="padding-bottom:15px"><h3 style="display:inline">Question Stats</h3><h4 class="pull-right">Total users: ' . $users . '</h4></div>';
   printTable('crypto', $users, $stats['crypto100'], $stats['crypto200'], $stats['crypto300'], $stats['crypto400'], $stats['crypto500']);
   printTable('grabBag', $users, $stats['grabBag100'], $stats['grabBag200'], $stats['grabBag300'], $stats['grabBag400'], $stats['grabBag500']);
   printTable('recon', $users, $stats['recon100'], $stats['recon200'], $stats['recon300'], $stats['recon400'], $stats['recon500']);
   printTable('exploit', $users, $stats['exploit100'], $stats['exploit200'], $stats['exploit300'], $stats['exploit400'], $stats['exploit500']);
   printTable('web', $users, $stats['web100'], $stats['web200'], $stats['web300'], $stats['web400'], $stats['web500']);
   printTable('flash', $users, $stats['flash100'], $stats['flash200'], $stats['flash300'], $stats['flash400'], $stats['flash500']);
 }

 function printTable($name, $totalUsers, $one, $two, $three, $four, $five) {
   if ($name == 'crypto') {
     $titleName = 'Cryptography';
   } else if ($name == 'flash') {
     $titleName = 'Flash';
   } else if ($name == 'grabBag') {
     $titleName = 'Grab Bag';
   } else if ($name == 'recon') {
     $titleName = 'Reconnaissance';
   } else if ($name == 'exploit') {
     $titleName = 'Exploit';
   } else if ($name == 'web') {
     $titleName = 'Web';
   } else if($name == 'flash'){
     $titleName = 'Flash';
   }
   if ($_SESSION['admin']) {
     $admin = true;
   } else {
     $admin = false;
   }

   echo '
   <div class="panel panel-default">
     <div class="panel-heading">
       <h3 class="panel-title">' . $titleName . '</h3>
     </div>
     <div class="panel-body">
       <table class="table" id="questionStats">
         <tr>
            <th style="width:100px">Point Value</th>
            <th>Users Completed</th>
         </tr>
         <tr>
           <td style="width:100px">100</td>
           <td style="padding:0px"><a '; if ($admin) { echo 'href="#collapse' . $name . "100" . '" data-toggle="collapse" data-parent="#accordion" aria-expanded="true" aria-controls="collapse' . $name . "100" . '"'; } echo ' style="display:block;padding:8px">' . printProgressBar($one, $totalUsers); if ($admin) { echo '</a>'; }
           echo adminDetails($name . "100") . '
           </td>
         </tr>
         <tr>
           <td>200</td>
           <td style="padding:0px"><a '; if ($admin) { echo 'href="#collapse' . $name . "200" . '" data-toggle="collapse" data-parent="#accordion" aria-expanded="true" aria-controls="collapse' . $name . "200" . '"'; } echo ' style="display:block;padding:8px">' . printProgressBar($two, $totalUsers); if ($admin) { echo '</a>'; }
           echo adminDetails($name . "200") . '
           </td>
         </tr>
         <tr>
           <td>300</td>
           <td style="padding:0px"><a '; if ($admin) { echo 'href="#collapse' . $name . "300" . '" data-toggle="collapse" data-parent="#accordion" aria-expanded="true" aria-controls="collapse' . $name . "300" . '"'; } echo ' style="display:block;padding:8px">' . printProgressBar($three, $totalUsers); if ($admin) { echo '</a>'; }
           echo adminDetails($name . "300") . '
           </td>
         </tr>
         <tr>
           <td>400</td>
           <td style="padding:0px"><a '; if ($admin) { echo 'href="#collapse' . $name . "400" . '" data-toggle="collapse" data-parent="#accordion" aria-expanded="true" aria-controls="collapse' . $name . "400" . '"'; } echo ' style="display:block;padding:8px">' . printProgressBar($four, $totalUsers); if ($admin) { echo '</a>'; }
           echo adminDetails($name . "400") . '
           </td>
         </tr>
         <tr>
           <td>500</td>
           <td style="padding:0px"><a '; if ($admin) { echo 'href="#collapse' . $name . "500" . '" data-toggle="collapse" data-parent="#accordion" aria-expanded="true" aria-controls="collapse' . $name . "500" . '"'; } echo ' style="display:block;padding:8px">' . printProgressBar($five, $totalUsers); if ($admin) { echo '</a>'; }
           echo adminDetails($name . "500") . '
           </td>
         </tr>
       </table>
     </div>
   </div>
   ';
 }

 function printProgressBar($completed, $outOf){
   $percentComplete = ($completed / $outOf) * 100;
   $style = "";
   if ($percentComplete == 100) {
     $style = " progress-bar-success";
   } else if ($percentComplete > 75) {
     $style = "";
   } else if ($percentComplete > 50) {
     $style = " progress-bar-info";
   } else if ($percentComplete > 25) {
     $style = " progress-bar-warning";
   } else {
     $style = " progress-bar-danger";
   }
   if ($completed == 0) {
     $completed = '';
   }
   return '
    <div class="progress" style="margin-bottom:0px">
      <div class="progress-bar progress-bar-striped' . $style . '"role="progressbar" aria-valuenow="' . $percentComplete . '" aria-valuemin="0" aria-valuemax="100" style="width: ' . $percentComplete . '%;">
        ' . $completed . '
      </div>
    </div>
   ';
 }

 function adminDetails($probCode){
   if ($_SESSION['admin'] == 'TRUE') {
     include 'mysqlLogin.php';
     $sql = "SELECT $probCode, user, showOnBoard FROM scores";
     $result = mysqli_query($conn, $sql);
     $toReturn = '
     <div id="collapse' .$probCode . '" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading' . $probCode . '">
      <div class="panel-body">
      <table class="table" id="adminDetails" style="width:250px">
        <tr>
           <th style="width:100px">User</th>
           <th>Question State</th>
        </tr>
    ';
     while ($row = mysqli_fetch_array($result)) {
       if ($row['showOnBoard'] == 'FALSE') {
         continue;
       }
       if ($row[$probCode] == "TRUE") {
         $display = 'Complete';
         $style = 'class="success"';
       } else {
         $display = 'Incomplete';
         $style = 'class="danger"';
       }
       $toReturn .= '
          <tr>
            <td>' . $row['user'] . '</td>
            <td id="questionState" ' . $style . '>' . $display . '</td>
          </tr>
       ';
     }
     $toReturn .= '
        </table>
      </div>
     </div>
     ';
     return $toReturn;
   }
 }
?>
