<?php
    include("connect.php");
?>
<?php
    $name = $_POST["name"];
    $surname = $_POST["surname"];
    $department = $_POST["department"];
    $username = $_POST["username"];
    $password = $_POST["password"];
    $typemember = $_POST["typemember"];
    $conn = connect("root",null,"thanarak");
    mysqli_set_charset($conn, "utf8");

    $autoint = "ALTER TABLE user AUTO_INCREMENT = 1";
    $query2 = mysqli_query($conn,$autoint);
    
    $sqls = "INSERT INTO user VALUES (null,'$name','$surname','$username','$password','$department','$typemember')";
    $query = mysqli_query($conn,$sqls);


    if($query && $query2)
    {
        echo "1";
    }
    else
    {
        echo "Error ของคุณคือ : ".mysqli_error($conn);
    }

?>