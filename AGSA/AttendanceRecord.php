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
        letter-spacing: 10px;
    }
    .attendance-list{
        width: 80vw;
        margin-left: 20vw;
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
                    <a href="ShiftingDuties.php" class="sidebar-link">
                        <i class="lni lni-user"></i>
                        <span> Shifting Duties</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="masterlist.php" class="sidebar-link">
                        <i class="lni lni-user"></i>
                        <span>Add Attendace</span>
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

</div>
<div class="admindash" >
<h2>ATTENDANCE RECORD</h2>
</div>

            <div class="attendance-list">
                <div class="table-container table-responsive">
                    <table class="table text-center table-sm" id="attendanceTable">
                        <thead class="thead-dark">
                            <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Deploy Location</th>
                            <th scope="col">Time In</th>
                            </tr>
                        </thead>
                        <tbody>
    
    <?php 
                            $servername = "localhost";
                            $username = "root";
                            $password = "";
                            $dbname = "qr_attendance_db";
                            
                            try {
                                $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                            } catch(PDOException $e) {
                                echo "Connection failed: " . $e->getMessage();
                            }
                          
                              

                                $stmt = $conn->prepare("SELECT * FROM tbl_attendance LEFT JOIN tbl_student ON tbl_student.tbl_student_id = tbl_attendance.tbl_student_id" );
                                $stmt->execute();
                
                                $result = $stmt->fetchAll();
                
                                foreach ($result as $row) {
                                    $attendanceID = $row["tbl_attendance_id"];
                                    $studentName = $row["student_name"];
                                    $studentCourse = $row["course_section"];
                                    $timeIn = $row["time_in"];
                                ?>

                                <tr>
                                    <th scope="row"><?= $attendanceID ?></th>
                                    <td><?= $studentName ?></td>
                                    <td><?= $studentCourse ?></td>
                                    <td><?= $timeIn ?></td>
                                   
                                </tr>

                                <?php
                            }
                            ?>
                        
                    </table>


<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="script.js"></script>
</body>
</html>