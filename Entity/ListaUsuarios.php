<?php
namespace Entity;
class ListaUsuarios{
private $id;
private $email;
private $passwordHash;
private $rol;

const ROL_ADMIN = 1;
const ROL_PROFE = 2;
const ROL_ALUMNO = 3;

public function __construct($id, $email, $passwordHash, $rol){
    $this->id = $id;
    $this->email = $email;
    $this->passwordHash = $passwordHash;
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
    public function getPasswordHash()
    {
        return $this->passwordHash;
    }

    /**
     * @param mixed $passwordHash
     */
    public function setPasswordHash($passwordHash)
    {
        $this->passwordHash = $passwordHash;
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