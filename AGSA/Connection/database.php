<?php 
$hostname = "localhost";
$Dbuser ="root";
$Dbpassword ="";
$Dbname = "agsa";
$conn = mysqli_connect($hostname,$Dbuser,$Dbpassword,$Dbname);
if(!$conn){
    die("Failed to Connect");
}

?>
