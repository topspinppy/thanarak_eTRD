<?php
    include("connect.php");
	$id = $_POST["id"];


    $conn = connect("root",null,"thanarak");
    mysqli_set_charset($conn, "utf8");

    $sql = "DELETE FROM user
			WHERE id_user = '".$id."' ";

	$query = mysqli_query($conn,$sql);

	if(mysqli_affected_rows($conn)) {
		 echo "1";
	}

	mysqli_close($conn);
?>