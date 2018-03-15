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
        <div class="container">
            <div class="row">
                <?php
                    include("theme/header_after_login.php");
                    $id = $_GET["id"];
                ?>
                <?php
                if($id == "1")
                {
                ?>
                    <div class="col-md-12" style="text-align:center;">
                        <br/>
                            <h1>
                                เพิ่ม/แก้ไขสมาชิก
                            </h1>
                    </div>
                    <?php
                        $conn = connect("root",null,"thanarak");
                        mysqli_set_charset($conn, "utf8");
                        $sqls = "select * from user where id_user =".$id;
                        $query = mysqli_query($conn,$sqls);
                        $result = mysqli_fetch_array($query,MYSQLI_ASSOC);
                    ?>
                    <div class="col-md-12">
                        <div class="col-md-6 formstyles" style="background: #7d90ae; margin: auto; margin-top: 35px; height: auto;">
                            <div style="padding:20px;">
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">ชื่อ</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="name" value="<?php echo $result["name"]; ?>" placeholder="กรุณากรอกชื่อ" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputPassword3" class="col-sm-2 col-form-label">นามสกุล</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="surname" value="<?php echo $result["surname"]; ?>" placeholder="กรุณากรอกนามสกุล" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputUsername" class="col-sm-2 col-form-label">ฝ่าย</label>
                                    <div class="col-sm-10">
                                        <select class="custom-select mr-sm-2" id="department" required>
                                            <option>เลือก</option>
                                            <option value="1" <?php if($result["id_department"] == "1") { echo "selected"; } ?>>One</option>
                                            <option value="2" <?php if($result["id_department"] == "2") { echo "selected"; } ?>>Two</option>
                                            <option value="3" <?php if($result["id_department"] == "3") { echo "selected"; } ?>>Three</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputUsername" class="col-sm-2 col-form-label">Username</label>
                                    <div class="col-sm-10">
                                         <a href="" data-toggle="tooltip" data-placement="top" title="ไม่อนุญาตให้แก้ไข ROOT ของระบบ!">
                                            <input type="text" class="form-control" id="username" value="<?php echo $result["username"]; ?>" placeholder="กรุณากรอก Username" disabled>
                                        </a>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
                                    <div class="col-sm-10">
                                        <input type="password" class="form-control" id="password" value="<?php echo $result["password"]; ?>"  placeholder="กรุณากรอก Password" required>
                                    </div>
                                </div>
                                <fieldset class="form-group">
                                    <div class="row">
                                    <legend class="col-form-label col-sm-2 pt-0">ประเภทสมาชิก</legend>
                                    <div class="col-sm-10">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="typemember" id="typemember" value="ผู้ดูแลระบบ" <?php if($result["type_member"]=="ผู้ดูแลระบบ"){ echo "checked"; }?>>
                                            <label class="form-check-label" for="gridRadios1">
                                                ผู้ดูแลระบบ
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="typemember" id="typemember" value="สมาชิก" <?php if($result["type_member"]=="สมาชิก"){ echo "checked"; }?> disabled>
                                            <label class="form-check-label" for="gridRadios2">
                                                สมาชิก
                                            </label>
                                        </div>
                                    </div>
                                    </div>
                                </fieldset>
                                <div class="form-group row">
                                    <div class="col-sm-12">
                                        <center>
                                            <button type="submit" id="submit" class="btn btn-primary">เสร็จสิ้น</button>
                                        </center>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php
                }
                else
                {
                ?>
                    <div class="col-md-12" style="text-align:center;">
                        <br/>
                            <h1>
                                เพิ่ม/แก้ไขสมาชิก
                            </h1>
                    </div>
                    <?php
                        $conn = connect("root",null,"thanarak");
                        mysqli_set_charset($conn, "utf8");
                        $sqls = "select * from user where id_user =".$id;
                        $query = mysqli_query($conn,$sqls);
                        $result = mysqli_fetch_array($query,MYSQLI_ASSOC);
                    ?>
                    <div class="col-md-12">
                        <div class="col-md-6 formstyles" style="background: #7d90ae; margin: auto; margin-top: 35px; height: auto;">
                            <div style="padding:20px;">
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">ชื่อ</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="name" value="<?php echo $result["name"]; ?>" placeholder="กรุณากรอกชื่อ" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputPassword3" class="col-sm-2 col-form-label">นามสกุล</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="surname" value="<?php echo $result["surname"]; ?>" placeholder="กรุณากรอกนามสกุล" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputUsername" class="col-sm-2 col-form-label">ฝ่าย</label>
                                    <div class="col-sm-10">
                                        <select class="custom-select mr-sm-2" id="department" required>
                                            <option>เลือก</option>
                                            <option value="1" <?php if($result["id_department"] == "1") { echo "selected"; } ?>>One</option>
                                            <option value="2" <?php if($result["id_department"] == "2") { echo "selected"; } ?>>Two</option>
                                            <option value="3" <?php if($result["id_department"] == "3") { echo "selected"; } ?>>Three</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputUsername" class="col-sm-2 col-form-label">Username</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="username" value="<?php echo $result["username"]; ?>" placeholder="กรุณากรอก Username" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
                                    <div class="col-sm-10">
                                        <input type="password" class="form-control" id="password" value="<?php echo $result["password"]; ?>"  placeholder="กรุณากรอก Password" required>
                                    </div>
                                </div>
                                <fieldset class="form-group">
                                    <div class="row">
                                    <legend class="col-form-label col-sm-2 pt-0">ประเภทสมาชิก</legend>
                                    <div class="col-sm-10">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="typemember" id="typemember" value="ผู้ดูแลระบบ" <?php if($result["type_member"]=="ผู้ดูแลระบบ"){ echo "checked"; }?>>
                                            <label class="form-check-label" for="gridRadios1">
                                                ผู้ดูแลระบบ
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="typemember" id="typemember" value="สมาชิก" <?php if($result["type_member"]=="สมาชิก"){ echo "checked"; }?> >
                                            <label class="form-check-label" for="gridRadios2">
                                                สมาชิก
                                            </label>
                                        </div>
                                    </div>
                                    </div>
                                </fieldset>
                                <div class="form-group row">
                                    <div class="col-sm-12">
                                        <center>
                                            <button type="submit" id="submit" class="btn btn-primary">เสร็จสิ้น</button>
                                        </center>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php    
                }
                ?>
            </div>
        </div>
                
    </div>
    <script>
            $('[data-toggle="tooltip"]').tooltip();   
            $("button").click(function(){
                var name = $("#name").val();
                var surname = $("#surname").val();
                var department = $("#department").val();
                var username = $("#username").val();
                var password = $("#password").val();
                var typemember = $('input[name=typemember]:checked').val();
				$.ajax({
				   type: "POST",
				   url: "database/updatemember_db.php",
				   cache: false,
				   data: "name="+name+"&surname="+surname+"&department="+department+"&username="+username+"&password="+password+"&id="+<?php echo $id?>+"&typemember="+typemember,
				   success: function(msg)
                   {
                       if(msg == '1')
                       {
                            swal("อัพเดทข้อมูลสมาชิกเรียบร้อยแล้ว")
                            .then((value) => {
                                window.location.href = 'manage_member.php';
                            });
                       }
                       else
                       {
                            swal("มีข้อผิดพลาด Error ดังนี้ \n"+msg+"\n กรุณาติดต่อผู้ดูแลระบบเพื่อแจ้งปัญหาที่เกิดขึ้น");
                       }
				   }
				 });

            });
    </script>

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

</body>
</html>
<?php
    }
    else
    {
        echo "<script>window.location.href = 'index.php';</script>";
    }
?>