<?php

class Clase{
    private $nombreC;
    private $fechaInicio;
    private $fechaTermino;
    private $Profesor;
    private $Costo;
    private $salonClase;
    private $Horario;
    private $NRC;

    // Getters

    /**
     * @param $nombreC String
     * @param $Fecha_inicio Date
     * @param $Fecha_termino Date
     * @param $Profesor String
     * @param $Costo Float
     * @param $Salon_Clase String
     * @param $Horario Date
     * @param $NRC Int
     */
    public function __construct($nombreC, $Fecha_inicio, $Fecha_termino, $Profesor, $Costo, $Salon_Clase, $Horario, $NRC)
    {
        $this->nombreC = $nombreC;
        $this->fechaInicio = $Fecha_inicio;
        $this->fechaTermino = $Fecha_termino;
        $this->Profesor = $Profesor;
        $this->Costo = $Costo;
        $this->salonClase = $Salon_Clase;
        $this->Horario = $Horario;
        $this->NRC = $NRC;
    }

    public function getNombreC() {
        return $this->nombreC;
    }

    public function getFechaInicio() {
        return $this->fechaInicio;
    }

    public function getFechaTermino() {
        return $this->fechaTermino;
    }

    public function getProfesor() {
        return $this->Profesor;
    }

    public function getCosto() {
        return $this->Costo;
    }

    public function getSalonClase() {
        return $this->salonClase;
    }

    public function getHorario() {
        return $this->Horario;
    }

    public function getNRC()
    {
        return $this->NRC;
    }

    public function setNRC($NRC)
    {
        $this->NRC = $NRC;
    }


// Setters
    public function setNombreC($nombreC) {
        $this->nombreC = $nombreC;
    }

    public function setFechaInicio($fechaInicio) {
        $this->fechaInicio = $fechaInicio;
    }

    public function setFechaTermino($fechaTermino) {
        $this->fechaTermino = $fechaTermino;
    }

    public function setProfesor($Profesor) {
        $this->Profesor = $Profesor;
    }

    public function setCosto($Costo) {
        $this->Costo = $Costo;
    }

    public function setSalonClase($salonClase) {
        $this->salonClase = $salonClase;
    }

    public function setHorario($Horario) {
        $this->Horario = $Horario;
    }

}

?>