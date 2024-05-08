<?php
session_start();
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


.date{
margin-left: 20vw;
}
form {
    border: 1px solid white;
    width: 30vw;
    height: 40vw;
    box-shadow: 10px 20px 20px 10px #ff6666;
    background-color: white;
    border-radius: 30px;
}

h3 {
    text-align: center;
    margin-bottom: 40px;
}
input {
    margin-left: 100px;
    border: 2px solid black;
    margin-top: 2px;
}
label {
    margin-left: 120px;
    text-align: center;
    text-align:middle;
    margin-top: 20px;
    font-weight: bolder;
}
.timebutton{
    margin-top: 40px;
    margin-left: 100px;
    margin-right: 40px;
    border: 1px solid white;
    height: 10vw;
    padding-top: 50px;
    width: 20vw;

}
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap');

* {
    margin: 0;
    padding: 0;
    font-family: 'Poppins', sans-serif;
}

body {
    background:grey;
    background-blend-mode: multiply,multiply;
    background-attachment: fixed;
    background-repeat: no-repeat;
    background-size: cover;
    position: fixed;
    margin-top: 0%;

}

.main {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 91.5vh;
    width: 80vw;
}

.attendance-container {
    height: 70%;
    width: 90%;
    border-radius: 20px;
    padding: 40px;
    background-color: rgba(255, 255, 255, 0.8);
    margin-left: 40px;
    margin-bottom: 70px;
}

.attendance-container > div {
    box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
    border-radius: 10px;
    padding: 30px;
    margin-left: 10px;
}

.attendance-container > div:last-child {
    width: 64%;
    margin-left: auto;
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


<div class="date">
<?php 
date_default_timezone_set("asia/manila");
$time = date("h:i A",strtotime("+0 HOURS"));
$date = date("M-d-Y");

?>
<strong style="font-size: 1.6em; color:red;"><?php echo  $date;?>&nbsp;&nbsp;<font style="grey;">|</font>&nbsp;&nbsp; <span style="color:red;font-size: 1em;" id="tick2" class="timeh1"></strong>
<br>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QR Code Attendance System</title>

   

    <style>
       
    </style>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand ml-4" href="#">QR Code Attendance System</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
             
    </ul>
        </div>
    </nav>

    <div class="main">
        
        <div class="attendance-container row">
            <div class="qr-container col-4">
                <div class="scanner-con">
                    <h5 class="text-center">Scan you QR Code here for your attedance</h5>
                    <video id="interactive" class="viewport" width="100%">
                </div>

                <div class="qr-detected-container" style="display: none;">
                    <form action="add-attendance.php" method="POST">
                        <h4 class="text-center">Student QR Detected!</h4>
                        <input type="hidden" id="detected-qr-code" name="qr_code">
                        <button type="submit" class="btn btn-dark form-control">Submit Attendance</button>
                    </form>
                </div>
            </div>


                </div>
            </div>
        
        

    </div>
    
    

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js"></script>

    <!-- instascan Js -->
    <script src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>

    <script>

        
        let scanner;

        function startScanner() {
            scanner = new Instascan.Scanner({ video: document.getElementById('interactive') });

            scanner.addListener('scan', function (content) {
                $("#detected-qr-code").val(content);
                console.log(content);
                scanner.stop();
                document.querySelector(".qr-detected-container").style.display = '';
                document.querySelector(".scanner-con").style.display = 'none';
            });

            Instascan.Camera.getCameras()
                .then(function (cameras) {
                    if (cameras.length > 0) {
                        scanner.start(cameras[0]);
                    } else {
                        console.error('No cameras found.');
                        alert('No cameras found.');
                    }
                })
                .catch(function (err) {
                    console.error('Camera access error:', err);
                    alert('Camera access error: ' + err);
                });
        }

        document.addEventListener('DOMContentLoaded', startScanner);

        function deleteAttendance(id) {
            if (confirm("Do you want to remove this attendance?")) {
                window.location = "../endpoint/add-attendance.php?attendance=" + id;
            }
        }
    </script>

<script>
   // <!--/. tells about the time  -->
                 function show2(){
                 if (!document.all&&!document.getElementById)
                 return
                 thelement=document.getElementById? document.getElementById("tick2"): document.all.tick2
                 var Digital=new Date()
                 var hours=Digital.getHours()
                 var minutes=Digital.getMinutes()
                 var seconds=Digital.getSeconds()
                 var dn="PM"
                 if (hours<12)
                 dn="AM"
                 if (hours>12)
                 hours=hours-12
                 if (hours==0)
                 hours=12
                 if (minutes<=9)
                 minutes="0"+minutes
                 if (seconds<=9)
                 seconds="0"+seconds
                 var ctime=hours+":"+minutes+":"+seconds+" "+dn
                 thelement.innerHTML=ctime
                 setTimeout("show2()",1000)
                 }
                 window.onload=show2
         //-->
          
           
</script> <!--/. Script where the format of the interface time,month,day and year relies -->
<script type="text/javascript">
   $("#id").unbind('click').on("click", function () {
   
          uservalidate();
          passvalidate();
   
         if (uservalidate() === true
          && passvalidate() === true
   
          ) {
   
   };
   
   
   });
   
   
   function uservalidate() {
   if ($('#val1').val() == '') { 
    $('#val1').css('border-color', '#dc3545');
    return false;
     } else {
      $('#val1').css('border-color', '#28a745'); 
       return true;
   }
   
   };
   
   function passvalidate() {
   if ($('#val5').val() == '') { 
    $('#val5').css('border-color', '#dc3545');
    return false;
     } else {
      $('#val5').css('border-color', '#28a745'); 
       return true;
   }
   
   };
   
   
</script>
<script type="text/javascript">
   $(document).ready (function(){
               $("#success-alerts").fadeOut(15000);

               $("#id").unbind('click').on("click", function () {
                   $("#success-alerts").fadeTo(1000, 0).slideUp(5000, function(){
                    //$(this).remove();
                   });   
               }, 5000);
   
               $("#success-alert").fadeOut(15000);
               $("#id").unbind('click').on("click", function () {
                   $("#success-alert").fadeTo(1000, 0).slideUp(5000, function(){
                  // $(this).remove();
                   });   
               }, 5000);
    });
   
</script>
<script type="text/javascript">
   $(document).ready (function(){
               $("#danger-alert").fadeOut(15000);
               $("#id").unbind('click').on("click", function () {
                   $("#danger-alert").fadeTo(1000, 0).slideUp(5000, function(){
                    //$(this).remove();
                   });   
               }, 5000);
   
               $("#danger-alerts").fadeOut(15000);
               $("#id").unbind('click').on("click", function () {
                   $("#danger-alerts").fadeTo(1000, 0).slideUp(5000, function(){
                  // $(this).remove();
                   });   
               }, 5000);
    });
   
</script>
</body>
</html>

</body>
</html>