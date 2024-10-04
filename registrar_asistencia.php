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


    $insert_query = "INSERT INTO asistencias (DNI, FechaAsistencia) VALUES ('$DNI', '$FechaAsistencia')";
    if (mysqli_query($conexion, $insert_query)) {
        echo "Asistencia registrada correctamente para $Nombre (DNI: $DNI).";
    } else {
        echo "Error al registrar asistencia: " . mysqli_error($conexion);
    }
} else {
    echo "No se encontró un usuario con el nombre: $nombre.";
}

mysqli_close($conexion);
?>
