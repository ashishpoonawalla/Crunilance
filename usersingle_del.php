<?php

session_start();

    $useremail = $_SESSION["username"];
    $uid = ($_REQUEST['uid']);
    
   
    require('db.php');

    $sql="DELETE FROM save_user WHERE useremail='$useremail' AND user_id=$uid " ;
    $conn->query($sql);

    
            
    $conn->close();
				

    header ('Location: usersingle.php?uid='.$uid);
?>