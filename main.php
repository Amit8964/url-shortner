
<?php

session_start();
if(isset($_SESSION["user"])){
$user = $_SESSION["user"];

$str = substr(md5(microtime()), rand(0,26), 5);


include "cnc.php";

if(isset($_POST["short"])){
  
    $abc = $_POST["short"];

mysqli_select_db($conn, 'userpass'); 
 
$search = "select * from urls where short = '$str' ";

$res = mysqli_query($conn, $search);

$row = mysqli_num_rows($res);
if($row>=1){
    $suc = false;
   echo "allready exixts";
}
else{

$sql = "INSERT INTO `urls` (`sn`,`short`,`orignal`,`username`) VALUES (NULL,'$str','$abc', '$user')";

//INSERT INTO `userdata` (`id`, `usernames`, `passwords`) VALUES (NULL, 'amit', '123');

$result = mysqli_query($conn, $sql);

if($result){

}
else{

    echo "<h1>somthing went wrong please try again</h1>";

}

}

}


?>

<html>

<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">   
<style>

.header{
height: 16vh;
width: 100vw;
background: #ffa600e8;
border-bottom: 2px solid black;
}

body{
    box-sizing: border-box;
    margin: 0;
    padding: 0;
    font-family: sans-serif;
    background: linear-gradient(to right, #b92b27, #1565c0)
}
.space{
margin-top: 3%;
    background: #e7e7e31f;
    height: 50%;
    width: 100%;
}

.cntainer{
    border-top: 2px solid black;
height: 30vh;

display: flex;
background: #191919;
position: relative; 
width: 60%;
top: 5%;
left: 50%;
transform: translate(-50%, -50%);
box-shadow: 5px 5px 20px 5px black;
border-radius: 20px;
justify-content:space-around;
}

th, td{

    color:white;
}

.cntainer input{
    height:50px;
    width:400px;
    border-radius:10px;
    background-color:hsl(0, 25%, 94%);
    margin-top:30px;
}
#btn{
    margin-top:23px;
    display:inline-block;
background-color:#191919;
color:green;
width:100%;
border: 2px solid green;
border-radius:10px;
padding:10px 20px;
position:relative;
left:50%
transform:translate(-50%, -50%);
}

.links:link{
outline:none;

color:white;

}

.links:hover{
outline:none;

color:black;

}
#head th{
 padding-bottom:20px;

}

#bellow_head td{
 padding-bottom:10px;

}

table.fixed {
                table-layout: fixed;
            }

    </style>


<meta name="viewport" content="width=device-width" >

<title>url shortner</title> 

</head>
<body>
    <div class="header">
<header class="head">
    <h1 style=" display:block;  text-align: center; color: #c8dadb; padding-top: 3%;">SHRINK FLY</h1>

</header>

</div>
<hr style="margin-top: 7%; width: 40%;">


<div class="cntainer" id="container">


<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
<input  type="text" name="short" placeholder="paste here to shrink"><br><br>

<button id="btn" type="submit">SHRINK</button>

<a class="forgot text-muted" href="logout.php">click here to logout</a>
</form>



 </div>
<div style="box-sizing:border-box; max-width:100%;  height:300px;   overflow-y: scroll;">
 <table style="width:100%" border="1">
<tr id="head">

<th width="33%">short url</th>
<th width="33%">orignal url</th>
<th width="33%">Delete</th>
</tr>
<?php $sql2 = "select * from urls where username ='$user' "; $res2 = mysqli_query($conn, $sql2);
while($row = mysqli_fetch_assoc($res2)){

?>
<tr  id="bellow_head">
<td width="33%"  > <a href="https://url-shortner1-new.herokuapp.com/r.php?x=<?php echo $row['short']; ?>">https://url-shortner1-new.herokuapp.com/r.php?x=<?php echo $row['short']; ?></a></td>
<td width="33%"><?php echo $row['orignal']; ?></td>

<td width="33%"><a class='links' href="./delete.php?x=<?php echo $row['short']; ?>">delete</a></td>
</tr>


<?php } ?>
</table>
</div>

</body>

</html>

<?php }

else{

    $bv = "login.php";

    echo "<script>alert('unauthorized user please login to continue');
    
    window.location.href = 'login.php' ;
    </script>";

}
?>