<?php 


$db_server = "localhost";
$db_username = "root";
$db_password = "";
$db_name = "landroof";


$conn = mysqli_connect($db_server,$db_username,$db_password,$db_name);

if(!$conn){
    die("Could Not Connect My Sql Server".mysqli_connect_error());
}

?>