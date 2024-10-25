<?php

$conexion = mysqli_connect("localhost", "root", "", "gimnasio");

if (!$conexion) {
    die("Conexión fallida: " . mysqli_connect_error());
}

$Nombre = $_POST['Nombre'];
$FechaAsistencia = $_POST['FechaAsistencia'];

$query = "SELECT DNI FROM clientes WHERE Nombre = '$Nombre'";
$result = mysqli_query($conexion, $query);

if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $DNI = $row['DNI'];

    // Contar asistencias actuales
    $count_query = "SELECT COUNT(*) AS TotalAsistencias FROM asistencias WHERE DNI = '$DNI'";
    $count_result = mysqli_query($conexion, $count_query);
    $count_row = mysqli_fetch_assoc($count_result);
    $total_asistencias = $count_row['TotalAsistencias'];

    if ($total_asistencias >= 30) {
        // Reseteamos las asistencias
        $delete_query = "DELETE FROM asistencias WHERE DNI = '$DNI'";
        mysqli_query($conexion, $delete_query);
        echo "Se han alcanzado 30 asistencias. Se han reiniciado las asistencias de $Nombre.";
    }

    // Insertar nueva asistencia
    $insert_query = "INSERT INTO asistencias (DNI, FechaAsistencia) VALUES ('$DNI', '$FechaAsistencia')";
    if (mysqli_query($conexion, $insert_query)) {
        echo "Asistencia registrada correctamente para $Nombre (DNI: $DNI).";
    } else {
        echo "Error al registrar asistencia: " . mysqli_error($conexion);
    }
} else {
    echo "No se encontró un usuario con el nombre: $Nombre.";
}

mysqli_close($conexion);
?>
