<?php 
include 'conn.php';
$cat_Did = $_GET['cat_Did'];

$sql = "DELETE FROM category WHERE cat_id = '{$cat_Did}' ";
 
if ($result = mysqli_query($conn,$sql) ) {
   echo "<script>alert('Your Record Hass Been Deleted')</script>";
   header("location:Category.php");
}else{
   echo "<script>alert('Your Can Delete After Some Time')</script>";
}


?>