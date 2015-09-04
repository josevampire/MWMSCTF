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
   printTable('trivia', $users, $stats['trivia100'], $stats['trivia200'], $stats['trivia300'], $stats['trivia400'], $stats['trivia500']);
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
   } else if ($name == 'trivia') {
     $titleName = 'Trivia';
   } else if ($name == 'web') {
     $titleName = 'Web';
   } else if($name == 'flash'){
     $titleName = 'Flash';
   }

   echo '
   <div class="panel panel-default">
     <div class="panel-heading">
       <h3 class="panel-title">' . $titleName . '</h3>
     </div>
     <div class="panel-body">
       <table class="table table-bordered" id="userinfo">
         <tr>
           <td style="width:100px">100</td>
           <td>' . printProgressBar($one, $totalUsers) . '</td>
         </tr>
         <tr>
           <td>200</td>
           <td>' . printProgressBar($two, $totalUsers) . '</td>
         </tr>
         <tr>
           <td>300</td>
           <td>' . printProgressBar($three, $totalUsers) . '</td>
         </tr>
         <tr>
           <td>400</td>
           <td>' . printProgressBar($four, $totalUsers) . '</td>
         </tr>
         <tr>
           <td>500</td>
           <td>' . printProgressBar($five, $totalUsers) . '</td>
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
?>
