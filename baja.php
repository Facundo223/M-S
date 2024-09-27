<?php
$id_cliente=$_REQUEST['id-cliente'];
$conexion=mysqli_connect("localhost","root","")or die("problemas de conexion");
mysqli_select_db($conexion,"gimnasio")or die("problemas en la seleccion de base de datos");
$sql=("delete from clientes where id-cliente='$id_cliente'");
mysqli_query($conexion,$sql) or die ("problemas en select:".mysqli_error($conexion));
echo "datos borrados correctamente";
mysqli_close($conexion);
?>