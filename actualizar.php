<?php
$servername = "localhost"; 
$username = "root"; 
$password = ""; 
$dbname = "gimnasio"; 

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Recibir los nuevos precios del formulario
$nuevoPrecioMusculacion = $_POST['nuevoPrecioMusculacion'];
$nuevoPrecioTaekwondo = $_POST['nuevoPrecioTaekwondo'];
$nuevoPrecioZumba = $_POST['nuevoPrecioZumba'];
$nuevoPrecioFuncional = $_POST['nuevoPrecioFuncional'];
$nuevoPrecioBoxeo = $_POST['nuevoPrecioBoxeo'];

// Actualizar precios solo si no están vacíos
$sql = "UPDATE clases SET precio = CASE nombre 
            WHEN 'Musculación' THEN ? 
            WHEN 'Taekwando' THEN ? 
            WHEN 'Zumba' THEN ? 
            WHEN 'Funcional' THEN ? 
            WHEN 'Boxeo' THEN ? 
            END WHERE nombre IN ('Musculación', 'Taekwando', 'Zumba', 'Funcional', 'Boxeo')";

$stmt = $conn->prepare($sql);
$stmt->bind_param("ddddd", $nuevoPrecioMusculacion, $nuevoPrecioTaekwondo, $nuevoPrecioZumba, $nuevoPrecioFuncional, $nuevoPrecioBoxeo);
$stmt->execute();

// Cerrar la declaración y la conexión
$stmt->close();
$conn->close();

// Redirigir a una página de éxito o mostrar un mensaje
echo 'decime algo ahora pillo ultra';
exit();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles1.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="styles.css">
    <title>Document</title>
</head>
<body>
    <a href="gestion.php"><button>Volver</button></a>
</body>
</html>
