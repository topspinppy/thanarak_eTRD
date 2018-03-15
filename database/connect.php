<?php

function connect ($user,$userPass,$databasename)
{
    $serverName = "localhost";
    $userName = $user;
    $userPassword = $userPass;
    $dbName = $databasename;
  
    $conn = mysqli_connect($serverName,$userName,$userPassword,$dbName);

    return $conn;
}

function query ($sqls,$connect)
{
    $query  = mysqli_query($connect,$sqls);
    return query;
}

?>