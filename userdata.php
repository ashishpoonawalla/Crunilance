<?php

$myObj = new stdClass();		
    $uname = ($_REQUEST['email']);
    require('db.php');
   
    $sql="SELECT * FROM user_info WHERE email='$uname' " ;
    $result = $conn->query($sql);

    if($row = $result->fetch_assoc())
    {
                       
            //$myObj->name = $row["first_name"];
            //$myObj->mobile = $row["mobile"];
            
            $myObj->account_name = $row["account_name"];
            $myObj->account_no = $row["account_no"];
            $myObj->bank_name = $row["bank_name"];
            $myObj->ifsc = $row["ifsc"];
            $myObj->branch_name = $row["branch_name"];
    
    } else {
        
        $myObj->name = "Invalid email, no data match";
    }

   


$myJSON = json_encode($myObj);

echo $myJSON;

?>