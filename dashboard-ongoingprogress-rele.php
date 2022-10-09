<?php
        $msg="";
        //------------------ Delete Skill -----------------------
                                    
        if (isset($_REQUEST['id'])){

            session_start();				
            $id = ($_REQUEST['id']);
            $pid = ($_REQUEST['pid']);                            
            $psid = ($_REQUEST['psid']);                            
            $tpri1 = $mamt = ($_REQUEST['mamt']);                            
            $unm2 = $email = $_SESSION["username"];      
                                    
            require('db.php');

            $msg="";
            
            $sql="UPDATE project_mile SET paystatus='Fund Released' WHERE psid='$psid' AND id=$id " ;
            
            if($result = $conn->query($sql))
            {
                $msg="Fund release successfully";



                
                require('db.php');
                $sql11 = "SELECT * FROM project_user Where psid =$psid";
                $result11 = $conn->query($sql11);
                
                if($row11 = $result11->fetch_assoc()) {                    
                   								
                    $useremail2 = $row11['useremail'];
                    $full_name2 = $row11['full_name'];
                  

                    
                //------------------------------- insert to transaction ----------------------------

                 $dtl = "Fund released - job id: $pid ";
                
                 $sql2="INSERT INTO transactions (username, amount, details, DRCR, status1, job_id, usertype ) Values('$unm2',$tpri1,'$dtl','DR',' ',$pid, 'Emp')" ;
                 
                 $conn->query($sql2) ;




                 $dtl = "Fund recieved - job id: $pid ";
                
                 $sql21="INSERT INTO transactions (username, amount, details, DRCR, status1, job_id, usertype ) Values('$useremail2',$tpri1,'$dtl','CR',' ',$pid, 'Free')" ;
                 
                 $conn->query($sql21) ;
 
                //-------------------------------

                }





            } else {
                $msg= "Some Error when funding!";
            
                
            }
        }
        //echo $msg;
        header ('Location: dashboard-ongoingprogress.php?pid='. $pid);

?>