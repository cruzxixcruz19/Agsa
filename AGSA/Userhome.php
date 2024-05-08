<?php
session_start();
include "Connection/database.php"
?>

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
    .admindashboard, h2 {
        color: white;
        background-color: transparent;
        margin-left: 10px;
        margin-left: 22vw;
        margin-top: 10px;
        font-weight: bolder;
        letter-spacing: 5px;
    }
    .card {
        width: 200px;
        height: 200px;
        margin-left: 25vw;
        text-align: center;
        font-size: 50px;
        font-weight: bolder;
        color:black;
        margin-top: 30px;
        border-radius: 20px;
    }
    .card h1{
        text-align: center;
        font-size: 20px;
        font-weight: bolder;
        color: black;
    }

</style>
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
                    <a href="Userhome.php" class="sidebar-link">
                    <i class="lni lni-user"></i>
                    <span>PROFILE</span>
                    </a>
                </li>
    
                <li class="sidebar-item">
                    <a href="UserAttendance.php" class="sidebar-link">
                        <i class="lni lni-user"></i>
                        <span>ATTENDANCE</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="#" class="sidebar-link">
                        <i class="lni lni-user"></i>
                        <span> DUTIES </span>
                    </a>
                </li>
            

            <li class="sidebar-item">
                <a href="#" class="sidebar-link has-dropdown coll "data-bs-toggle="collapse" data-bs-target="#Applicant"
                aria-expanded="false" aria-controls="Applicant">
                <i></i>
                <span>Settings...</span>

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

</div>
<div class="admindash" >
<h2>USER DASHBOARD </h2>
</div>
<div class="card">
<?php  require "Connection/database.php"; echo $conn->query("SELECT * FROM security")->num_rows; ?>
<h1>TOTAL SECURITY PERSONELS</h1>
<svg xmlns="http://www.w3.org/2000/svg"  width="100" height="100" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
  <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6m2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0m4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4m-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10s-3.516.68-4.168 1.332c-.678.678-.83 1.418-.832 1.664z"/>
</svg>


</div>

<div class="card">
<?php  require "Connection/database.php"; echo $conn->query("SELECT * FROM users")->num_rows; ?>
<h1>TOTAL USER</h1>
<svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" fill="currentColor" class="bi bi-people-fill" viewBox="0 0 16 16">
<path d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6m-5.784 6A2.24 2.24 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.3 6.3 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1zM4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5"/>
</svg>
</div>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="script.js"></script>
</body>
</html>