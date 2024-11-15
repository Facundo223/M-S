<?php

$conexion = mysqli_connect("localhost", "root", "", "gimnasio");

if (!$conexion) {
    die("Conexión fallida: " . mysqli_connect_error());
}

// Obtener los valores del formulario
$Nombre = $_POST['Nombre'];
$FechaAsistencia = $_POST['FechaAsistencia'];

// Buscar el DNI del cliente por nombre
$query = "SELECT DNI, FechadePago FROM clientes WHERE Nombre = '$Nombre'";
$result = mysqli_query($conexion, $query);

if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $DNI = $row['DNI'];
    $FechaPagoAnterior = $row['FechadePago'];

    // Actualizar la fecha de pago en la base de datos
    $update_pago_query = "UPDATE clientes SET FechadePago = '$FechaAsistencia' WHERE DNI = '$DNI'";

    if (mysqli_query($conexion, $update_pago_query)) {
        echo "<h2>La fecha de pago de $Nombre (DNI: $DNI) se ha actualizado correctamente.</h2>";
        echo "<p>Fecha de pago anterior: $FechaPagoAnterior</p>";
        echo "<p>Fecha de pago nueva: $FechaAsistencia</p>";
    } else {
        echo "Error al actualizar la fecha de pago: " . mysqli_error($conexion);
    }
} else {
    echo "<h2>No se encontró un usuario con el nombre: $Nombre.</h2>";
}

mysqli_close($conexion);

// Botón para volver a la gestión de usuarios
echo '<br><a href="gestion.php">
        <button style="padding: 10px 20px; font-size: 16px; background-color: #007bff; color: white; border: none; border-radius: 5px; cursor: pointer;">
            Volver a Gestión de Usuarios
        </button>
      </a>';
?>
