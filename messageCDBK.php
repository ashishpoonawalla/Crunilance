<?php
session_start();

require('db.php');


            
$un24 = $_SESSION["username"];

extract($_POST);


//--------------------------------- Insert Record ----------------------------------
if (isset($_POST['chatmessage']) && $_POST['chatmessage']!="" && isset($_POST['jobid']) && isset($_POST['sender']) && isset($_POST['reciever']) ){

    $suid = $_SESSION["suid"];
    $sfnm = $_SESSION["sfnm"];
  

    $ruid = $_SESSION["ruid"];
    $rfnm = $_SESSION["rfnm"];
  

    $psid = $_SESSION["psid"];

    //$sql33="INSERT INTO chat(chatmessage, jobid, suid, sfnm,  ruid, rfnm,  psid) Values('$chatmessage','$jobid','$suid','$sfnm','$ruid','$rfnm', $psid) " ;
    //$conn->query($sql33) ;

    ////$query = " INSERT INTO `chat` (`jobid`, `sender`, `reciever`, `chatmessage`) VALUES ('$jobid', '$sender', '$reciever', '$chatmessage') ";
    
    ////mysqli_query($conn,$query);


    require('db.php');

    try {
        $conn1 = new PDO("mysql:host=$servername;dbname=$db", $username, $password);
    
        $conn1->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
    

        $stmt12 = $conn1->prepare("INSERT INTO chat (chatmessage, jobid,  suid,  sfnm,   ruid,  rfnm,   psid) 
                                           VALUES  (:chatmessage, :jobid, :suid, :sfnm,  :ruid, :rfnm,  :psid) ");

        $stmt12->bindParam(':chatmessage', $chatmessage);
        $stmt12->bindParam(':jobid', $jobid);
        $stmt12->bindParam(':suid', $suid);
        $stmt12->bindParam(':sfnm', $sfnm);
        $stmt12->bindParam(':ruid', $ruid);                
        $stmt12->bindParam(':rfnm', $rfnm);
        $stmt12->bindParam(':psid', $psid);
        $stmt12->execute();


        //echo '<script>alert("You have awarded job successfully.")</script>';


    } catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
    $conn1 = null;



} else {




// --------------------------------- Record List ----------------------------
    if (isset($_SESSION["jobid"])){

        $jobid1  = $_SESSION["jobid"];
        $psid  = $_SESSION["psid"];
        $suid1 = $_SESSION["suid"];        
        $ruid1 = $_SESSION["ruid"];

        //$sql1="SELECT * FROM chat Where psid=$psid AND ((suid='$suid1' AND ruid='$ruid1') OR (suid='$ruid1' AND ruid='$suid1'))" ;
        
        $sql1="SELECT * FROM chat Where psid=$psid AND (suid='$suid1' OR suid='$ruid1') AND (ruid='$suid1' OR ruid='$ruid1')" ;
        
        //$sql1="SELECT * FROM chat Where jobid=$jobid1 AND (suid='$suid1' OR suid='$ruid1') AND (ruid='$suid1' OR ruid='$ruid1')" ;

        $result = $conn->query($sql1);
        $data = "";
        while ($row2 = mysqli_fetch_array($result)){

            $cid = $row2['cid'];
            $msg = $row2['chatmessage'];
            $uid = $row2['suid'];
            $fnm = $row2['sfnm']; 
            $status1 = $row2['status1']; 
            
            $dt1 = $row2['date1']; 
            $phpdate = strtotime( $dt1 );
            $ddt = date("d-M, H:i", $phpdate);

            $ruid = $row2['suid'];
            if ($ruid == $un24)
            {
                $uid = $row2['ruid'];
                $fnm = $row2['rfnm']; 
                
            }
            $readmsg = "";
            if ($status1 == "Y")
            {
                $readmsg =" wt-readmessage ";
            }



            
            if ($ruid != $un24){
                $imgrr = "./assets/imagesu/$uid.jpg?t=".filemtime('./assets/imagesu/'.$uid.'.jpg');
                $data .= "<div class='wt-offerermessage'>
                                <figure style='width: 30px; height: 30px;'><img src='$imgrr'
                                        alt='image description' ></figure>
                                <div class='wt-description'>
                                    <p>
                                    $msg</p>
                                    <div class='clearfix'></div>
                                    <time datetime='2017-08-08'>$ddt</time> 
                                </div>
                            </div>";
            
       
            } else {
                $imgrr = "./assets/imagesu/$un24.jpg?t=".filemtime('./assets/imagesu/'.$un24.'.jpg');
                $data .= "  <div class='wt-memessage $readmsg'>
                                <figure style='width: 30px; height: 30px;'><img src='$imgrr'
                                        alt='image description'></figure>
                                <div class='wt-description'>
                                    <p>$msg</p>
                                    
                                    <div class='clearfix'></div>
                                    <time >$ddt</time> 
                                    
                                </div>
                            </div>";
            }
        
           ?>


                                            <!-- <div class="wt-offerermessage">
														<figure><img src="images/messages/img-12.jpg"
																alt="image description"></figure>
														<div class="wt-description">
															<p>Consectetur adipisicing elit sei do eiusmod tempor
																incididunt labore et dolore.</p>
															<div class="clearfix"></div>
															<time datetime="2017-08-08">January 12th, 2011</time>
														</div>
													</div>


													<div class="wt-memessage wt-readmessage">
														<figure><img src="images/messages/img-11.jpg"
																alt="image description"></figure>
														<div class="wt-description">
															<p>Eiusmod tempor incididunt labore et dolore magna aliqiu
																enim ad minim veniam qiuisru exercitation ullamco
																laborisen nisi ut aliquip exea.</p>
															<div class="clearfix"></div>
															
															<div class="clearfix"></div>
															<time datetime="2017-08-08">Jun 28, 2017 09:30</time>
															<div class="clearfix"></div>
														</div>
													</div> -->

<?php 

        

    
    $sql122="UPDATE chat SET status1='Y' Where psid=$psid AND ruid='$un24' " ;       
    $conn->query($sql122);
        }


    echo $data;
    
    }
}

?>