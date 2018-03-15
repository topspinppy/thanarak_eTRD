<!DOCTYPE html>
<html lang="en">
<head>
    <?php
        include("theme/header.php");
    ?>
    <link rel="stylesheet" href="./stylesheet/style.css">  
    <title>Document</title>
    <style>
    body 
    {
        font-family: 'Kanit', sans-serif;
    }
    </style>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-2">
                <img class="logo" src="img/thanarak.gif" width="130px" height="130px" ;alt="สำนักงานธนารักษ์จังหวัดปราจีนบุรี" style="margin: 20px;">
            </div>
            
            <div class="col-md-10 header">
                    <b>eTRD @ Prachinburi</b><br><h5>สำนักงานธนารักษ์จังหวัดปราจีนบุรี</h5>
            </div>  
        </div>
        <hr style="margin-top:0rem;">
        <div class="row">
            <div class="col-md-6 fixed">
                <div class="welcome">
                    <div class="txt-welcome">
                        โครงการประหยัดกระดาษ
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="userwelcome">
                    User Login
                </div>
                <form method="post" id="login-form">
                    <div class="login">
                        <div class="form">
                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="fa fa-user-circle"></i>
                                            </div>
                                        </div>
                                        <input type="text" name="username" class="form-control" id="username" placeholder="Username">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="fa fa-lock"  style="font-size:24px"></i>
                                            </div>
                                        </div>
                                        <input type="password" name="password" class="form-control" id="password" placeholder="Password">
                                    </div>
                                </div>
                            </div>
                            <div class="col-auto">
                                <div class="form-check mb-2">
                                    <input class="form-check-input" type="checkbox" id="autoSizingCheck">
                                    <label class="form-check-label" for="autoSizingCheck">
                                    Remember me
                                    </label>
                                </div>
                            </div>
                        </div>  
                        <div class="edge-bottom">&emsp;</div>
                    </div>
                    <div>
                        <button type="submit" onClick="submitForm()" class="btn"><h2>Login</h2></button>
                    </div>
                </form>
            </div>
            
        </div>
        <br>
        <center><h4>ประหยัดกระดาษภายใต้ 3Rs รักษาต้นไม้ ให้ยั่งยืน<h4></center>
        <hr>
    </div>  
</body>
<script>
	   function submitForm()
	   {
			var data = $("#login-form").serialize();
			$.ajax({

    			type : 'POST',
    			url  : 'check_login.php',
                data : data,
    			beforeSend: function()
    			{
    				   $("body").fadeOut();
    			       $("body").html('<span class="glyphicon glyphicon-transfer"></span> &nbsp; กำลังเข้าสู่ระบบ ...');
    			},
    			success :  function(response)
    			{
                    if(response.trim()=="1")
                    {
                        setTimeout(' window.location.href = "main.php"; ',1000);
                    }
                    else if(response.trim()=="0")
                    {
                        setTimeout(' window.location.href = "index.php"; alert("รหัสผ่านหรือชื่อผู้ใช้ไม่ถูกต้อง กรุณาเข้าใหม่อีกครั้ง") ',1000);
                        
                    }
    			 }
		   });
				return false;
		}

</script>
</html>