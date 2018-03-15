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
                ?>
                <div class="col-md-12" style="text-align:center;">
                    <br/>
                        <h1>
                            เพิ่ม/แก้ไขสมาชิก
                        </h1>
                </div>
                <div class="col-md-12">
                    <div class="col-md-6 formstyles" style="background: #7d90ae; margin: auto; margin-top: 35px; height: auto;">
                        <div style="padding:20px;">
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">ชื่อ</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="name" placeholder="กรุณากรอกชื่อ" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputPassword3" class="col-sm-2 col-form-label">นามสกุล</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="surname" placeholder="กรุณากรอกนามสกุล" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputUsername" class="col-sm-2 col-form-label">ฝ่าย</label>
                                <div class="col-sm-10">
                                    <select class="custom-select mr-sm-2" id="department" required>
                                        <option selected>เลือก</option>
                                        <option value="1">One</option>
                                        <option value="2">Two</option>
                                        <option value="3">Three</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputUsername" class="col-sm-2 col-form-label">Username</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="username" placeholder="กรุณากรอก Username" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
                                <div class="col-sm-10">
                                    <input type="password" class="form-control" id="password" placeholder="กรุณากรอก Password" required>
                                </div>
                            </div>
                            <fieldset class="form-group">
                                <div class="row">
                                <legend class="col-form-label col-sm-2 pt-0">ประเภทสมาชิก</legend>
                                <div class="col-sm-10">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="typemember" id="typemember" value="ผู้ดูแลระบบ">
                                        <label class="form-check-label" for="gridRadios1">
                                            ผู้ดูแลระบบ
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="typemember" id="typemember" value="สมาชิก">
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
            </div>
        </div>
                
    </div>
    <script>
            const isEmptyValue = (value) => {
                if (value === '' || value === null || value === undefined) {
                    return true
                } else {
                    return false
                }
            }
            $("button").click(function(){
                var name = $("#name").val();
                var surname = $("#surname").val();
                var department = $("#department").val();
                var username = $("#username").val();
                var password = $("#password").val();
                var typemember = $('input[name=typemember]:checked').val();
                if(!isEmptyValue(name) && !isEmptyValue(surname) && !isEmptyValue(department) && !isEmptyValue(username) && !isEmptyValue(password) && !isEmptyValue(typemember))
                {
                    $.ajax({
                    type: "POST",
                    url: "database/insertmember_db.php",
                    cache: false,
                    data: "name="+name+"&surname="+surname+"&department="+department+"&username="+username+"&password="+password+"&typemember="+typemember,
                    success: function(msg)
                    {
                        if(msg == '1')
                        {
                                swal("บันทึกข้อมูลสำเร็จ")
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
                }
                else
                {
                    var error = '';
                    if(isEmptyValue(name))
                    {
                        error += '[ชื่อ] ยังเป็นค่าว่าง \n';
                    }
                    if(isEmptyValue(surname))
                    {
                        error += '[นามสกุล] ยังเป็นค่าว่าง \n';
                    }
                    if(isEmptyValue(department))
                    {
                        error += '[ฝ่าย] ยังเป็นค่าว่าง \n';
                    }
                    if(isEmptyValue(username))
                    {
                        error += '[ชื่อผู้ใช้] ยังเป็นค่าว่าง \n';
                    }
                    if(isEmptyValue(password))
                    {
                        error += '[รหัสผ่าน] ยังเป็นค่าว่าง';
                    }
                    if(isEmptyValue(typemember))
                    {
                        error += '[สมาชิก] ยังเป็นค่าว่าง';
                    }
                    swal("Oops!","คุณกรอกข้อมูลไม่ครบ สิ่งที่คุณกรอกไม่ครบประกอบไปด้วย \n"+error ,"error");
                }
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