<?php 


//---------------------------------- Update Freelancer Rating ------------------------------
    {
        require('db.php');
        $user = $_SESSION['username']; 
        $cnt = 0;
        $sql1="SELECT * FROM projects WHERE tusername='$user' " ;
        $result1 = $conn->query($sql1);
        

        $F_rat_tot = 0;
        $F_rat_avg = 0;
        while($row1 = $result1->fetch_assoc()){
            $pid = $row1['product_id'];
                                       
                
            $F_rat = $row1['F_rat'];
         
            if ($F_rat != 0){
                $cnt++;  
                $F_rat_tot = $F_rat_tot + $F_rat;
            }

        }

        if ($cnt>0){
            $F_rat_avg = $F_rat_tot / $cnt;
        

            require('db.php');
		    
			$sql="UPDATE user_info SET Free_Work=$cnt, Free_Rating=$F_rat_avg WHERE email='$user' ";			
	        $conn->query($sql);
        }



    }


//---------------------------------- Update Employer Rating ------------------------------
    {
        require('db.php');
        $user = $_SESSION['username']; 
        $cnt = 0;
        $sql1="SELECT * FROM projects WHERE userEmail='$user' " ;
        $result1 = $conn->query($sql1);
        

        $E_rat_tot = 0;
        $E_rat_avg = 0;
        while($row1 = $result1->fetch_assoc()){
            $pid = $row1['product_id'];
                                       
                
            $E_rat = $row1['E_rat'];
         
            if ($E_rat != 0){
                $cnt++;  
                $E_rat_tot = $E_rat_tot + $E_rat;
            }

        }

        if ($cnt>0){
            $E_rat_avg = $E_rat_tot / $cnt;
        

            require('db.php');
		    
			$sql="UPDATE user_info SET Emp_Work=$cnt, Emp_Rating=$E_rat_avg WHERE email='$user' ";			
	        $conn->query($sql);
        }



    }

?>                                                