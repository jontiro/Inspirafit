<?php

class Avance{
    private $nombre;
    private $clase;
    private $comentario;

    // Getters
    public function getNombre() {
        return $this->nombre;
    }

    public function getClase() {
        return $this->clase;
    }

    public function getComentario() {
        return $this->comentario;
    }

    // Setters
    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function setClase($clase) {
        $this->clase = $clase;
    }

    public function setComentario($comentario) {
        $this->comentario = $comentario;
    }


}
?>