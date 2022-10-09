<?php 

session_start();
require('db.php');
$user = $_SESSION["username"];
    
    $sql="Update user_info SET usertype ='Freelancer' WHERE email='$user' " ;
    $result = $conn->query($sql);

$_SESSION["usertype"] = 'Freelancer';


header ('Location: dashboard-freelancer.php');
?>