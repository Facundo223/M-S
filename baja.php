<?php
$DNI=$_REQUEST['DNI'];
$conexion=mysqli_connect("localhost","root","")or die("problemas de conexion");
mysqli_select_db($conexion,"gimnasio")or die("problemas en la seleccion de base de datos");
$sql=("delete from clientes where DNI='$DNI'");
mysqli_query($conexion,$sql) or die ("problemas en select:".mysqli_error($conexion));
echo "datos borrados correctamente";
mysqli_close($conexion);
?>
