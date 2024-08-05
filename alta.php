<?php
$nombre=$_REQUEST['Nombre'];
$apellido=$_REQUEST['Apellido'];
$telefono=$_REQUEST['Telefono'];
$conexion=mysqli_connect("localhost","root","","base");
$consulta="insert into tabla values('$nombre','$apellido','$telefono')";
mysqli_query($conexion,$consulta);
mysqli_close($conexion);
echo"los datos se cargaron con exito";
echo "<br>"
?>