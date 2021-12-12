
<?php
include "cnc.php";

if(isset($_POST["user"])){


$username =  $_POST["user"];
$password = $_POST["pass"];
//mysqli_select_db($conn, 'userpass'); 


$search = "select * from userdata where usernames = '$username' ";

$res = mysqli_query($conn, $search);

$row = mysqli_num_rows($res);
if($row>=1){

    echo "allready exixts";
}
else{

$sql = "INSERT INTO `userdata` (`id`,`usernames`,`passwords`) VALUES (NULL,'$username', '$password')";

//INSERT INTO `userdata` (`id`, `usernames`, `passwords`) VALUES (NULL, 'amit', '123');

$result = mysqli_query($conn, $sql);
if($result){

    echo "command executed";
}


}

}
?>
/*
$con = mysqli_connect("localhost", "root", "","shortner_table");

if($con){

    $qur = "CREATE TABLE `shortner_table`.`$username` ( `id` INT NOT NULL AUTO_INCREMENT , `orignal_url` VARCHAR(1000) NOT NULL , `short_url` VARCHAR(50) NOT NULL , PRIMARY KEY (`id`)) ENGINE=InnoDB;";

    $newre = mysqli_query($con, $qur);
    if($newre){
echo ' this is working now';

    }

} */


