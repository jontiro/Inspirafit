<?php
class ListaDocumentosDeslinde {
    private $conexion;

    public function __construct($db) {
        $this->conexion = $db;
    }

    public function obtenerAlumnos() {
        $query = "SELECT id, nombre, archivoPDF FROM alumno";
        return $this->conexion->query($query);
    }

    public function guardarPDF($idAlumno, $rutaPDF) {
        $sql = "UPDATE alumno SET archivoPDF = ? WHERE id = ?";
        $stmt = $this->conexion->prepare($sql);
        if ($stmt) {
            $stmt->bind_param('si', $rutaPDF, $idAlumno);
            if ($stmt->execute()) {
                return true;
            }
            $stmt->close();
        }
        return false;
    }

    public function eliminarPDF($idAlumno) {
        $sql = "UPDATE alumno SET archivoPDF = NULL WHERE id = ?";
        $stmt = $this->conexion->prepare($sql);
        if ($stmt) {
            $stmt->bind_param('i', $idAlumno);
            if ($stmt->execute()) {
                return true;
            }
            $stmt->close();
        }
        return false;
    }
}
?>
