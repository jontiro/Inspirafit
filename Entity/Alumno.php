<?php

class Alumno{
     private $clase;
     private $nombre;
     private $apellidoP;
     private $apellidoM;
     private $disciplinas_previas;
     private $domicilio;
     private $telefono;
     private $edad;
     private $email;
     private $fecha_nacimiento;
     private $lugar_nacimiento;
     private $peso;
     private $estatura;
     private $nivel_estudios;
     private $lugar_estudios;
     private $profesion;
     private $lugar_ejerce;
     private $puesto;
     private $problemas_salud;
     private $disciplinas_interes;
     private $fecha_ingreso;

// Getters
   public function getPContrasena() {
        return $this->clase;
   }    

    public function getNombre() {
        return $this->nombre;
    }

    public function getApellidoP() {
        return $this->apellidoP;
    }

    public function getApellidoM() {
        return $this->apellidoM;
    }

    public function getDisciplinasPrevias() {
        return $this->disciplinas_previas;
    }

    public function getDomicilio() {
        return $this->domicilio;
    }

    public function getTelefono() {
        return $this->telefono;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getFechaNacimiento() {
        return $this->fecha_nacimiento;
    }

    public function getLugarNacimiento() {
        return $this->lugar_nacimiento;
    }

    public function getPeso() {
        return $this->peso;
    }

    public function getEstatura() {
        return $this->estatura;
    }

    public function getNivelEstudios() {
        return $this->nivel_estudios;
    }

    public function getLugarEstudios() {
        return $this->lugar_estudios;
    }

    public function getProfesion() {
        return $this->profesion;
    }

    public function getLugarEjerce() {
        return $this->lugar_ejerce;
    }

    public function getPuesto() {
        return $this->puesto;
    }

    public function getProblemasSalud() {
        return $this->problemas_salud;
    }

    public function getDisciplinasInteres() {
        return $this->disciplinas_interes;
    }

    public function getFechaIngreso() {
        return $this->fecha_ingreso;
    }

    // Setters
    public function setPContrasena($contrasena) {
        $this->clase = $contrasena;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function setApellidoP($apellidoP) {
        $this->apellidoP = $apellidoP;
    }

    public function setApellidoM($apellidoM) {
        $this->apellidoM = $apellidoM;
    }

    public function setDisciplinasPrevias($disciplinas_previas) {
        $this->disciplinas_previas = $disciplinas_previas;
    }

    public function setDomicilio($domicilio) {
        $this->domicilio = $domicilio;
    }

    public function setTelefono($telefono) {
        $this->telefono = $telefono;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function setFechaNacimiento($fecha_nacimiento) {
        $this->fecha_nacimiento = $fecha_nacimiento;
    }

    public function setLugarNacimiento($lugar_nacimiento) {
        $this->lugar_nacimiento = $lugar_nacimiento;
    }

    public function setPeso($peso) {
        $this->peso = $peso;
    }

    public function setEstatura($estatura) {
        $this->estatura = $estatura;
    }

    public function setNivelEstudios($nivel_estudios) {
        $this->nivel_estudios = $nivel_estudios;
    }

    public function setLugarEstudios($lugar_estudios) {
        $this->lugar_estudios = $lugar_estudios;
    }

    public function setProfesion($profesion) {
        $this->profesion = $profesion;
    }

    public function setLugarEjerce($lugar_ejerce) {
        $this->lugar_ejerce = $lugar_ejerce;
    }

    public function setPuesto($puesto) {
        $this->puesto = $puesto;
    }

    public function setProblemasSalud($problemas_salud) {
        $this->problemas_salud = $problemas_salud;
    }

    public function setDisciplinasInteres($disciplinas_interes) {
        $this->disciplinas_interes = $disciplinas_interes;
    }

    public function getEdad()
    {
        return $this->edad;
    }

    public function setEdad($edad)
    {
        $this->edad = $edad;
    }

    public function setFechaIngreso($fecha_ingreso) {
        $this->fecha_ingreso = $fecha_ingreso;
    }


}

?>

