<?php

namespace Control;
require_once '../Entity/ListaUsuarios.php';

use Entity\ListaUsuarios;

class ControlLogin
{
    private array $usuarios;

    public function __construct(array $usuarios)
    {
        // Asegurarse de que se reciba un array de objetos ListaUsuarios
        foreach ($usuarios as $usuario) {
            if (!$usuario instanceof ListaUsuarios) {
                throw new \InvalidArgumentException("Todos los elementos deben ser instancias de ListaUsuarios.");
            }
        }
        $this->usuarios = $usuarios;
    }

    /**
     * Método para validar el login.
     *
     * @param string $email
     * @param string $password
     * @return bool
     */
    public function login(string $email, string $password): bool
    {
        // Validar entradas
        if (empty($email) || empty($password)) {
            throw new \InvalidArgumentException("El email y la contraseña no pueden estar vacíos.");
        }

        // Buscar el usuario por email
        foreach ($this->usuarios as $usuario) {
            if ($usuario->getEmail() === $email) {
                // Verificar la contraseña
                if (password_verify($password, $usuario->getPasswordHash())) {
                    // Inicio de sesión exitoso
                    return true;
                }
            }
        }

        // Si no se encuentra el usuario o la contraseña no coincide
        return false;
    }

    /**
     * Metodo para manejar la lógica de procesamiento de login.
     *
     * @param array $postData
     * @return string|void
     */
    public function handleLogin(array $postData): void
    {
        $correo = $postData['correo'] ?? '';
        $password = $postData['Contraseña'] ?? '';

        // Intentar iniciar sesión
        try {
            if ($this->login($correo, $password)) {
                // Si el login es exitoso, iniciar sesión y redirigir
                session_start();
                $_SESSION['logged_in'] = true;
                $_SESSION['email'] = $correo;

                foreach ($this->usuarios as $usuario) {
                    if ($usuario->getEmail() === $correo) {
                        // Obtener el rol del usuario
                        $rol = $usuario->getRol();
                        break;  // Una vez que encontramos el usuario, salimos del bucle
                    }
                }

                // Redirigir al administrador o al dashboard
                if($rol === 1) header('Location: ../Boundary/Admin/menuAdministrador.html');
                else if($rol === 2) header('Location: ../Boundary/Profesor/menuProfesor.html');
                else if($rol === 3) header('Location: ../Boundary/Alumno/menuAlumno.html');
                exit();
            } else {
                // Si las credenciales son incorrectas, devolver error
                $_SESSION['error'] = "Email o contraseña incorrectos.";
                header('Location: ../Boundary/login.html');
                exit();
            }
        } catch (\Exception $e) {
            // Si hay un error, capturarlo y devolver el mensaje
            $_SESSION['error'] = "Error: " . $e->getMessage();
            header('Location: ../Boundary/login.html');
            exit();
        }
    }
}

// Si el formulario es enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Crear usuarios de ejemplo (esto se reemplazaría con datos de una base de datos)
    $usuarios = [
        new ListaUsuarios(1, 'admin@example.com', password_hash('password123', PASSWORD_DEFAULT), 1),
        new ListaUsuarios(2, 'profe@example.com', password_hash('profe456', PASSWORD_DEFAULT), 2),
        new ListaUsuarios(3, 'user@example.com', password_hash('userpass456', PASSWORD_DEFAULT), 3)
    ];

    // Crear el controlador de login
    $controlLogin = new ControlLogin($usuarios);

    // Llamar al método handleLogin con los datos recibidos del formulario
    $controlLogin->handleLogin($_POST);
}
?>

