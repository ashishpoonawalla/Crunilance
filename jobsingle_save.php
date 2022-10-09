<?php

session_start();

    $useremail = $_SESSION["username"];
    $pid = ($_REQUEST['pid']);
    
   
    require('db.php');

    $sql="SELECT * FROM save_job WHERE useremail='$useremail' AND pid=$pid " ;
    $result = $conn->query($sql);

    if($row = $result->fetch_assoc())
    {
                        
       
    
    } else {

        $sql="INSERT INTO save_job(useremail, pid) Values('$useremail','$pid') " ;
            
        $conn->query($sql);

    }

            
    $conn->close();
				

    header ('Location: jobsingle.php?pid='.$pid);
?>