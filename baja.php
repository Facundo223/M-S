<?php
$Nombre=$_REQUEST['Nombre'];
$Apellido=$_REQUEST['Apellido'];
$Telefono=$_REQUEST['Telefono'];
$DNI=$_REQUEST['DNI'];
$Cuota=$_REQUEST['cuota'];
$FechadePago=$_REQUEST['FechadePago'];
$conexion=mysqli_connect("localhost","root","")or die("problemas de conexion");
mysqli_select_db($conexion,"base")or die("problemas en la seleccion de base de datos");
$consulta="insert into alumno values('$Nombre','$Apellido','$Telefono','$DNI','$Cuota','$FechadePago')";
mysqli_query($conexion,$consulta);
mysqli_close($conexion);
echo"los datos se cargaron con exito";
echo "<br>"
?>
