<?php

session_start();

    $useremail = $_SESSION["username"];
    $user_id = ($_REQUEST['user_id']);
    
   
    require('db.php');

    $sql="SELECT * FROM save_user WHERE useremail='$useremail' AND user_id=$user_id " ;
    $result = $conn->query($sql);

    if($row = $result->fetch_assoc())
    {
               

    } else {

        $sql="INSERT INTO save_user(useremail, user_id) Values('$useremail','$user_id') " ;            
        $conn->query($sql);

    }

            
    $conn->close();
				

    header ('Location: usersingle.php?uid='.$user_id);
?>