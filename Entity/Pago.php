<?php

class Pago{
    private $clase;
    private $concepto_pago;
    private $cantidad_pago;
    private $fecha;
    private $folio;
    private $servicio;
    private $comprobante;

// Getters
    public function getClase() {
        return $this->clase;
    }

    public function getConceptoPago() {
        return $this->concepto_pago;
    }

    public function getCantidadPago() {
        return $this->cantidad_pago;
    }

    public function getFecha() {
        return $this->fecha;
    }

    public function getFolio() {
        return $this->folio;
    }

    public function getServicio() {
        return $this->servicio;
    }

    public function getComprobante() {
        return $this->comprobante;
    }

// Setters
    public function setClase($clase) {
        $this->clase = $clase;
    }

    public function setConceptoPago($concepto_pago) {
        $this->concepto_pago = $concepto_pago;
    }

    public function setCantidadPago($cantidad_pago) {
        $this->cantidad_pago = $cantidad_pago;
    }

    public function setFecha($fecha) {
        $this->fecha = $fecha;
    }

    public function setFolio($folio) {
        $this->folio = $folio;
    }

    public function setServicio($servicio) {
        $this->servicio = $servicio;
    }

    public function setComprobante($comprobante) {
        $this->comprobante = $comprobante;
    }

}
?>