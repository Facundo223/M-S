<?php

$servername = "localhost"; 
$username = "root"; 
$password = ""; 
$dbname = "gimnasio"; 

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

$sql = "
    SELECT c.DNI, c.Nombre, c.Apellido, c.Telefono, c.cuota, c.FechadePago, COUNT(a.DNI) AS Total_Asistencias
    FROM clientes c
    LEFT JOIN asistencias a ON c.DNI = a.DNI
    GROUP BY c.DNI, c.Nombre, c.Apellido, c.Telefono, c.cuota, c.FechadePago
";

$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles1.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="styles.css">
    <title>Ver Registros</title>
</head>
<body>
    <h1>Registros de Clientes</h1>
    <a href="gestion.php" class="boton"><button>Regresar</button></a>
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
                    <th>Total Asistencias</th>
                    <th>Estado de Pago</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        // Calcular el estado de pago
                        $fecha_pago = new DateTime($row['FechadePago']);
                        $fecha_actual = new DateTime();
                        $diferencia_dias = $fecha_pago->diff($fecha_actual)->days;
                        $estado_pago = 'Regular';

                        // Lógica para definir el estado de pago
                        if ($diferencia_dias <= 0) {
                            $estado_pago = 'Vencido';
                        } elseif ($diferencia_dias <= 3) {
                            $estado_pago = 'Próximo a Vencer (3 días)';
                        } elseif ($diferencia_dias <= 7) {
                            $estado_pago = 'Próximo a Vencer (7 días)';
                        } elseif ($row['Total_Asistencias'] >= 30) {
                            $estado_pago = '30 Asistencias Alcanzadas';
                        }

                        echo "<tr>
                            <td>{$row['Nombre']}</td>
                            <td>{$row['Apellido']}</td>
                            <td>{$row['Telefono']}</td>
                            <td>{$row['DNI']}</td>
                            <td>{$row['cuota']}</td>
                            <td>{$row['FechadePago']}</td>
                            <td>{$row['Total_Asistencias']}</td>
                            <td>$estado_pago</td>
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


