<?php

include ('conexiondatabase.php');

session_start();

function phpAlert($msg) {
    echo '<script type="text/javascript"> alert("' . $msg . '"); window.location.href="login.html"</script>';
} 

$correo=$_POST['correo'];
$pass=$_POST['password'];

$_SESSION['correo']=$correo;

$sql = "SELECT * FROM usuarios WHERE Correo='$correo' and Contra='$pass'";

$result=mysqli_query($conexion ,$sql) or die ("Algo salio mal");

//Guarda si encontro un resultado
$filas =mysqli_num_rows($result);


if($filas>0){

	header("location:index.php");

 }
else{
	phpAlert(   "Alguno de los datos son incorrectos"   );

}


mysqli_free_result($result);
mysqli_close($conexion);


?>
