<!doctype html>
<!--[if lt IE 7]>		<html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>			<html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>			<html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="">
<!--<![endif]-->


<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Crunilance</title>
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="apple-touch-icon" href="apple-touch-icon.png">
	<link rel="icon" href="images/favicon.png" type="image/x-icon">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/normalize.css">
	<link rel="stylesheet" href="css/scrollbar.css">
	<link rel="stylesheet" href="css/fontawesome/fontawesome-all.css">
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/themify-icons.css">
	<link rel="stylesheet" href="css/owl.carousel.min.css">
	<link rel="stylesheet" href="css/jquery-ui.css">
	<link rel="stylesheet" href="css/linearicons.css">
	<link rel="stylesheet" href="css/tipso.css">
	<link rel="stylesheet" href="css/chosen.css">
	<link rel="stylesheet" href="css/prettyPhoto.css">
	<link rel="stylesheet" href="css/main.css">
	<link rel="stylesheet" href="css/dashboard.css">
	<link rel="stylesheet" href="css/color.css">
	<link rel="stylesheet" href="css/transitions.css">
	<link rel="stylesheet" href="css/responsive.css">
	<link rel="stylesheet" href="css/dbresponsive.css">
	<script src="js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
</head>

<?php
	include('header_menu.php');
  include('authCheck.php');
?>

			<!--Header End-->
			<!--Main Start-->
			<main id="wt-main" class="wt-main wt-haslayout">
				<!--Sidebar Start-->
				
<?php
	include('sidebar.php');
