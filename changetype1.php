<?php 

session_start();
require('db.php');
$user = $_SESSION["username"];
    
    $sql="Update user_info SET usertype ='Employer' WHERE email='$user' " ;
    $result = $conn->query($sql);

$_SESSION["usertype"] = 'Employer';

header ('Location: dashboard-employer.php');
?>