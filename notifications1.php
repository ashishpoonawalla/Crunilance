<?php

session_start();

$nid = $_REQUEST["nid"];
$ntype = $_REQUEST["ntype"];
$jobid = $_REQUEST["jobid"];
$user = $_SESSION["username"];

require('db.php');
		
$sql="UPDATE notifications SET status1='Y' Where nid=$nid " ;

if ($conn->query($sql) === TRUE) {

}


  

    
	
    $sql1 = "SELECT * FROM projects Where userEmail='$user' AND product_id=$jobid ";
    $result1 = $conn->query($sql1);
  
    
    if ($row1 = $result1->fetch_assoc()) {
      header('Location: dashboard-ongoingsingle.php?pid='.$jobid);
    }else{
      header('Location: fr-ongoingjob.php?pid='.$jobid);
    }
  
//   if ($ntype == "vehicle" || $ntype == "BOOK"){
//     header('Location: vehicle_detail.php?jobid='.$jobid);
//   }
//   if ($ntype == "transporter"){
//     header('Location: transports.php');
//   }
//   if ($ntype == ""){
//     header('Location:notifications.php');
//   }
  
  

?>