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
                ?>
                <div class="col-md-12" style="text-align:center;">
                    <br/>
                        <h1>
                            เพิ่ม/แก้ไขหนังสือเวียน
                        </h1>
                </div>
                <div class="col-md-12" style="background:#7d90ae; height:10px;">
                    &emsp;
                </div>
                <br>
                <br>
                <form class="col-md-12" enctype="multipart/form-data" id="formadddocument" name="formadddocument">
                    <div class="col-md-12">
                        <center>
                            <div class="col-md-6">
                                <center>
                                    <input type="file" name="file" id="file" class="input-file">
                                    <div class="input-group form-group-lg col-xs-12">
                                        <input type="text" class="form-control" disabled placeholder="เลือกเอกสารที่ต้องการอัพโหลด" style="margin-left: 10px;">
                                        <span class="input-group-btn">
                                            <button class="upload-field btn" style="background:#7d90ae; margin-right:-23px;" type="button"><i class="fa fa-search"></i> <b>เลือกเอกสาร</b></button>
                                        </span>
                                    </div>
                                </center>
                            </div>
                        </center>
                    </div>
                    <div class="col-md-12" style="margin-top:20px;">
                        <center>
                            <div class="col-md-6">
                                <center>
                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-2 col-form-label">ชื่อเรื่อง</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" name="input_document_name" id="input_document_name" placeholder="ชือเอกสาร" style="position:left;" required oninvalid="this.setCustomValidity('กรุณากรอกชื่อไฟล์ก่อนอัพโหลด')"
    oninput="setCustomValidity('')">
                                        </div>
                                        <div class="col-sm-2" style="margin-left:-4px;">
                                            <button type="submit" id="submit_document" class=" btn" style="background:#7d90ae">เพิ่มเอกสาร</button>
                                        </div>
                                    </div>
                                </center>
                            </div>
                        </center>
                    </div>
                </form>
                <br>
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
                            <th scope="col">ลบ</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            $conn = connect("root",null,"thanarak");
                            mysqli_set_charset($conn, "utf8");
                            $sqls = "select * from circular";
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
                                        <button onclick="deletecircular('<?php echo $result["path_file_circular"]; ?>','<?php echo $result["id_circular"]; ?>');" id="delete" class="btn btn-danger">ลบ</button>
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

    $(document).on('click', '.upload-field', function(){
        var file = $(this).parent().parent().parent().find('.input-file');
        file.trigger('click');
    });
    $(document).on('change', '.input-file', function(){
        $(this).parent().find('.form-control').val($(this).val().replace(/C:\\fakepath\\/i, ''));
    });

    $('#formadddocument').submit(function(evt) {
        evt.preventDefault();
		var formData = new FormData($(this)[0]);
        $.ajax({
				        async: false,
						url: 'database/uploaddoc_db.php',
						type: 'POST',
						data: formData,
						cache: false,
						contentType: false,
						processData: false,
						success :  function(response)
						{
                            if (response.trim()=="0")
                            {
                                swal('สำเร็จแล้ว!','อัพโหลดไฟล์สำเร็จ','success')
                                .then((value) => {
                                    window.location.href = 'manage_circular.php';
                                });
                            }
                            else if (response.trim()=="1" || response.trim()=="error")
                            {
                                swal('อัพโหลดไม่สำเร็จ!',response,'error')
                                .then((value) => {
                                    window.location.href = 'manage_circular.php';
                                });
                            }
						 }
			});
    });

    function deletecircular (path,circular)
    {
        swal({
            title: 'คุณแน่ใจหรือไม่?',
            text: "ว่าต้องการลบไฟล์ดังกล่าว",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'ตกลง',
            }).then((result) => {
                if (result.value) {    

                    $.ajax({
                            type: "POST",
                            url: "database/deletedoc_db.php",
                            cache: false,
                            data: "id="+circular+"&path="+path,
                            success: function(msg)
                            {
                                if(msg.trim() == '1')
                                {
                                        swal("ลบข้อมูลเรียบร้อย")
                                        .then((value) => {
                                            window.location.href = 'manage_circular.php';
                                        });
                                }
                                else
                                {
                                        swal("มีข้อผิดพลาด Error ดังนี้ \n",msg)
                                        .then((value) => {
                                            window.location.href = 'manage_circular.php';
                                        });
                                }
                            }
                    });
                }
            });

        
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