<?php

class Profesor {
    private $pContrasena;
    private $pNombre;
    private $pApellidoP;
    private $pApellidoM;
    private $pDisciplinas_Previas;
    private $pDomicilio;
    private $pTelefono;
    private $pEmail;
    private $pFecha_Nacimiento;
    private $pLugar_Nacimiento;
    private $pPeso;
    private $pEstatura;
    private $pNivel_Estudios;
    private $pLugar_Estudios;
    private $pProfesion;
    private $pProblemasSalud;
    private $pDisciplinas_Impartir;
    private $pFechaIngreso;

    // Getters y Setters (agregados los métodos de acceso y modificación)
    public function getPContrasena() { return $this->pContrasena; }
    public function setPContrasena($pContrasena) { $this->pContrasena = $pContrasena; }

    public function getPNombre() { return $this->pNombre; }
    public function setPNombre($pNombre) { $this->pNombre = $pNombre; }

    public function getPApellidoP() { return $this->pApellidoP; }
    public function setPApellidoP($pApellidoP) { $this->pApellidoP = $pApellidoP; }

    public function getPApellidoM() { return $this->pApellidoM; }
    public function setPApellidoM($pApellidoM) { $this->pApellidoM = $pApellidoM; }

    public function getPDisciplinas_Previas() { return $this->pDisciplinas_Previas; }
    public function setPDisciplinas_Previas($pDisciplinas_Previas) { $this->pDisciplinas_Previas = $pDisciplinas_Previas; }

    public function getPDomicilio() { return $this->pDomicilio; }
    public function setPDomicilio($pDomicilio) { $this->pDomicilio = $pDomicilio; }

    public function getPTelefono() { return $this->pTelefono; }
    public function setPTelefono($pTelefono) { $this->pTelefono = $pTelefono; }

    public function getPEmail() { return $this->pEmail; }
    public function setPEmail($pEmail) { $this->pEmail = $pEmail; }

    public function getPFecha_Nacimiento() { return $this->pFecha_Nacimiento; }
    public function setPFecha_Nacimiento($pFecha_Nacimiento) { $this->pFecha_Nacimiento = $pFecha_Nacimiento; }

    public function getPLugar_Nacimiento() { return $this->pLugar_Nacimiento; }
    public function setPLugar_Nacimiento($pLugar_Nacimiento) { $this->pLugar_Nacimiento = $pLugar_Nacimiento; }

    public function getPPeso() { return $this->pPeso; }
    public function setPPeso($pPeso) { $this->pPeso = $pPeso; }

    public function getPEstatura() { return $this->pEstatura; }
    public function setPEstatura($pEstatura) { $this->pEstatura = $pEstatura; }

    public function getPNivel_Estudios() { return $this->pNivel_Estudios; }
    public function setPNivel_Estudios($pNivel_Estudios) { $this->pNivel_Estudios = $pNivel_Estudios; }

    public function getPLugar_Estudios() { return $this->pLugar_Estudios; }
    public function setPLugar_Estudios($pLugar_Estudios) { $this->pLugar_Estudios = $pLugar_Estudios; }

    public function getPProfesion() { return $this->pProfesion; }
    public function setPProfesion($pProfesion) { $this->pProfesion = $pProfesion; }

    public function getPProblemasSalud() { return $this->pProblemasSalud; }
    public function setPProblemasSalud($pProblemasSalud) { $this->pProblemasSalud = $pProblemasSalud; }

    public function getPDisciplinas_Impartir() { return $this->pDisciplinas_Impartir; }
    public function setPDisciplinas_Impartir($pDisciplinas_Impartir) { $this->pDisciplinas_Impartir = $pDisciplinas_Impartir; }

    public function getPFechaIngreso() { return $this->pFechaIngreso; }
    public function setPFechaIngreso($pFechaIngreso) { $this->pFechaIngreso = $pFechaIngreso; }

    // Método para guardar en la base de datos (ejemplo)
    public function guardar($conexion) {
        // Implementación de la lógica de guardado en la base de datos
        return "Profesor registrado correctamente.";
    }
}
?>