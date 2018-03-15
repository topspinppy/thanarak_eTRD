

<?php
    include("connect.php");
    $id = $_POST["id"];
    $path = $_POST["path"];
    $conn = connect("root",null,"thanarak");
    mysqli_set_charset($conn, "utf8");

    $sql = "DELETE FROM circular
			WHERE id_circular = '".$id."' ";

	$query = mysqli_query($conn,$sql);

	if(mysqli_affected_rows($conn) && @unlink("../".$path)) {
		 echo "1";
    }
    else
    {
         echo "ไฟล์นี้ถูกลบออกจากระบบแล้วโดยที่ยังไม่ได้ลบออกจากฐานข้อมูล ระบบจะทำการลบข้อมูลออกจากฐานข้อมูลให้อัตโนมัติ";
    }

	mysqli_close($conn);
?>