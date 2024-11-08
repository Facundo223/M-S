<?php
$DNI = $_REQUEST['DNI'];  


$conexion = mysqli_connect("localhost", "root", "")
or die("Problemas de conexión");

mysqli_select_db($conexion, "gimnasio") or die("Problemas en la selección de base de datos");


$consulta = "SELECT Nombre, Apellido, Telefono, DNI, Cuota, FechadePago FROM clientes WHERE DNI = '$DNI'";
$resultado = mysqli_query($conexion, $consulta) or die("Problemas en la consulta: " . mysqli_error($conexion));

if ($fila = mysqli_fetch_assoc($resultado)) {

    $sql = "DELETE FROM clientes WHERE DNI = '$DNI'";
    mysqli_query($conexion, $sql) or die("Problemas en el delete: " . mysqli_error($conexion));


    echo "<h2>¡Cliente eliminado con éxito!</h2>";
    echo "<p><strong>Detalles del cliente eliminado:</strong></p>";
    echo "<ul>
            <li><strong>Nombre:</strong> " . $fila['Nombre'] . " " . $fila['Apellido'] . "</li>
            <li><strong>Teléfono:</strong> " . $fila['Telefono'] . "</li>
            <li><strong>DNI:</strong> " . $fila['DNI'] . "</li>
            <li><strong>Clase seleccionada:</strong> " . $fila['Cuota'] . "</li>
            <li><strong>Fecha de pago:</strong> " . $fila['FechadePago'] . "</li>
          </ul>";
} else {

    echo "<h2>No se encontró un cliente con el DNI proporcionado.</h2>";
}


mysqli_close($conexion);


echo '<br><a href="gestion.php">
        <button style="padding: 10px 20px; font-size: 16px; background-color: #007bff; color: white; border: none; border-radius: 5px; cursor: pointer;">
            Volver a Gestión de Usuarios
        </button>
      </a>';
?>
