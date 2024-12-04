<?php
include_once(__DIR__ . '/../conf/BaseDatos.php');
include_once(__DIR__ . '/../Entidades/ListaDocumentosDeslinde.php');

class Recurso {
    private $conexion;

    public function __construct($conexion) {
        $this->conexion = $conexion;
    }

    // Método para agregar un recurso (documento o enlace) a un alumno
    public function agregarRecurso($idAlumno, $tipo, $rutaArchivo = null, $enlace = null) {
        // Validación de tipo de recurso
        if ($tipo !== 'documento' && $tipo !== 'enlace') {
            echo "Tipo de recurso inválido.";
            return false;
        }

        if ($tipo === 'documento') {
            // Verificar que la ruta del archivo no esté vacía
            if (empty($rutaArchivo)) {
                echo "Ruta del archivo no proporcionada.";
                return false;
            }
            // Guardar en la base de datos
            $query = "INSERT INTO recursos (id_alumno, tipo, archivo, enlace) VALUES (?, ?, ?, NULL)";
            $stmt = $this->conexion->prepare($query);
            $stmt->bind_param("iss", $idAlumno, $tipo, $rutaArchivo);
        } elseif ($tipo === 'enlace') {
            // Verificar que el enlace sea válido
            if (empty($enlace) || !filter_var($enlace, FILTER_VALIDATE_URL)) {
                echo "Enlace no válido.";
                return false;
            }
            // Guardar en la base de datos
            $query = "INSERT INTO recursos (id_alumno, tipo, archivo, enlace) VALUES (?, ?, NULL, ?)";
            $stmt = $this->conexion->prepare($query);
            $stmt->bind_param("iss", $idAlumno, $tipo, $enlace);
        }

        if ($stmt->execute()) {
            $this->enviarNotificacion($idAlumno, $tipo, $rutaArchivo, $enlace);
            return true;
        } else {
            echo "Error al agregar el recurso: " . $stmt->error;
            return false;
        }
    }

    // Método para enviar una notificación por correo
    private function enviarNotificacion($idAlumno, $tipo, $rutaArchivo = null, $enlace = null) {
        // Consultar el correo del alumno desde la base de datos
        $query = "SELECT email FROM alumnos WHERE id = ?";
        $stmt = $this->conexion->prepare($query);
        $stmt->bind_param("i", $idAlumno);
        $stmt->execute();
        $result = $stmt->get_result();
        $alumno = $result->fetch_assoc();

        if ($alumno) {
            $correo = $alumno['email'];
            $asunto = "Nueva recomendación del profesor";
            $mensaje = "Tienes una nueva recomendación del profesor.\n\n";

            if ($tipo === 'documento') {
                $mensaje .= "Se ha cargado un nuevo documento: " . $rutaArchivo;
            } elseif ($tipo === 'enlace') {
                $mensaje .= "Se ha cargado un nuevo enlace: " . $enlace;
            }

            $headers = "From: no-reply@escueladeportiva.com\r\n";
            $headers .= "Content-Type: text/plain; charset=utf-8";

            mail($correo, $asunto, $mensaje, $headers);
        }
    }
}
?>
