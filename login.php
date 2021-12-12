<?php

if(isset($_POST["user"])){

include "cnc.php";

$user = $_POST["user"];
$pass =  $_POST["pass"];

$sql2 = "select * from userdata where usernames = '$user' " ;

$result2 = mysqli_query($conn, $sql2);


$row2 = mysqli_num_rows($result2);
if($row2== NULL){

echo "<script> alert('you are not resistered please resister yourself');

window.location = './login.php';

</script>";

exit();

}
else{  


$sql = "select * from userdata where usernames = '$user' AND passwords= '$pass' " ;

$result = mysqli_query($conn, $sql);
$row = mysqli_num_rows($result);
if($row>=1){

    session_start();

    $_SESSION["user"] = $user;

    header("location:main.php");


}
else{

echo "<script>alert('incorrect userid password');</script>";

}

}

}


?>

<html>

<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<link rel="stylesheet" href="style2.css">
<title>
please login to continue
</title>


</head>


<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" class="box">
                    <h1>Login</h1>
                    <p class="text-muted"> Please enter your login and password!</p> <input type="text" name="user" placeholder="Username"> <input type="password" name="pass" placeholder="Password"> <a class="forgot text-muted" href="index.php">I don't have an account?</a> <input type="submit" value="Login">
                 <div style="height:20px;"></div>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>