?>				

				<!--Sidebar Start-->
				<!--Register Form Start-->
				<section class="wt-haslayout wt-dbsectionspace">
					<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-8 col-xl-1">
						</div>
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-8 col-xl-10">
							<div class="wt-dashboardbox wt-messages-holder">
								<div class="wt-dashboardboxtitle">
									<h2>Messages</h2>
								</div>
							





								<div class="wt-dashboardboxcontent wt-dashboardholder wt-offersmessages" style="width: 100%;">
									<!-- <ul>
										<li>
											 -->
											<div class="wt-chatarea wt-verticalscrollbar wt-dashboardscrollbar" >
												







                        <?php

                          require('db.php');
                          $limit = 5; 
                          if (isset($_GET["page"] )) 
                              {
                              $page  = $_GET["page"]; 
                              } 
                          else 
                          {
                              $page=1; 
                          };  

                          $record_index= ($page-1) * $limit;  

          
                          $un24 = $_SESSION["username"];			
                      
                          //$sql1="SELECT DISTINCT psid FROM chat Where suid='$un24' OR ruid='$un24' ORDER BY cid DESC Limit $record_index, $limit" ;
                          $sql1="SELECT DISTINCT psid FROM chat Where suid='$un24' OR ruid='$un24' ORDER BY cid DESC " ;
                          
                          $result1 = $conn->query($sql1);

                          $rowcnt=0;
                          while($row1 = $result1->fetch_assoc())
                          {
                          
                              $rowcnt++;							  
                              $psid=$row1['psid'];
                                                      
                              
                              $sql2="SELECT * FROM chat Where psid=$psid " ;							
                              $result2 = $conn->query($sql2);
                          
                              if($row2 = $result2->fetch_assoc())
                              {
                                  $jid1=$row2['jobid'];
                                  $uid = $row2['suid'];
                                  $fnm = $row2['sfnm']; 
                                  $img = $row2['simg']; 
                                  $img = $row2['simg']; 
                                  $dt1 = $row2['date1']; 
                                  $st12 = $row2['status1'];
                                  


                                  $ruid = "";

                                  if ($uid == $un24)
                                  {
                                  $ruid1 = $uid = $row2['ruid'];                       
                                  $fnm = $row2['rfnm']; 
                                  $img = $row2['rimg']; 
                                  }
                  
                                  $sql3="SELECT * FROM projects Where product_id=$jid1 " ;
                          
                                  $result3 = $conn->query($sql3);
                                  if($row3 = $result3->fetch_assoc())
                                  {
                                      $titl=$row3['product_title'];
                                      $desti=$row3['PCity']." - ".$row3['DCity'];
                                      $typ = $row3['typepost'];
                                  }
                              ?>





                                      
                              <div class="wt-ad" onclick="window.location.assign('messagechange.php?jobid=<?php echo $jid1; ?>&psid=<?php echo $psid; ?>&typ=<?php echo $typ; ?>');">
                                <figure><img class="" src="assets/imagesu/<?php echo $uid; ?>.jpg?t=<?php echo filemtime('assets/imagesu/'.$uid.'.jpg'); ?>" style="margin-right: 5px; width: 25px; height: 25px;  object-fit: cover; border-radius: 30px;" ></figure>
                                <div class="wt-adcontent" style="display: flex; flex-direction: rows;">
                                  <h3><?php echo $fnm; ?> - </h3>
                                  <span><?php echo $titl; ?></span>
                                </div>
                              </div>
                        
                                                  


                          <?php } 
                          }
                          ?>





											</div>
										<!-- </li> -->

                            


      <?php
        
        if (isset($_SESSION["sfnm"])){
          ?>

            <div style="padding: 5px; width: 350px; max-height:470px; overflow-y: scroll; border: solid 3px #bbb; position: fixed; right: 0;bottom: 0; background-color: white; z-index: 300; border-radius: 5px; 
              box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
            "    >
             
              <div id="records_contant"></div>
              
                <?php
                  $jobid= $_SESSION["jobid"] ;

                  $suid = $_SESSION["suid"];
                  $sfnm = $_SESSION["sfnm"];
                  //$simg = $_SESSION["simg"];

                  $ruid = $_SESSION["ruid"];
                  $rfnm = $_SESSION["rfnm"];
                  //$rimg = $_SESSION["rimg"];


                ?>

                <?php
                      $filename1 = $filename2 = ""; 
                      if(isset($_SESSION["file112"])){
                        //echo $_SESSION["file112"];
                        $filename1 = $_SESSION["file112"];
                        $filename1 = trim($filename1);

                        $pieces = explode("/", $filename1);
                        $filename2 = $pieces[1];
                      } 
                        $num = rand(10000,99999);
                        $_SESSION["file11"] = $num; 
                      

                        $_SESSION["file112"] = null;
                    ?>



                <!-- <textarea style="font-size: 11px; height: 70px;" name="chatmessage" id="chatmessage" autofocus="autofocus" class="form-control mb-3" placeholder=""></textarea> -->
                <textarea style="  font-size: 11px; height: 70px;" name="chatmessage" id="chatmessage" onkeypress="if(event.which === 13 && !event.shiftKey) addRecord();" class="form-control mb-3" autofocus="autofocus" placeholder="To <?php echo $rfnm; ?>">
                        <?php 
                          if($filename1 != "" && $filename1 != null  ){
                            echo "<a href='$filename1'>$filename2 - Download</a>";
                          }
                          ?>
                </textarea>

                  <input type="hidden" name="jobid" id="jobid" class="form-control mb-3" value="<?php echo $jobid; ?>"/>
                  <input type="hidden" name="sender" id="sender" class="form-control mb-3" value="<?php echo $suid; ?>"/>
                  <input type="hidden" name="reciever" id="reciever" class="form-control mb-3" value="<?php echo $ruid; ?>"/>  
                
                <div style="display: flex; justify-content: space-between; max-height: 20px; gap:4px;">
               
                 <!-- file upload ------------------ -->
                 <form action="message-fileupload.php"  method="post" enctype="multipart/form-data" >
                        <input type="file" onchange="this.form.submit()" class="form-control" name="fileToUpload" id="fileToUpload"  onkeypress="unsetnameError(false);" 
                        style="border: 0px; margin-top: -14px ; margin-left: -8px;" >
                 </form>


                 <!-- Send Button -->
                 <button style="font-size: 12px; border-radius: 10px; background:#333; float:right; padding: 4px 10px; margin-top: -10px ;" onClick="addRecord();" class="btn btn-sm btn-primary"  >Send</button>
                
                
                 <!-- Close Button -->           
                 <span   style="font-size: 12px; border-radius: 10px; background:#333; float:right;  padding:4px 10px ; margin-top: -10px ;; 
                 color:#fff;" id='close' onclick='this.parentNode.parentNode.parentNode.removeChild(this.parentNode.parentNode); return false;' >x</span>
                </div>



               
            
        </div>
          
        
        <?php  }  ?>





                    <!-- Old code for chat windows ------------------------------------------------- -->
										<!-- <li>
											<div class="wt-chatarea" style=" overflow-y: scroll; min-height: 700px;max-height: 700px;"class="wt-messages wt-verticalscrollbar wt-dashboardscrollbar">
												<div id="records_contant" style="padding-top: 10px; min-height: 580px;" >
													
                        </div>
                                                

                                                
                        <div class="wt-iconbox" style="">

												

                            <?php

                            if (isset($_SESSION["sfnm"])){
                            ?>
        
        
                                <?php
                                  $jobid= $_SESSION["jobid"] ;

                                  $suid = $_SESSION["suid"];
                                  $sfnm = $_SESSION["sfnm"];
                                  

                                  $ruid = $_SESSION["ruid"];
                                  $rfnm = $_SESSION["rfnm"];
                                  
                                ?>

                                  <?php
                                    $filename1 = $filename2 = ""; 
                                    if(isset($_SESSION["file112"])){
                                      //echo $_SESSION["file112"];
                                      $filename1 = $_SESSION["file112"];
                                      $pieces = explode("/", $filename1);
                                      $filename2 = $pieces[1];
                                    } 
                                      $num = rand(10000,99999);
                                      $_SESSION["file11"] = $num; 
                                    

                                      $_SESSION["file112"] = null;
                                  ?>
                                    
                                  <textarea class="form-control" name="chatmessage" id="chatmessage" onkeypress="if(event.which === 13 && !event.shiftKey) addRecord();" class="form-control mb-3" 
                                  autofocus="autofocus" placeholder="Type message here"
                                  style="height: 50px;"
                                  ><?php 
                                    if($filename1 != ""){
                                      echo "<a href='$filename1'>$filename2 - Download</a>";
                                    }
                                    ?></textarea>

                                  <input type="hidden" name="jobid" id="jobid" class="form-control mb-3" value="<?php echo $jobid; ?>"/>
                                  <input type="hidden" name="sender" id="sender" class="form-control mb-3" value="<?php echo $suid; ?>"/>
                                  <input type="hidden" name="reciever" id="reciever" class="form-control mb-3" value="<?php echo $ruid; ?>"/>
                              
                              
                                  
                                  
                                  <button onClick="addRecord();" class="wt-btnsendmsg">Send</button>
                                    

                                   
                                  <form action="message-fileupload.php"  method="post" enctype="multipart/form-data" >
                                   
                                        <input type="file" onchange="this.form.submit()" class="form-control" name="fileToUpload" id="fileToUpload"  onkeypress="unsetnameError(false);" style="border: 0px;" >
                                       
                                   
                                  </form>

      
    
                            <?php  }  ?>
                        </div>

                        
											</div>
										</li> -->




									<!-- </ul> -->
								</div>
							</div>
						</div>
						
					</div>
				</section>
				<!--Register Form End-->
			</main>
			<!--Main End-->
		</div>
		<!--Content Wrapper End-->
	</div>

		
