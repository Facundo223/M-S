<?php
$Nombre = $_POST['Nombre'];
$Apellido = $_POST['Apellido'];
$Telefono = $_POST['Telefono'];
$DNI = $_POST['DNI'];
$Cuota = $_POST['cuota'];
$FechadePago = $_POST['FechadePago'];

// Conexión a la base de datos
$conexion = mysqli_connect("localhost", "root", "")
or die("Problemas de conexión");

mysqli_select_db($conexion, "gimnasio") or die("Problemas en la selección de base de datos");

// Insertar los datos en la tabla 'clientes'
$consulta = "INSERT INTO clientes (Nombre, Apellido, Telefono, DNI, Cuota, FechadePago) 
             VALUES ('$Nombre', '$Apellido', '$Telefono', '$DNI', '$Cuota', '$FechadePago')";
mysqli_query($conexion, $consulta);
mysqli_close($conexion);

// Mensaje de éxito
echo "<h2>¡Los datos se cargaron con éxito!</h2>";
echo "<p><strong>Detalles del usuario registrado:</strong></p>";
echo "<ul>
        <li><strong>Nombre:</strong> $Nombre $Apellido</li>
        <li><strong>Teléfono:</strong> $Telefono</li>
        <li><strong>DNI:</strong> $DNI</li>
        <li><strong>Clase seleccionada:</strong> $Cuota</li>
        <li><strong>Fecha de pago:</strong> $FechadePago</li>
      </ul>";

// Botón para redirigir a la página de Gestión de Usuarios
echo '<br><a href="gestion.php">
        <button style="padding: 10px 20px; font-size: 16px; background-color: #007bff; color: white; border: none; border-radius: 5px; cursor: pointer;">
            Volver a Gestión de Usuarios
        </button>
      </a>';
?>
