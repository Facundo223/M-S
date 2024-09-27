<?php
// Conexión a la base de datos
$servername = "localhost"; // Cambia esto por el nombre de tu servidor
$username = "root"; // Cambia esto por tu nombre de usuario
$password = ""; // Cambia esto por tu contraseña
$dbname = "gimnasio"; // Cambia esto por el nombre de tu base de datos

// Crea una conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Consulta para obtener todos los registros
$sql = "SELECT DNI, DNI, Nombre, Apellido, Telefono, cuota, FechadePago, Estado_Pago FROM clientes";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles1.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>Ver Registros</title>
</head>
<body>
    <h1>Registros de Clientes</h1>
    

    <div class="container">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Teléfono</th>
                    <th>DNI</th>
                    <th>Cuota</th>
                    <th>Fecha de Pago</th>
                    <th>Estado de Pago</th>
                </tr>
            </thead>
            <tbody>
                <?php
               
                if ($result->num_rows > 0) {
            
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>
                            <td>{$row['Nombre']}</td>
                            <td>{$row['Apellido']}</td>
                            <td>{$row['Telefono']}</td>
                            <td>{$row['DNI']}</td>
                            <td>{$row['cuota']}</td>
                            <td>{$row['FechadePago']}</td>
                            <td>{$row['Estado_Pago']}</td>
                        </tr>";
                    }
                } else {
                    echo "<tr><td colspan='8'>No se encontraron registros</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
    
    <?php
  
    $conn->close();
    ?>
</body>
</html>
