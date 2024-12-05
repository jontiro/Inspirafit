<?php
namespace Control;

include_once(__DIR__ . '/../conf/BaseDatos.php');
include_once(__DIR__ . '/../Entity/Clase.php');

use Entity\Clase;
use BaseDatos;
use libs\fpdf\FPDF;

$conexion = BaseDatos::getConexion();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['accion'])) {
$accion = $_POST['accion'];

switch ($accion) {
case 'crear':
$salon = $_POST['salon'];
$materia = $_POST['materia'];
$profesor = $_POST['profesor'];
$cupo = $_POST['cupo'];
$horario = $_POST['horario'];
$clase = new Clase($materia, $profesor, $cupo, $salon, $horario);

if ($clase->guardar($conexion)) {
echo '<script type="text/javascript">
    alert("Materia: ' . $materia . ' registrada exitosamente.");
    window.location.href="../Boundary/Admin/Clases/PantallaGestionClases.php";
</script>';
} else {
echo '<script type="text/javascript">
    alert("Error al registrar la materia: ' . $materia . '.");
    window.location.href="../Boundary/Admin/Clases/PantallaGestionClases.php";
</script>';
}
break;

case 'eliminar':
$id = $_POST['id'];
if (Clase::eliminar($conexion, $id)) {
echo "Clase eliminada exitosamente";
} else {
echo "Error al eliminar la clase";
}
break;
}
}

// Método para mostrar la tabla
function mostrarTabla($conexion) {
    // Obtener todas las clases
    $resultado = Clase::obtenerTodas($conexion);

    // Verificar si hay resultados
    if ($resultado->num_rows > 0) {
        // Iniciar la tabla
        echo "<table border='1'>";
        echo "<tr><th>ID</th><th>Salón</th><th>Materia</th><th>Profesor</th><th>Cupo</th><th>Horario</th><th>Acciones</th></tr>";

        // Iterar sobre los resultados y mostrar los datos
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

        // Cerrar la tabla
        echo "</table>";
    } else {
        // Si no hay resultados, mostrar un mensaje
        echo "<p>No hay clases disponibles.</p>";
    }
}

function generarPDF($conexion)
    {
        // Incluir la biblioteca FPDF
        require_once(__DIR__ . '/../libs/fpdf/fpdf.php');

        // Crear un objeto FPDF
        $pdf = new FPDF();
        $pdf->AddPage();

        // Establecer fuente
        $pdf->SetFont('Arial', 'B', 12);

        // Título del PDF
        $pdf->Cell(190, 10, 'Listado de Clases', 0, 1, 'C');

        // Espacio entre el título y la tabla
        $pdf->Ln(10);

        // Agregar los encabezados de la tabla
        $pdf->Cell(30, 10, 'ID', 1, 0, 'C');
        $pdf->Cell(40, 10, 'Salon', 1, 0, 'C');
        $pdf->Cell(40, 10, 'Materia', 1, 0, 'C');
        $pdf->Cell(40, 10, 'Profesor', 1, 0, 'C');
        $pdf->Cell(20, 10, 'Cupo', 1, 0, 'C');
        $pdf->Cell(40, 10, 'Horario', 1, 1, 'C');

        // Obtener todas las clases
        $resultado = Clase::obtenerTodas($conexion);

        // Iterar sobre los resultados de las clases y mostrarlas en el PDF
        while ($row = $resultado->fetch_assoc()) {
            $pdf->Cell(30, 10, $row['id'], 1, 0, 'C');
            $pdf->Cell(40, 10, $row['salon'], 1, 0, 'C');
            $pdf->Cell(40, 10, $row['materia'], 1, 0, 'C');
            $pdf->Cell(40, 10, $row['profesor'], 1, 0, 'C');
            $pdf->Cell(20, 10, $row['cupo'], 1, 0, 'C');
            $pdf->Cell(40, 10, $row['horario'], 1, 1, 'C');
        }

        // Output del PDF para descargar
        $pdf->Output('D', 'Clases_' . date('Y-m-d') . '.pdf');
        echo '<script>
        window.location.href="../Boundary/Admin/PantallaGestionClases.php";
        </script>';
    }
?>

