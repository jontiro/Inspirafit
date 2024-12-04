<?php
class Paquete {
    private $nombre;
    private $fecha_inicio;
    private $fecha_vencimiento;
    private $costo;
    private $numero_clases;

    public function __construct($nombre, $fecha_inicio, $fecha_vencimiento, $costo, $numero_clases) {
        $this->nombre = $nombre;
        $this->fecha_inicio = $fecha_inicio;
        $this->fecha_vencimiento = $fecha_vencimiento;
        $this->costo = $costo;
        $this->numero_clases = $numero_clases;
    }

    public function guardar($conexion) {
        $query = "INSERT INTO paquetes (nombre_paquete, fecha_inicio, fecha_vencimiento, costo, numero_clases) VALUES (?, ?, ?, ?, ?)";
        $stmt = $conexion->prepare($query);

        if ($stmt === false) {
            die("Error en la preparación de la consulta: " . $conexion->error);
        }

        $stmt->bind_param("sssss", $this->nombre, $this->fecha_inicio, $this->fecha_vencimiento, $this->costo, $this->numero_clases);

        if ($stmt->execute()) {
            return true;
        } else {
            echo "Error al crear el paquete: " . $stmt->error;
            return false;
        }

        $stmt->close();
    }

    
    public static function eliminar($conexion, $id) {
        $query = "DELETE FROM paquetes WHERE id = ?";
        $stmt = $conexion->prepare($query);
    
        if ($stmt === false) {
            die("Error en la preparación de la consulta: " . $conexion->error);
        }
    
        $stmt->bind_param("i", $id);
    
        if ($stmt->execute()) {
            return true;
        } else {
            echo "Error al eliminar el paquete: " . $stmt->error;
            return false;
        }
    
        $stmt->close();
    }
    
}
?>
