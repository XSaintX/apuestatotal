<?php
 require "../db.php";

 $idvoucher =$_POST['idvoucher'];
 $sql = mysqli_query($conn, "SELECT monto FROM info_cuenta WHERE idvoucher = '$idvoucher'"); //RESPONSE IS QUERY WITH REAL $PROJECTNUM
 $res = mysqli_fetch_object($sql);
 $count = $res->monto;
 echo $count;
 exit();
?>