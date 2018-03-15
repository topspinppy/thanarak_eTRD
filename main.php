<?php session_start(); ?>
<?php
    if(isset($_SESSION["username"]))
    {
?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <?php
                include("theme/header.php");
            ?>
            <link rel="stylesheet" href="./stylesheet/main.css">  
            <title>Document</title>
            <style>
            body 
            {
                font-family: 'Kanit', sans-serif;
            }
            </style>
        </head>
        <body>  
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                
               
                <div class="collapse navbar-collapse" id="navbarText">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="#"></span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#"></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#"></a>
                        </li>
                    </ul>
                    <span class="navbar-text">
                        <?php echo "<i class='fa fa-user'></i> USER : ". strtoupper($_SESSION["username"]); ?> | <a href="logout.php">LOGOUT</a>
                    </span>
                </div>
                </nav>
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 header-text">
                            <center><b>eTRD @ Prachinburi</b><center>
                        </div>  
                        <div class="col-md-12" style="margin-top:-20px; font-size:24px; color: #626e84;">
                            <center><h3>สำนักงานธนารักษ์จังหวัดปราจีนบุรี</h3><center>
                        </div>    
                        <div class="col-md-12" style="margin-top:-10px; font-size:24px; color: #626e84;">
                            <center><h3>กิจกรรมลดกระดาษ</h3><center>
                        </div>     
                    </div>
                    <hr>    
                    <center>
                        <a class="btn btn-lg button" style="background-color: #bdabd5;" href="manage_member.php">เพิ่ม/แก้ไข สมาชิก</a><br>

                        <a class="btn btn-lg button" style="background-color: #afc0d4;" href="manage_circular.php">เพิ่ม/แก้ไข หนังสือเวียน</a><br>

                        <a class="btn btn-lg button" style="background-color: #e2a287;" href="statistic_circular.php">สถิติการเข้าดู</a><br>
                    </center>
                    <hr> 
                </div>
        </body>
        </html>
<?php
    }
    else
    {
        echo "<script>window.location.href = 'index.php';</script>";
    }
?>