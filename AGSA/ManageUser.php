<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="npm i bootstrap-icons"></script>
    <link rel="stylesheet" href="css/style.css">
    <title>AGSA AGENCY</title>
<style>

   .SecurityTable{
    margin-top: 15%;
    width: 80%;
    position: fixed;
    border-bottom: 2px solid grey;
    border-right: 2px solid grey;
    border-left: 2px solid grey;
    border-top: 2px solid grey;
    margin-left: 20%;
    margin-right:2%;
    }
    th{
    font-size: 12px;
    text-align: center;
    font-weight: bolder;
    color: solid black;
    background-color:white;
    padding-left: 10px;
    padding-right: 10px;
    margin-left: 20px;
    border-bottom: 2px solid black;
    border-top: 1px solid black;

    }
    td {
    text-align: center;
    font-size: 12px;
    font-weight: 900;
    background-color: white;
    }

    .addbtn{
        margin-top: 150px;
        width: 5px;
        background-color:white;
        border-radius: 10px;
        font-weight: 1000;
        position: fixed;

    }
    .addbtn:hover{
        color:rgb(197, 94, 94);
        background-color:#6bac8e;
    }

.pagination {
    margin-left: 260px;
    margin-top: 150px;
    position: fixed;
}
.Update {
  background-color:lightseagreen;
  border: none;
  border-radius: 5px;
}
.Delete {
  background-color:orange;
  border: none;
  border-radius: 5px;
}
.Update:hover {
background-color:rgb(197, 94, 94);
}
.Delete:hover {
  background-color:rgb(197, 94, 94);
}
.admindashboard, h2 {
color: white;
background-color: transparent;
margin-left: 10px;
margin-left: 22vw;
margin-top: 0px ;
position: fixed;
font-weight: bolder;
margin-top: 0px;
letter-spacing: 10px;
position: fixed;
}
</style>
 
</head>
<body>
    <!-- Modal -->
<div class="modal fade" id="adduserModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Add</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="ManageUser.php"  method="post">
<div class="modal-body">
<?php 
include "Connection/database.php";
if(isset($_POST["submit"])) {
$lastname = $_POST["lastname"];
$firstname = $_POST["firstname"];
$middlename = $_POST["middlename"];
$username = $_POST["username"];
$password = $_POST["password"];
$role = $_POST["role"];

$errors = array();
if(empty($firstname) OR empty($middlename) OR empty($lastname) OR empty($username) OR empty($password)OR empty($role)){
array_push($errors,"All fields are required");
}
$sql = "SELECT * FROM users WHERE firstname = '$firstname' AND lastname = '$lastname' AND middlename='$middlename'";
$result = mysqli_query($conn,$sql);
$rowcount = mysqli_num_rows($result);
if ($rowcount > 0){
array_push($errors,"This Security Already Add");

}
if(count($errors) >0 ){
foreach($errors as $errors) {
echo "<div class='alert alert-danger'>$errors</div>";
}
}else{  

$sql = "INSERT INTO users (firstname, middlename, lastname, username, password, role) VALUES (?,?,?,?,?,?)";
$stmt = mysqli_stmt_init($conn);
$prepareStmt = mysqli_stmt_prepare($stmt,$sql);

if($prepareStmt){
mysqli_stmt_bind_param($stmt,"ssssss", $firstname, $middlename, $lastname, $username, $password, $role);
mysqli_stmt_execute($stmt);
echo "<div class='alert alert-success'>Added Successfully</div>";
$stmt->close();
$conn->close();
}
else{
die("Something Went Wrong");
}
}
}
?>


      <td>
<label>Last Name:</label> <br>
<input type="text" name="lastname" value="" require>
</td> <br> <br>
<td>
<label>First Name:</label> <br>
<input type="text" name="firstname" required>
</td> <br> <br>
<td>
<label>Middle Name:</label> <br>
<input type="text" name="middlename" required>
</td> <br> <br>
<td>
<label>Username:</label> <br>
<input type="text" name="username" required>
</td> <br> <br>
<td>
<label>Password:</label> <br>
<input type="text" name="password" required>
</td> <br> <br>
<td>
<td>
<select id="role"  name="role" required>
    <option value="">--- Type---</option>
    <option value="user">User</option>
    <option value="admin">Admin</option>  
