<?php
session_start();
       						
$date = date('Y-m-d H:i:s');

$date = rand(10000,99999);
$uname = $_SESSION["username"] ;
$target_file = "assets/imagesu/". $uname. "$date.jpg";
$file111 =  $uname. "$date.jpg";

$title = ($_POST['title']);
$weburl = ($_POST['weburl']);
$imgurl = $target_file;

$email = $_SESSION["username"];   

echo "$title, $weburl, $imgurl";



require('db.php');

	
//prepare and bind


try {
	$conn1 = new PDO("mysql:host=$servername;dbname=$db", $username, $password);

	$conn1->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    

	$stmt = $conn1->prepare("INSERT INTO user_project(title,  email,  weburl,  imgurl) 
                                             VALUES (:title, :email, :weburl, :imgurl )");

    $stmt->bindParam(':title', $title);	
	$stmt->bindParam(':email', $email);
	$stmt->bindParam(':weburl', $weburl);
    $stmt->bindParam(':imgurl', $imgurl);	

	if ($stmt->execute() === TRUE) {
					
		
		$_SESSION["pidIMG"] = $target_file ;
		
		$msg='Job posted successfully';
		
	} else {
	 	$msg= "Some Error when creating jobs!";
	
		
	}
	
	
	//$stmt->close();
	 
	
  } catch(PDOException $e) {
	$msg= "Error: " . $e->getMessage();
  }
 
echo $msg;


$path11 = "uploads";
$fileName = $_FILES["fileToUpload"]["name"]; // The file name
$fileTmpLoc = $_FILES["fileToUpload"]["tmp_name"]; // File in the PHP tmp folder
$fileType = $_FILES["fileToUpload"]["type"]; // The type of file it is
$fileSize = $_FILES["fileToUpload"]["size"]; // File size in bytes
$fileErrorMsg = $_FILES["fileToUpload"]["error"]; // 0 for false... and 1 for true
$kaboom = explode(".", $fileName); // Split file name into an array using the dot
$fileExt = end($kaboom); // Now target the last array element to get the file extension

// START PHP Image Upload Error Handling --------------------------------------------------


if (!$fileTmpLoc) { // if file not chosen
    echo "ERROR: Please browse for a file before clicking the upload button.";
    header('Location: dashboard-profile-pro.php?Error=6');
    exit();
} else if($fileSize > 20242880) { // if file size is larger than 20 Megabytes
    echo "ERROR: Your file was larger than 5 Megabytes in size.";
    unlink($fileTmpLoc); // Remove the uploaded file from the PHP temp folder
    header('Location: dashboard-profile-pro.php?Error=6');
    exit();
} else if (!preg_match("/.(gif|jpg|png)$/i", $fileName) ) {
     // This condition is only if you wish to allow uploading of specific file types    
     echo "ERROR: Your image was not .gif, .jpg, or .png.";
     unlink($fileTmpLoc); // Remove the uploaded file from the PHP temp folder
     header('Location: dashboard-profile-pro.php?Error=6');
     exit();
} else if ($fileErrorMsg == 1) { // if file upload error key is equal to 1
    echo "ERROR: An error occured while processing the file. Try again.";
    header('Location: dashboard-profile-pro.php?Error=6');
    exit();
}




// END PHP Image Upload Error Handling ---------------------------------
// Place it into your "uploads" folder mow using the move_uploaded_file() function
$moveResult = move_uploaded_file($fileTmpLoc, "$path11/$fileName");
// Check to make sure the move result is true before continuing
if ($moveResult != true) {
    echo "ERROR: File not uploaded. Try again.";
    unlink($fileTmpLoc); // Remove the uploaded file from the PHP temp folder
    header('Location: dashboard-profile-pro.php?Error=6');
    exit();
}
unlink($fileTmpLoc); // Remove the uploaded file from the PHP temp folder
// ---------- Include Adams Universal Image Resizing Function --------

include_once("ak_php_img_lib_1.0.php");
$target_tmp = "$path11/$fileName";
$resized_file = "$path11/$fileName";
$resized_file = "uploads/resized_$fileName";
$wmax = 300;
$hmax = 200;
ak_img_resize($target_tmp, $resized_file, $wmax, $hmax, $fileExt);


// ----------- End Adams Universal Image Resizing Function ----------
// ------ Start Adams Universal Image Thumbnail(Crop) Function ------
$target_tmp = "$path11/$fileName";
//$target_tmp = "uploads/resized_$fileName";
//$thumbnail = "uploads/thumb_$fileName";


/*
$thumbnail = "uploads/thumb_$fileName";
$wthumb = 500;
$hthumb = 500;
ak_img_thumb($target_tmp, $thumbnail, $wthumb, $hthumb, $fileExt);
*/
copy("$path11/$fileName" , $target_file);
unlink("$path11/$fileName");
        
       















header('Location: dashboard-profile-pro.php');

?>