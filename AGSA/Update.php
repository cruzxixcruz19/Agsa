<!--<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="npm i bootstrap-icons"></script>
    <link rel="stylesheet" href="css/sty.css">
    <title>AGSA AGENCY</title>

</head>
<body>
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
                    <a href="AttendanceRecord.php" class="sidebar-link">
                        <i class="lni lni-user"></i>
                        <span>Attendance Record</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="AttendanceMonitoring.php" class="sidebar-link">
                        <i class="lni lni-user"></i>
                        <span> Attendance Monitoring</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="ShiftingDuties.php" class="sidebar-link">
                        <i class="lni lni-user"></i>
                        <span> Shifting Duties</span>
                    </a>
                </li>


            <li class="sidebar-item">
                <a href="#" class="sidebar-link has-dropdown coll "data-bs-toggle="collapse" data-bs-target="#Applicant"
                aria-expanded="false" aria-controls="Applicant">
                <i></i>
                <span>Admin Settings</span>

                </a>
                <ul id="Applicant" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
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
    <?php 
include "Connection/database.php";
$id = $_GET["id"];
$sql = "SELECT * FROM security WHERE id='$id'";
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_assoc($result);
$lastname = $row["lastname"];
$firstname = $row["firstname"];
$middlename = $row["middlename"];
$gender = $row["gender"];
$datebirth = $row["datebirth"];
$address = $row["address"];
$phone = $row["phone"];
$deployaddress = $row["deployaddress"];
$role = $row["role"];


if(isset($_POST["submit"])) {
$lastname = $_POST["lastname"];
$firstname = $_POST["firstname"];
$middlename = $_POST["middlename"];
$gender = $_POST["gender"];
$datebirth = $_POST["datebirth"];
$address = $_POST["address"];
$phone = $_POST["phone"];
$deployaddress = $_POST["deployaddress"];
$role = $_POST["role"];


$sql = "UPDATE FROM security set id='$id', lastname='$lastname', firstname='$firstname',
middlename='$middlename', gender='$gender', datebirth='$datebirth', address='$address',
 phone='$phone', deployaddress='$deployaddress', role='$role' WHERE id=$id"; 
$result = mysqli_query($conn,$sql);
if($result){
 echo "Update Successfully";
 header("Location: SecurityDetails.php");
}
else{
die("Something Went Wrong");
}
}
?>

</div>
<form action=""  method="get">
      <td>
<label>Last Name:</label> <br>
<input type="text" name="lastname" value=<?php echo $lastname ?> >
</td> <br> <br>
<td>
<label>First Name:</label> <br>
<input type="text" name="firstname" value=<?php echo $firstname ?> >
</td> <br> <br>
<td>
<label>Middle Name:</label> <br>
<input type="text" name="middlename" value=<?php echo $middlename ?>>
</td> <br> <br>
<td>
<label>Gender:</label> <br>
<input type="radio" name="gender" value=<?php echo $gender ?>>Male
<input type="radio" name="gender" value=<?php echo $gender ?>>Female
</td> <br> <br>
<td>
<label>Date Birth:</label> <br>
<input type="date" name="datebirth" value=<?php echo $datebirth ?>>
</td> <br> <br>
<td>
<label>Address:</label> <br>
<input type="text" name="address" value=<?php echo $address ?>>
</td> <br> <br>
<td>
<label>Phone:</label> <br>
<input type="text" name="phone" value=<?php echo $phone ?>>
<br>
<label>Deploy Address:</label> <br>
<input type="text" name="deployaddress" value=<?php echo $deployaddress ?>>
</td> <br> <br>
<td>
</td> <br> <br>
<td>
<label>Role:</label>
<select id="role"  name="role" required>
    <option value="">--- Choose Role ---</option>
    <option value=<?php echo $role ?>>Personal Security</option>
    <option value=<?php echo $role ?>>Branch Security</option>  
</select>
</td> <br> <br>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
<div class="Reg">
<input type="submit" class="btn btn-success" name="submit" value="Update">
</div>
</div>
</form>
     </div>

  </div>




<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="script.js"></script>
</body>
</html>