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
            
            $sql="UPDATE project_mile SET paystatus='Funded' WHERE psid='$psid' AND id=$id " ;
            
            if($result = $conn->query($sql))
            {
                $msg="Funded successfully";


                //------------------------------- insert to transaction ----------------------------

                $dtl = "Milestone funded - job id: $pid ";
                
                $sql2="INSERT INTO transactions (username, amount, details, DRCR, status1, job_id, usertype ) Values('$unm2',$tpri1,'$dtl','CR',' ',$pid, 'Emp')" ;
                
                $conn->query($sql2) ;

                //-------------------------------






            } else {
                $msg= "Some Error when funding!";
            
                
            }
        }
        //echo $msg;
        header ('Location: dashboard-ongoingprogress.php?pid='. $pid);

?>