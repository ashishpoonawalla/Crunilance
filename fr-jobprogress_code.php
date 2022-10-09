<?php
if(isset($_POST['submit_rating']))
{

  $host="localhost";
  $username="root";
  $password="";
  $databasename="crunilance";

  $connect=mysqli_connect($host,$username,$password);
  $db=mysqli_select_db($connect,$databasename);
  
  require('db.php');

  $pid=$_POST['pid'];
  $feedback=$_POST['feedback'];
  $php_rating=$_POST['phprating'];
  $asp_rating=$_POST['asprating'];
  $jsp_rating=$_POST['jsprating'];

  $tot = $php_rating  + $asp_rating + $jsp_rating;
  $tot = $tot / 3;

  $comm = "UPDATE projects SET F_feedback='$feedback', F_rat=$tot, F_rat1=$php_rating, F_rat2=$asp_rating, F_rat3=$jsp_rating  Where Product_id=$pid ";
  echo $comm;

  $insert=mysqli_query($connect, $comm);


  require('dbcalc_rating.php');

  header ('Location: fr-jobprogress.php?pid='. $pid);
}
?>