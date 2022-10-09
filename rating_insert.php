<?php
if(isset($_POST['submit_rating']))
{
  $host="localhost";
  $username="root";
  $password="";
  $databasename="crunilance";

  $connect=mysqli_connect($host,$username,$password);
  $db=mysqli_select_db($connect,$databasename);
  
  $php_rating=$_POST['phprating'];
  $asp_rating=$_POST['asprating'];
  $jsp_rating=$_POST['jsprating'];
  $insert=mysqli_query($connect, "insert into rating values('','$php_rating','$asp_rating','$jsp_rating')");
}
?>