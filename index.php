
<?php




if(isset($_POST["user"])){
    include "cnc.php";
    
   // $conn = mysqli_connect("localhost", "root", "", "userpass");
    



$username =  $_POST["user"];
$password = $_POST["pass"];
mysqli_select_db($conn, 'userpass'); 

 
$search = "select * from userdata where usernames = '$username' ";

$res = mysqli_query($conn, $search);

$row = mysqli_num_rows($res);
if($row>=1){
    $suc = false;
//    echo "allready exixts";
}
else{

$sql = "INSERT INTO `userdata` (`id`,`usernames`,`passwords`) VALUES (NULL,'$username', '$password')";

//INSERT INTO `userdata` (`id`, `usernames`, `passwords`) VALUES (NULL, 'amit', '123');

$result = mysqli_query($conn, $sql);
if($result){
$suc = true;
 //   echo "command executed";
}


}
 
}
?>


<html>



<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">   
<link href="./style2.css" rel="stylesheet">
<meta name="viewport" content="width=device-width" >

<title>url shortner</title> 
<link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="header">
<header class="head">
    <h1 style=" display:block;  text-align: center; color: #c8dadb; padding-top: 3%;">SHRINK FLY</h1>

</header>
<div class="space">
    <?php
    if(isset($_POST["user"])){ 
    
    if($suc){ echo "<div class='alert alert-success' style=' height:80px; ' role='alert'>
        <h4 style='text-align: center; ' class='alert-heading'>success!</h4>
        <p style='text-align: center; '>signup successfully please login to continue</p>
      </div>";
     }
    elseif(!$suc){
        echo "<div class='alert alert-danger' role='alert'>
        <p style='text-align: center; height:17px;'>username allready exist please try again</p>
      </div>" ;
    }
  
}
  ?> 
</div>
</div>

<div class="container" style="margin:30px; margin-left:8%;">
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" class="box">
                    <h1>Sign up</h1>
                    <p class="text-muted"> Please enter your login and password!</p> <input type="text" name="user" placeholder="Username"> <input type="password" name="pass" placeholder="Password"> <a class="forgot text-muted" href="login.php">I already have an account</a> <input type="submit" value="signup">
                 <div style="height:20px;"></div>
                </form>
            </div>
        </div>
    </div>
</div>

</body>


</html>