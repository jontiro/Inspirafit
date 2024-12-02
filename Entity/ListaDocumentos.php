<?php

class ListaDocumentos{

    private $id;
    private $nombre;
    private $apellidoP;
    private $archivoPDF;

    public function __construct($id, $nombre, $apellidoP, $archivoPDF){
        $this->id = $id;
        $this->nombre = $nombre;
        $this->apellidoP = $apellidoP;
        $this->archivoPDF = $archivoPDF;
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
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * @param mixed $nombre
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    /**
     * @return mixed
     */
    public function getApellidoP()
    {
        return $this->apellidoP;
    }

    /**
     * @param mixed $apellidoP
     */
    public function setApellidoP($apellidoP)
    {
        $this->apellidoP = $apellidoP;
    }

    /**
     * @return mixed
     */
    public function getArchivoPDF()
    {
        return $this->archivoPDF;
    }

    /**
     * @param mixed $archivoPDF
     */
    public function setArchivoPDF($archivoPDF)
    {
        $this->archivoPDF = $archivoPDF;
    }

}

?>