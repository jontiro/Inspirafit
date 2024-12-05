<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Inspirafit</title>
    <link rel="stylesheet" href="../../../styles/styleScreen.css">
</head>
<body>

<div class="header">
    <a href="../menuAdministrador.html"><img src="../../../img/logo.png"></a>
    <pre></pre>
    <pre></pre>
    <pre></pre>
    <p>Gestionar Paquetes</p>
</div>
<div class="container">
    <div class="menu">
        <a href="../frmPantallaRegistro.html">
            <button class="btn selec">Inscribir Alumno</button>
        </a>
        <a href="../Estadisticas/PantallaGraficas.html">
            <button class="btn selec">Generar Estadísticas</button>
        </a>
        <a href="../Profesores/PantallaGestionProfesores.html">
            <button class="btn selec">Gestionar Profesores</button>
        </a>
        <a href="../Clases/PantallaGestionClases.php">
            <button class="btn selec">Gestionar Clases</button>
        </a>
        <a href="PantallaGestionPaquetes.php">
            <button class="btn degr">Gestionar Paquetes</button>
        </a>
        <a href="../Pagos/PantallaPagoAlumnos.html">
            <button class="btn selec">Registrar Pagos</button>
        </a>
    </div>
    <div class="main">
        <a href="NuevoPaquete.html">
            <button class="btn shadow-effect">Nuevo Paquete</button></a>
        <a href="ModificarPaquete.html">
            <button class="btn shadow-effect">Modificar Paquetes</button></a>
        <h2>Clases Disponibles</h2>
        <?php
    // El archivo ControlGestionClases.php ya tiene la lógica para obtener las clases de la base de datos
    // Entonces solo imprimimos la tabla aquí
    if ($resultado->num_rows > 0) {
        echo "<table border='1'>";
        echo "<tr><th>ID</th><th>Salón</th><th>Materia</th><th>Profesor</th><th>Cupo</th><th>Horario</th><th>Acciones</th></tr>";

        while ($fila = $resultado->fetch_assoc()) {
        echo "<tr>";
            echo "<td>" . $fila['id'] . "</td>";
            echo "<td>" . $fila['salon'] . "</td>";
            echo "<td>" . $fila['materia'] . "</td>";
            echo "<td>" . $fila['profesor'] . "</td>";
            echo "<td>" . $fila['cupo'] . "</td>";
            echo "<td>" . $fila['horario'] . "</td>";
            echo "<td>
                <form action='ControlGestionClases.php' method='POST' style='display:inline;'>
                    <input type='hidden' name='accion' value='eliminar'>
                    <input type='hidden' name='id' value='" . $fila['id'] . "'>
                    <button type='submit' onclick='return confirm(\"¿Estás seguro de que quieres eliminar esta clase?\");'>Eliminar</button>
                </form>
            </td>";
            echo "</tr>";
        }
        echo "</table>";
        } else {
        echo "<p>No hay clases disponibles.</p>";
        }
        ?>
        <br>
        <button class="btn shadow-effect">Descargar como PDF</button>
    </div>
</div>
</body>
</html>
