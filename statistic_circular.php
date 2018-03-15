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
        include("database/connect.php");

    ?>
    
    <link rel="stylesheet" href="./stylesheet/manage_member.css">  
    <style>
    .input-file 
    { 
        visibility: hidden; 
        position: absolute;
    }
    h4 { margin-top: 30px;}
    </style>
    <title>Document</title>
</head>
<body>
    <div>
    <?php
        include("theme/navigation.php");
    ?>
        <div class="container">
            <div class="row">
                <?php
                    include("theme/header_after_login.php");
                    $conn = connect("root",null,"thanarak");
                ?>
                <div class="col-md-12" style="text-align:center;">
                    <br/>
                        <h1>
                            สถิติการเข้าดู
                        </h1>
                </div>

                    <div class="col-md-12" style="background:#7d90ae; height:46px;">
                        <div class="col-md-2" style="margin:auto; margin-top:9px;">
                            <form action="statistic_circular.php" name="formName" method="post"> 
                                <select name="month" onChange = "document.formName.submit();">
                                    <option value="">กรุณาเลือกเดือน</option>
                                    <option value="01">มกราคม</option>
                                    <option value="02">กุมภาพันธ์</option>
                                    <option value="03">มีนาคม</option>
                                    <option value="04">เมษายน</option>
                                    <option value="05">พฤษภาคม</option>
                                    <option value="06">มิถุนายน</option>
                                    <option value="07">กรกฎาคม</option>
                                    <option value="08">สิงหาคม</option>
                                    <option value="09">กันยายน</option>
                                    <option value="10">ตุลาคม</option>
                                    <option value="11">พฤศจิกายน</option>
                                    <option value="12">ธันวาคม</option>
                                </select>
                            </form>
                        </div>
                    </div>
                    <br>
                <br>
                <br>

                <div class="container col-md-12">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                            <th scope="col">รหัส</th>
                            <th scope="col">ชื่อเรื่อง</th>
                            <th scope="col">วันที่อัพโหลด</th>
                            <th scope="col">จำนวนการเข้าชม (ครั้ง) </th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            mysqli_set_charset($conn, "utf8");
                            $month = @$_POST['month'];
                            $sqls = (isset($month) ? "select * from circular where date_circular LIKE '_____$month%'" : "select * from circular");
                            $query = mysqli_query($conn,$sqls);
                            while ($result = mysqli_fetch_array($query,MYSQLI_ASSOC))
                            {
                        ?>
                                <tr>
                                    <th scope="row">
                                        <?php
                                            echo $result["id_circular"];
                                        ?>
                                    </th>
                                    <td>
                                        <?php
                                            $file = $result["path_file_circular"];
                                            $returnValue = substr($result["name_circular"], 0, 170);
                                            echo "<a href='$file'>".$returnValue."....</a>";
                                        ?>
                                    </td>
                                    <td>
                                        <?php
                                            echo $result["date_circular"];
                                        ?>
                                    </td>
                                    <td>
                                        <?php
                                            echo $result["count_click"];
                                        ?>
                                    </td>
                                </tr>

                        <?php
                            }
                        ?>
                                <?php
                                $rowcount = mysqli_num_rows($query);
                                if($rowcount == "0")
                                {  
                                ?>
                                    <tr>
                                        <td colspan='6'>
                                        <?php
                                                echo "<center>ไม่มีเอกสารในเดือนนี้ </center>";
                                        ?>
                                        </td>
                                    </tr>
                                <?php
                                }
                                ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div> 
    </div>
    <script>
    </script>
</body>
</html>
<?php
    }
    else
    {
        echo "<script>window.location.href = 'index.php';</script>";
    }
?>