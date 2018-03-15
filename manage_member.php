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
                ?>
                <div class="col-md-12" style="text-align:center;">
                    <br/>
                        <h1>
                            เพิ่ม/แก้ไขสมาชิก
                        </h1>
                </div>
                <div class="col-md-12" style="background:#7d90ae; height:10px;">
                    &emsp;
                </div>
                <br>
                <br>
                <div class="col-md-12">
                    <center>
                        <a class="btn btn-lg button" style="background-color: #bdabd5;" href="add_member.php">เพิ่มสมาชิก</a><br>
                    </center>
                </div>
                <br>
                <br>
                <br>
                <br>

                <div class="container col-md-12">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                            <th scope="col">ลำดับ</th>
                            <th scope="col">USER</th>
                            <th scope="col">PASSWORD</th>
                            <th scope="col">ชื่อ-นามสกุล</th>
                            <th scope="col">แก้ไข</th>
                            <th scope="col">ลบ</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            $conn = connect("root",null,"thanarak");
                            mysqli_set_charset($conn, "utf8");
                            $sqls = "select * from user";
                            $query = mysqli_query($conn,$sqls);
                            while ($result = mysqli_fetch_array($query,MYSQLI_ASSOC))
                            {
                        ?>
                                <tr>
                                    <th scope="row">
                                        <?php
                                            echo $result["id_user"];
                                        ?>
                                    </th>
                                    <td>
                                        <?php
                                            echo $result["username"];
                                        ?>
                                    </td>
                                    <td>
                                        <?php
                                            echo $result["password"];
                                        ?>
                                    </td>
                                    <td>
                                        <?php
                                            echo $result["name"]." ".$result["surname"];
                                        ?>
                                    </td>
                                    <td>
                                        <a href="edit_member.php?id=<?php echo $result["id_user"]; ?>" class="btn btn-success">แก้ไข</a>
                                    </td>
                                    <td>
                                        <?php 
                                        if($result["id_user"] == "1")
                                        {
                                        ?>
                                            <button onclick="deleteMember(<?php echo $result["id_user"]; ?>);" id="delete" class="btn btn-danger" disabled>ลบ</button>
                                        <?php
                                        }
                                        else
                                        {
                                        ?>
                                            <button onclick="deleteMember(<?php echo $result["id_user"]; ?>);" id="delete" class="btn btn-danger" >ลบ</button>
                                        <?php
                                        }
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
                                                echo "<center>ไม่มีข้อมูลอยู่ในตาราง กรุณากดปุ่มเพิ่มสมาชิก เพื่อเพิ่มเข้าสู่ระบบ </center>";
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


    function deleteMember(slidekey)
    {
        swal({
            title: 'คุณแน่ใจหรือไม่?',
            text: "ว่าต้องการลบข้อมูลสมาชิกคนที่"+slidekey,
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'ตกลง',
            }).then((result) => {
            if (result.value) {
                $.ajax({
                    type: "POST",
                    url: "database/deletemember_db.php",
                    cache: false,
                    data: "id="+slidekey,
                    success: function(msg)
                    {
                        if(msg == '1')
                        {
                            swal('ลบแล้ว!','ลบสมาชิกคนที่'+slidekey+'เรียบร้อย','success')
                            .then((value) => {
                                window.location.href = 'manage_member.php';
                            });
                        }
                        else
                        {
                                swal("ผิดพลาด","มีข้อผิดพลาด Error ดังนี้ \n"+msg+"\n กรุณาติดต่อผู้ดูแลระบบเพื่อแจ้งปัญหาที่เกิดขึ้น");
                        }
                    }
                }); 
             }
            })
    }

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