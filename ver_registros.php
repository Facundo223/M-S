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
    <style>
        .estado-vencido {
            color: red;
            font-weight: bold;
        }
        .estado-proximo {
            color: orange;
            font-weight: bold;
        }
        .estado-pendiente {
            color: green;
            font-weight: bold;
        }
        .estado-pago-pendiente {
            color: darkgreen;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <h1>Registros de Clientes</h1>
    <a href="gestion.php" class="boton"><button>Regresar</button></a>
    <a href="fecha-pago.php" class="boton"><button>Actualizar Fecha De Pago</button></a>
    <a href="register.php"class="boton"><button>Registrar Asistencia</button></a>
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
                        $estado_pago = '';
                        $estado_class = ''; // Variable para la clase de estado

                        // Definir el estado de pago y asignar la clase de color
                        if ($diferencia_dias > 30) {
                            $estado_pago = "Vencido";
                            $estado_class = "estado-vencido";
                        } elseif ($diferencia_dias <= 30 && $diferencia_dias > 23) {
                            $estado_pago = "Próximo a vencer (7 días)";
                            $estado_class = "estado-proximo";
                        } elseif ($diferencia_dias <= 23 && $diferencia_dias > 20) {
                            $estado_pago = "Próximo a vencer (10 días)";
                            $estado_class = "estado-proximo";
                        } elseif ($diferencia_dias <= 0) {
                            $estado_pago = "Pago pendiente";
                            $estado_class = "estado-pago-pendiente";
                        } else {
                            // Si está dentro del periodo de 30 días, calcular los días que faltan
                            $dias_faltantes = 30 - $diferencia_dias;
                            $estado_pago = "Faltan $dias_faltantes días para pagar";
                            $estado_class = "estado-pendiente";
                        }

                        echo "<tr>
                            <td>{$row['Nombre']}</td>
                            <td>{$row['Apellido']}</td>
                            <td>{$row['Telefono']}</td>
                            <td>{$row['DNI']}</td>
                            <td>{$row['cuota']}</td>
                            <td>{$row['FechadePago']}</td>
                            <td>{$row['Total_Asistencias']}</td>
                            <td class='$estado_class'>$estado_pago</td>
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
