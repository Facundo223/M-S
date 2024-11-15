<?php

$conexion = mysqli_connect("localhost", "root", "", "gimnasio");

if (!$conexion) {
    die("Conexión fallida: " . mysqli_connect_error());
}

$Nombre = $_POST['Nombre'];
$FechaAsistencia = $_POST['FechaAsistencia'];

// Buscar el DNI del cliente por nombre
$query = "SELECT DNI FROM clientes WHERE Nombre = '$Nombre'";
$result = mysqli_query($conexion, $query);

if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $DNI = $row['DNI'];

    // Contar las asistencias actuales
    $count_query = "SELECT COUNT(*) AS TotalAsistencias FROM asistencias WHERE DNI = '$DNI'";
    $count_result = mysqli_query($conexion, $count_query);
    $count_row = mysqli_fetch_assoc($count_result);
    $total_asistencias = $count_row['TotalAsistencias'];

    if ($total_asistencias >= 30) {
        // Si se alcanzaron 30 asistencias, se reinician
        $delete_query = "DELETE FROM asistencias WHERE DNI = '$DNI'";
        if (mysqli_query($conexion, $delete_query)) {
            echo "<h2>Se han alcanzado 30 asistencias. Las asistencias de $Nombre han sido reiniciadas.</h2>";
        } else {
            echo "Error al reiniciar las asistencias: " . mysqli_error($conexion);
        }
    }

    // Insertar nueva asistencia
    $insert_query = "INSERT INTO asistencias (DNI, FechaAsistencia) VALUES ('$DNI', '$FechaAsistencia')";
    if (mysqli_query($conexion, $insert_query)) {
        echo "<h2>Asistencia registrada correctamente para $Nombre (DNI: $DNI).</h2>";
    } else {
        echo "Error al registrar la asistencia: " . mysqli_error($conexion);
    }
} else {
    echo "<h2>No se encontró un usuario con el nombre: $Nombre.</h2>";
}

mysqli_close($conexion);

// Botón para volver a la gestión de usuarios
echo '<br><a href="ver_registros.php">
        <button style="padding: 10px 20px; font-size: 16px; background-color: #007bff; color: white; border: none; border-radius: 5px; cursor: pointer;">
            Volver a los Registros
        </button>
      </a>';
?>
