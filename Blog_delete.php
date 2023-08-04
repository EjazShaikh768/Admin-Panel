<?php 
include 'conn.php';
$blogid = $_GET['blog_Did'];

$sql = "DELETE FROM blogs WHERE blog_id = '{$blogid}' ";
 
if ($result = mysqli_query($conn,$sql) ) {
   echo "<script>alert('Your Record Hass Been Deleted')</script>";
   header("location:dashboard.php");
}else{
   echo "<script>alert('Your Can Delete After Some Time')</script>";
}


?>