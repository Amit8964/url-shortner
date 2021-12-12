<?php

include "cnc.php";

$dlt = $_GET['x'];

if($conn){

    echo $dlt;
}

$sql = "delete from urls where short= '$dlt' ";

$result = mysqli_query($conn, $sql);

if($result){

    echo "delete successful";
    header("location:./main.php");
}


?>