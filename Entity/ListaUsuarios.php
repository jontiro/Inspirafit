<?php

class ListaUsuarios{
private $id;
private $email;
private $password;
private $rol;

const ROL_ADMIN = 1;
const ROL_PROFE = 2;
const ROL_ALUMNO = 3;

public function __construct($id, $email, $password, $rol){
    $this->id = $id;
    $this->email = $email;
    $this->password = password_hash($password, PASSWORD_BCRYPT);
    $this->rol = $rol;
}

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $this->password = password_hash($password, PASSWORD_BCRYPT);
    }

    /**
     * @return mixed
     */
    public function getRol()
    {
        return $this->rol;
    }

    /**
     * @param mixed $rol
     */
    public function setRol($rol)
    {
        $this->rol = $rol;
    }


}

?>