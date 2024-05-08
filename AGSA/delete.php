<?php 

include "Connection/database.php"; 

if (isset($_GET['id'])) {

$id = $_GET['id'];

$sql = "DELETE FROM security WHERE id='$id'";

$result = $conn->query($sql);

if ($result == TRUE) {
echo '<script> alert ("Successfully delete")</script>';
header("Location: SecurityDetails.php");

}else{

  echo '<script> alert ("Failed to Delete")</script>';

}

} 

?>


