<?php

session_start();

    $useremail = $_SESSION["username"];
    $pid = ($_REQUEST['pid']);
    
   
    require('db.php');

    $sql="DELETE FROM save_job WHERE useremail='$useremail' AND pid=$pid " ;
    $conn->query($sql);

    
            
    $conn->close();
				

    header ('Location: jobsingle.php?pid='.$pid);
?>