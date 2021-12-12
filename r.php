
<?php

include "cnc.php";

$red = $_GET["x"];
$search = "select * from urls where short = '$red' ";
$res4 = mysqli_query($conn, $search);
$row = mysqli_fetch_assoc($res4);
$data = $row["orignal"];


//header("location: $data");

?>
<html>
    <script>

window.onload = ()=>{

var i = 6 ;

setInterval(()=>{
i = i-1 ;

var doc = document.getElementById("tx");
doc.innerText = i ;

if(i==0){

    window.location = "<?php echo $data; ?>" ;

}

},1000)



}
        </script>
<body style=" margin: 0;
    padding: 0;
    font-family: sans-serif;
    background: linear-gradient(to right, #b92b27, #1565c0)">

<div  style="height:40%; width:60%; position:relative; top:50%; transform:translate(-50%, -50%); left:50%; border-radius:20px; box-shadow:2px 4px 10px 20px black; background:#191919;">

<h1 style="color:white;"> please wait for....  </h1>

<h1> <p style="text-align:center; padding-top:3%;  font-size:60px;  text-size-adjust:30px;  color:hsl(263, 69%, 39%);" id="tx" > </P></h1>

<h2 style="color:white; text-align:center;">seconds</h2>
</div>

</body>


</html>
