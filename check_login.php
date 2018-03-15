<?php
    session_start ();
    include("database/connect.php");

    $username = $_POST["username"];
    $password = $_POST["password"]; 

    $conn = connect("root",null,"thanarak");
    mysqli_set_charset($conn, "utf8");
    $sqls = "select * from user where username = '$username' AND password = '$password'";
    $query = mysqli_query($conn,$sqls);
    $result = mysqli_fetch_array($query,MYSQLI_ASSOC);
    echo mysqli_error($conn);
    if($result["type_member"] == "ผู้ดูแลระบบ")
    {
        $_SESSION["username"] = $username;
        echo "1";
    }
    else
    {
        echo "0";
    }



    
?>