<?php
namespace Entity;
class Clase
{
    private $materia; // materia
    private $Profesor;
    private $Cupo;
    private $salonClase;
    private $Horario;
    // Getters

    /**
     * @param $materia String
     * @param $Profesor String
     * @param $Cupo int
     * @param $Salon_Clase String
     * @param $Horario String
     */
    public function __construct($materia, $Profesor, $Cupo, $Salon_Clase, $Horario)
    {
        $this->materia = $materia;
        $this->Profesor = $Profesor;
        $this->Cupo = $Cupo;
        $this->salonClase = $Salon_Clase;
        $this->Horario = $Horario;
    }

    public function getMateria(): string
    {
        return $this->materia;
    }

    public function setMateria(string $materia): void
    {
        $this->materia = $materia;
    }

    public function getProfesor(): string
    {
        return $this->Profesor;
    }

    public function setProfesor(string $Profesor): void
    {
        $this->Profesor = $Profesor;
    }

    public function getCupo(): int
    {
        return $this->Cupo;
    }

    public function setCupo(int $Cupo): void
    {
        $this->Cupo = $Cupo;
    }

    public function getSalonClase(): string
    {
        return $this->salonClase;
    }

    public function setSalonClase(string $salonClase): void
    {
        $this->salonClase = $salonClase;
    }

    public function getHorario(): string
    {
        return $this->Horario;
    }

    public function setHorario(string $Horario): void
    {
        $this->Horario = $Horario;
    }

    public function guardar($conexion) {
        $stmt = $conexion->prepare("INSERT INTO clases (salon, materia, profesor, cupo, horario) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sssds", $this->salonClase, $this->materia, $this->Profesor, $this->Cupo, $this->Horario);
        return $stmt->execute();
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