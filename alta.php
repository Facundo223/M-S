<?php
$Nombre=$_REQUEST['Nombre'];
$Apellido=$_REQUEST['Apellido'];
$Telefono=$_REQUEST['Telefono'];
$DNI=$_REQUEST['DNI'];
$Cuota=$_REQUEST['cuota'];
$FechadePago=$_REQUEST['FechadePago'];
$Estado_Pago=$_REQUEST['Estado_Pago'];
$conexion=mysqli_connect("localhost","root","")
or die("problemas de conexion");
mysqli_select_db($conexion,"gimnasio")or die("problemas en la seleccion de base de datos");
$consulta="insert into clientes values('0','$Nombre','$Apellido','$Telefono','$DNI','$Cuota','$FechadePago',$Estado_Pago)";
mysqli_query($conexion,$consulta);
mysqli_close($conexion);
echo"los datos se cargaron con exito";
echo "<br>"
?>