</select>

</td> <br> <br>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
<div class="Reg">
<input type="submit" class="btn btn-success" name="submit" value="Register">
</div>
</div>
</form>
      </div>
    </div>
  </div>
<!-- Modal End -->

<!-- Modal -->
<div class="modal fade" id="UpdateModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
<div class="wrapper">
    <aside id="sidebar">
        <div class="d-flex">
        <img src="img/download.png" style="width:50px; height:50px; border-radius:25px;">
                <h1>AGSA AGENCY</h1>
        </div>

        <ul class="sidebar-nav">
            <li class="sidebar-item">
                    <a href="index.php" class="sidebar-link">
                    <i class="lni lni-user"></i>
                    <span>DASHBOARD</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="SecurityDetails.php" class="sidebar-link">
                    <i class="lni lni-user"></i>
                    <span>Security Details</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="masterlist.php" class="sidebar-link">
                        <i class="lni lni-user"></i>
                        <span>Attendance Record</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a href="ShiftingDuties.php" class="sidebar-link">
                        <i class="lni lni-user"></i>
                        <span> Shifting Duties</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="masterlist.php" class="sidebar-link">
                        <i class="lni lni-user"></i>
                        <span>Add Attendance</span>
                    </a>
                </li>

            <li class="sidebar-item">
                <a href="#" class="sidebar-link has-dropdown coll "data-bs-toggle="collapse" data-bs-target="#Applicant"
                aria-expanded="false" aria-controls="Applicant">
                <i></i>
                <span>Admin Settings ...</span>

                </a>
                <ul id="Applicant" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                    <li class="sidebar-item">
                        <a href="ManageUser.php" class="sidebar-link">Manage User</a>
                    </li>
                    <li class="sidebar-item">
                        <a href="#" class="sidebar-link">Change Password</a>
                    </li>
                    <li class="sidebar-item">
                        <a href="Log-out.php" class="sidebar-link">Log-out</a>
                    </li>
            </li>
        </ul>
    </div>
    
    </aside>

</div>

<nav aria-label="Page navigation example">
  <ul class="pagination">
    <li class="page-item"><a class="page-link" href="#">Previous</a></li>
    <li class="page-item"><a class="page-link" href="#">1</a></li>
    <li class="page-item"><a class="page-link" href="#">2</a></li>
    <li class="page-item"><a class="page-link" href="#">3</a></li>
    <li class="page-item"><a class="page-link" href="#">4</a></li>
    <li class="page-item"><a class="page-link" href="#">5</a></li>
    <li class="page-item"><a class="page-link" href="#">Next</a></li>
  </ul>
</nav>


<table class="SecurityTable" id="myTable">
<tr>
<th>NO.</th>
<th>Last Name</th>
<th>First Name</th>
<th>Middle Name</th>
<th>Username</th>
<th>Password</th>
<th>User Type</th>
<th>.</th>

</tr>
<?php
include "Connection/database.php";
$sql = mysqli_query($conn, "SELECT * FROM users");
while($row = mysqli_fetch_array($sql))
{
?>

<?php


?>
<tr>
<td><?php echo $id = $row['id']?></td> 
<td><?php echo $lastname = $row['lastname']?></td>
<td><?php echo $firstname = $row['firstname']?></td>
<td><?php echo $middlename =$row['middlename']?></td>
<td><?php echo $username =$row['username']?></td>
<td><?php echo $password =$row ['password']?></td>
<td><?php echo $role =$row['role']?></td>

<td>
<button class="Delete"><a href="DeleteUser.php?id=<?php echo $row['id'] ?>" >Delete</a></button>
</td>
<?php }
?>  
<?php
?>
</tr>
</table>


<div>
<button type="submit" class="addbtn" style="margin-left:87vw; width:160px;" data-bs-toggle="modal" data-bs-target="#adduserModal">
 Add User
</button>

<div class="admindash" >
<h2>MANAGE USER</h2>
</div>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="script.js"></script>
</body>
</html>