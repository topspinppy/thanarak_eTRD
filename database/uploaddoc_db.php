<?php session_start(); ?>
<?php
    include("connect.php");
?>

<?php
    $user = $_SESSION["username"];
    $upload = $_FILES["file"]["name"];
    $name = $_POST["input_document_name"];

    $info = substr( $upload , strpos( $upload , '.' )+1 ) ;

    if($info=="pdf")
    {
        if(move_uploaded_file($_FILES["file"]["tmp_name"],"../docs/".$upload))
        {
            //*** Insert Record ***//
            $conn = connect("root",null,"thanarak");
            mysqli_set_charset($conn, "utf8");
            $sqls = "INSERT INTO circular VALUES (null,'$name','docs/$upload','".date('Y-m-d H:i:s')."','$user','0')";
            $objQuery = mysqli_query($conn,$sqls);	
            echo "0";
        }
    }
    else
    {
        echo "1";
    }

?>