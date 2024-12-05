<?php
session_start();
include_once(__DIR__ . '/../../conf/BaseDatos.php');

// Consulta SQL para obtener los datos de los alumnos
$query = "
    SELECT
        id,
        nombre,
        fecha_nacimiento
    FROM
        alumno
";

$result = $conexion->query($query);

if (!$result) {
    die("Error en la consulta: " . $conexion->error);
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Inspirafit</title>
    <link rel="stylesheet" href="../../styles/styleScreen.css">
</head>
<body>

<div class="header">
    <a href="menuProfesor.html"><img src="../../img/logo.png"></a>
    <p>Lista de Alumnos</p>
</div>

<div class="container">
    <div class="menu">
        <a href="ConsultarListaAlumnos.html">
            <button class="btn degr">Lista de Alumnos</button></a>
        <a href="AgregarRecurso.html">
            <button class="btn selec">Agregar documentos o enlaces</button></a>
        <a href="RegistrarAvance.html">
            <button class="btn selec">Registrar avances</button></a>
    </div>

    <div class="main">
        <h1 style="text-align: center;">Lista de Alumnos</h1>
        <table>
            <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Edad</th>
                <th>Estado de Pagos</th>
            </tr>
            </thead>
            <tbody>
            <?php
            // Generar filas de la tabla con los datos
            while ($row = $result->fetch_assoc()) {
                $id = $row['id'];
                $nombre = $row['nombre'];

                // Calcular la edad
                $fecha_nacimiento = new DateTime($row['fecha_nacimiento']);
                $hoy = new DateTime();
                $edad = $hoy->diff($fecha_nacimiento)->y;

                // Si no tienes el campo 'estado_pagos', puedes usar un valor por defecto
                $estado_pagos = isset($row['estado_pagos']) && $row['estado_pagos'] ? "Pagado" : "Pendiente";

                echo "<tr>
                        <td>$id</td>
                        <td>$nombre</td>
                        <td>$edad años</td>
                        <td>$estado_pagos</td>
                    </tr>";
            }
            ?>
            </tbody>
        </table>
    </div>
</div>

</body>
</html>

<?php
// Cierra la conexión
$conexion->close();
?>
