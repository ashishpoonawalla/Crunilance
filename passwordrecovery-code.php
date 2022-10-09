<?php


//------------------------------------------------

    // $uname = ($_POST['uemail']);
   
    // require('db.php');
    // $msg= "";

    // $sql="SELECT * FROM user_info WHERE email='$uname' " ;
    // $result = $conn->query($sql);

    // if($row = $result->fetch_assoc())
    // {   

    
    // } else {
    //     //$conn->close();
    //     $msg="Invalid username or password";
    // }

            
    // $conn->close();
    $msg="Password recovery code pending..";			

header ('Location: passwordrecovery.php?msg='.$msg);
?>