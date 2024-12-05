<?php
// Incluir el archivo PHP donde está la función mostrarTabla
include_once (__DIR__ . '/../../../conf/BaseDatos.php');
include_once(__DIR__ . '/../../../Control/ControlGestionClases.php');
$conexion = BaseDatos::getConexion();

?>
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
    <p>Gestionar Clases</p>
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
        <a href="PantallaGestionClases.php">
            <button class="btn degr">Gestionar Clases</button>
        </a>
        <a href="../Paquetes/PantallaGestionPaquetes.php">
            <button class="btn selec">Gestionar Paquetes</button>
        </a>
        <a href="../Pagos/PantallaPagoAlumnos.html">
            <button class="btn selec">Registrar Pagos</button>
        </a>
    </div>
    <div class="main">
        <a href="NuevaClase.html">
            <button class="btn shadow-effect">Nueva Clase</button></a>
        <a href="ModificarClase.html">
            <button class="btn shadow-effect">Modificar Clases</button></a><br>

        <?php
        // Asumiendo que $conexion ya está definida en el archivo ControlGestionClases.php
         Control\mostrarTabla($conexion);
        ?>

        <button class="btn shadow-effect" onclick="window.location.href='PantallaGestionClases.php?descargar_pdf=true';">Descargar como PDF</button>


        <?php
        if (isset($_GET['descargar_pdf']) && $_GET['descargar_pdf'] == 'true') {
        // Llamar al metodo estático para generar el PDF
        Control\generarPDF($conexion);
        exit(); // Detener la ejecución del script después de generar el PDF
        }
        ?>
    </div>

</div>
</body>
</html>