<?php
$con = mysqli_connect("localhost","siamwanich_1","043522359","siamwanich_1");
$sql="SELECT * FROM user_tbs WHERE user_username='{$_POST['user_username']}'";
if($q=mysqli_query($con,$sql)){
if(mysqli_num_rows($q)>0){
  echo "not pass";
}
else echo "pass";
}
else echo "Error";

 ?>
