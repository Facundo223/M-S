<?php
$Nombre=$_POST['Nombre'];
$Apellido=$_POST['Apellido'];
$Telefono=$_POST['Telefono'];
$DNI=$_POST['DNI'];
$Cuota=$_POST['cuota'];
$FechadePago=$_POST['FechadePago'];

$conexion=mysqli_connect("localhost","root","")
or die("problemas de conexion");

mysqli_select_db($conexion,"gimnasio")or die("problemas en la seleccion de base de datos");
$consulta="insert into clientes values('$Nombre','$Apellido','$Telefono','$DNI','$Cuota','$FechadePago')";
mysqli_query($conexion,$consulta);
mysqli_close($conexion);

echo"los datos se cargaron con exito";
echo "<br>"
?>