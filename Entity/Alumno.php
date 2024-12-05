<?php
namespace Entity;
class Alumno{
    private $contrasena;
    private $nombre;
    private $apellidoP;
    private $apellidoM;
    private $disciplinas_previas;
    private $domicilio;
    private $telefono;
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
   

// Constructor
public function __construct() {
    // Generar una contraseña por defecto
    $this->contrasena = $this->generarContrasenaPredeterminada();
}

// Método para generar una contraseña predeterminada
private function generarContrasenaPredeterminada() {
    // Puedes usar una contraseña fija o generar una aleatoria
    return bin2hex(random_bytes(4)); // Genera una contraseña aleatoria de 8 caracteres
}


  // Métodos set
  public function setContrasena($contrasena) {
    $this->contrasena = $contrasena;
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

public function setlugarEjerce($lugar_ejerce) {
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

public function setFechaIngreso($fecha_ingreso) {
    $this->fecha_ingreso = $fecha_ingreso;
}


// Métodos get
public function getContrasena() {
    return $this->contrasena;
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



    // Función para guardar en la base de datos
    public function guardar($db) {
        try {
            // Preparar la consulta SQL
            $query = "INSERT INTO alumno (
                contrasena, nombre, apellidoP, apellidoM, disciplinas_previas, domicilio,
                telefono, email, fecha_nacimiento, lugar_nacimiento, peso, estatura,
                nivel_estudios, lugar_estudios, profesion, lugar_ejerce, puesto,
                problemas_salud, disciplinas_interes, fecha_ingreso, archivoPDF
            ) VALUES (
                ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?
            )";

            // Preparar la declaración
            $stmt = $db->prepare($query);

            if (!$stmt) {
                return "Error al preparar la consulta: " . $db->error;
            }

            // Vincular parámetros
            $stmt->bind_param(
                'ssssssssssddsssssssss',
                $this->contrasena,
                $this->nombre,
                $this->apellidoP,
                $this->apellidoM,
                $this->disciplinas_previas,
                $this->domicilio,
                $this->telefono,
                $this->email,
                $this->fecha_nacimiento,
                $this->lugar_nacimiento,
                $this->peso,
                $this->estatura,
                $this->nivel_estudios,
                $this->lugar_estudios,
                $this->profesion,
                $this->lugar_ejerce,
                $this->puesto,
                $this->problemas_salud,
                $this->disciplinas_interes,
                $this->fecha_ingreso,
                $this->archivoPDF
            );

            // Ejecutar la consulta
            if ($stmt->execute()) {
                return "Alumno guardado exitosamente.";
            } else {
                return "Error al guardar el alumno: " . $stmt->error;
            }
        } catch (Exception $e) {
            return "Error: " . $e->getMessage();
        }
    }
}

?>
