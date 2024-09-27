<?php
session_start();
$DNI=$_REQUEST['DNI'];
$conexion= mysqli_connect("localhost","root","") or die ("problemas de conexion");
mysqli_select_db($conexion,"gimnasio");
$_SESSION['DNI']=$_REQUEST['DNI'];
$sql="select * from tabla where DNI='$DNI'";
$consulta=mysqli_query($conexion,$sql);
while($myrow=mysqli_fetch_array($consulta)){
      $Nombre=$myrow['0'];
      $Apellido=$myrow['1'];
      $Telefono=$myrow['2'];
      $DNI=$myrow['3'];
      $Cuota=$myrow['4'];
      $FechaDePago=$myrow['5'];
      $EstadoDePago=$myrow['6'];

}
mysqli_close($conexion);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    
    <title>Document</title>
</head>
<body>
<form action="<?php
($_SERVER['PHP_SELF'])?> "method="post">
<input type="text" placeholder="&#123456; Nombre" name="Nombre" value="><?php
if(isset($Nombre)) echo $Nombre
?>">

<input type="text" placeholder="&#2365456; Apellido" name="Apellido" value="><?php
if(isset($Apellido)) echo $Apellido
?>">

<input type="text" placeholder="&#123456; Telefono" name="Telefono" value="><?php
if(isset($Telefono)) echo $Telefono
?>">

<input type="text" placeholder="&#123456; DNI" name="DNI" value="><?php
if(isset($DNI)) echo $DNI
?>">
<input type="text" placeholder="&#123456; Cuota" name="Cuota" value="><?php
if(isset($Cuota)) echo $Cuota
?>">
<input type="text" placeholder="&#123456; FechaDePago" name="FechaDePago" value="><?php
if(isset($FechaDePago)) echo $FechaDePago
?>">
<input type="text" placeholder="&#123456; EstadoDePago" name="EstadoDePago" value="><?php
if(isset($EstadoDePago)) echo $EstadoDePago
?>">
<input type="submit" name="submit">

</form>
    
</body>
</html>