<?php 
	include('footer_menu.php'); 
?>







	<!--Wrapper End-->
	<script src="js/vendor/jquery-3.3.1.js"></script>
	<script src="js/vendor/jquery-library.js"></script>
	<script src="js/vendor/bootstrap.min.js"></script>
	<script src="js/owl.carousel.min.js"></script>
	<script src="js/chosen.jquery.js"></script>
	<script src="js/tilt.jquery.js"></script>
	<script src="js/scrollbar.min.js"></script>
	<script src="js/prettyPhoto.js"></script>
	<script src="js/jquery-ui.js"></script>
	<script src="js/readmore.js"></script>
	<script src="js/countTo.js"></script>
	<script src="js/appear.js"></script>
	<script src="js/tipso.js"></script>
	<script src="js/jRate.js"></script>
	<script src="js/main.js"></script>
    <script src="plugins/jQuery/jquery.min.js"></script>
	<script>
		const menu_icon = document.querySelector('.menu-icon');
		function addClassFunThree()
		{
			this.classList.toggle("click-menu-icon");
		}
		menu_icon.addEventListener('click', addClassFunThree);
	</script>

<script>
  // if (!("autofocus" in document.createElement("input"))) {
  //   document.getElementById("chatmessage").focus();
  // }
  
  //// Load at start
    $(document).ready(function(){
    readRecords();
  });

  

   //// List of Chat
   function readRecords(){
    var readrecord = "readrecord";
    $.ajax({
      url:"messageCD.php",
      type:"post",
      data: {readrecord: readrecord},
      success:function(data, status){
        $('#records_contant').empty();
        $('#records_contant').html(data);
        //document.getElementById("chatmessage").focus();


        var elmnt = document.getElementById("chatmessage");
elmnt.scrollIntoView();

      }
    });
  }

  setInterval(readRecords, 10000);

  //setInterval(readRecords, 10000);

  //// Add new Chat Message
  function addRecord(){
    
    var chatmessage = document.getElementById("chatmessage").value;
    var Regex = /\b[\+]?[(]?[0-9]{2,6}[)]?[-\s\.]?[-\s\/\.0-9]{3,15}\b/m;

    if (chatmessage.match(/([a-zA-Z0-9._-]+@[a-zA-Z0-9._-]+\.[a-zA-Z0-9_-]+)/gi)){
      //alert('Email not allow in chat..');
      //return
    } else if (Regex.test(chatmessage)){
      //alert('Phone not allow in chat..');
      //return
    } else {
    
    
    var jobid = $('#jobid').val();
    var sender = $('#sender').val();
    var reciever = $('#reciever').val();

    $.ajax({
      url:"messageCD.php",
      type:'post',
      data: {         
        jobid: jobid,
        sender : sender ,
        reciever: reciever,
        chatmessage: chatmessage
      },

      success:function(data, status){
        document.getElementById("chatmessage").value="";
        //document.getElementById("records_contant").removeChild();
        readRecords(); 
        //document.getElementById("chatmessage").focus();


        var elmnt = document.getElementById("chatmessage");
elmnt.scrollIntoView();

      }

    });
   }
  }

</script>
</body>


</html>