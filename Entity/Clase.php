<?php
namespace Entity;
class Clase
{
    private $materia;
    private $profesor;
    private $cupo;
    private $salon;
    private $horario;
    // Getters

    /**
     * @param $materia String
     * @param $profesor String
     * @param $cupo int
     * @param $salon String
     * @param $horario String
     */

    public function __construct($materia, $profesor, $cupo, $salon, $horario){
        $this->materia = $materia;
        $this->profesor = $profesor;
        $this->cupo = $cupo;
        $this->salon = $salon;
        $this->horario = $horario;
    }

    public function getMateria()
    {
        return $this->materia;
    }

    public function setMateria($materia)
    {
        $this->materia = $materia;
    }

    public function getProfesor()
    {
        return $this->profesor;
    }

    public function setProfesor(string $profesor)
    {
        $this->profesor = $profesor;
    }

    public function getCupo()
    {
        return $this->cupo;
    }

    public function setCupo(int $cupo)
    {
        $this->cupo = $cupo;
    }

    public function getSalon()
    {
        return $this->salon;
    }

    public function setSalon(string $salon)
    {
        $this->salon = $salon;
    }

    public function getHorario()
    {
        return $this->horario;
    }

    public function setHorario(string $horario)
    {
        $this->horario = $horario;
    }






    public function guardar($db) {
        try{
        $query = "INSERT INTO clases (salon, materia, profesor, 
                    cupo, horario) VALUES (?, ?, ?, ?, ?)";

        $stmt = $db->prepare($query);

        if (!$stmt) return "Error al preparar la consulta: " . $db->error;

        $stmt->bind_param("sssis", $this->salon, $this->materia,
            $this->profesor, $this->cupo, $this->horario);

        // Ejecutar la consulta
        if ($stmt->execute()) return "Clase guardada exitosamente.";
        else return "Error al guardar la clase: " . $stmt->error;

        } catch (Exception $e) {
            return "Error: " . $e->getMessage();
        }
    }

    public static function obtenerTodas($conexion) {
        return $conexion->query("SELECT * FROM clases");
    }

    public static function eliminar($conexion, $id) {
        $stmt = $conexion->prepare("DELETE FROM clases WHERE id = ?");
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }
}
?>