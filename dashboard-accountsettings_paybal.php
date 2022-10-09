<?php

//------------------------- Membership Upgrade Pay from Balance ----------------------


session_start();
require('db.php');
        $msg="";
                                     
        //------------------------- Update bidcount ----------------------
        $date1 = date('Y-m-d'); 
        $date2 = date("Y-m-d", strtotime("+1 month"));

        $var = "";
        if (isset($_REQUEST["var"])){
            $var = $_REQUEST["var"];
        }

        $amt = 10;
        $newbid = 100;
        if ($var == "Standard"){
            $amt = 20;
            $newbid = 200;
        }
        if ($var == "Professional"){
            $amt = 50;
            $newbid = 500;
        }

        $unm2 = $_SESSION["username"];

        $sql300="SELECT * FROM user_info WHERE email='$unm2'" ;
        $result300 = $conn->query($sql300);

        if($row300 = $result300->fetch_assoc())
        {
            $bidcount = $row300["bidcount"];
            $bidcount = $bidcount + $newbid;                
            
            $_SESSION["bidcount"] = $bidcount;
            

            require('db.php');
      
            $sql301="UPDATE user_info SET bidcount='$bidcount', membership='$var', membershipstart='$date1', membershipend='$date2' Where email='$unm2'" ;                
          
   
            if($conn->query($sql301))
            {
                $msg="Membership changed successfully";


                //------------------------------- insert to transaction ----------------------------

                $dtl = "Membership change: $var Plan";
                
                $sql2="INSERT INTO transactions (username, amount, details, DRCR, status1, job_id, usertype ) Values('$unm2',$amt,'$dtl','DR',' ',0, 'Free')" ;
                
                $conn->query($sql2) ;

                //-------------------------------

            } else{

                $msg="Error Membership changing";
            }
        }
        //echo $msg;
        header ('Location: dashboard-accountsettings.php?msg='. $msg);

?>