<?php
$servername = "localhost"; 
$username = "root";
$password = ""; 
$dbname = "gimnasio"; 

$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}


$nuevoPrecioMusculacion = $_POST['nuevoPrecioMusculacion'];
$nuevoPrecioTaekwondo = $_POST['nuevoPrecioTaekwondo'];
$nuevoPrecioZumba = $_POST['nuevoPrecioZumba'];
$nuevoPrecioFuncional = $_POST['nuevoPrecioFuncional'];
$nuevoPrecioBoxeo = $_POST['nuevoPrecioBoxeo'];


$sql = "UPDATE clases SET precio = CASE 
    WHEN nombre = 'Musculacion' THEN $nuevoPrecioMusculacion
    WHEN nombre = 'Taekwondo' THEN $nuevoPrecioTaekwondo
    WHEN nombre = 'Zumba' THEN $nuevoPrecioZumba
    WHEN nombre = 'Funcional' THEN $nuevoPrecioFuncional
    WHEN nombre = 'Boxeo' THEN $nuevoPrecioBoxeo
    END
WHERE nombre IN ('Musculacion', 'Taekwondo', 'Zumba', 'Funcional', 'Boxeo')";

if ($conn->query($sql) === TRUE) {
    echo "Precios actualizados correctamente.";
} else {
    echo "Error al actualizar precios: " . $conn->error;
}

$conn->close();
?>
