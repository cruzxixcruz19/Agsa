<?php 

include "Connection/database.php"; 

if (isset($_GET['id'])) {

$id = $_GET['id'];

$sql = "DELETE FROM users WHERE id='$id'";

$result = $conn->query($sql);

if ($result == TRUE) {
echo '<script> alert ("Successfully delete")</script>';
header("Location: ManageUser.php");

}else{

  echo '<script> alert ("Failed to Delete")</script>';

}

} 

?>


