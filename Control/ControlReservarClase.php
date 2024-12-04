<?php

namespace Control;
include_once (__DIR__.'/../Entity/Reserva.php');
session_start();
include_once(__DIR__.'/../conf/BaseDatos.php');

use Entity\Reserva;

// Inicializar el mensaje
$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
// Crear un objeto Alumno
$reserva = new Reserva();

// Asignar valores del formulario
$NRC->setNRC($_POST['NRC']);


?>
