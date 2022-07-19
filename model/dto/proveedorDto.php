<?php
class Proveedor{
    private $idProveeedor;
    private $nombre;
    private $numeroTelefono;
    private $direccion;

    /***********************/
    /**      Getters      **/
    /***********************/
    public function getIdProve()
    {
        return $this -> idProveeedor;
    }
    public function getNom()
    {
        return $this -> nombre;
    }
    public function getNumTel()
    {
        return $this -> numeroTelefono;
    }
    public function getDireccion()
    {
        return $this -> direccion;
    }
  
    /***********************/
    /**      Setters      **/
    /***********************/

    public function setIdProve($idProveeedor)
    {
        $this -> idProveeedor = $idProveeedor;
    }
    public function setNom($nombre)
    {
        $this -> nombre = $nombre;
    }
    public function setNumtel($numeroTelefono)
    {
        $this -> numeroTelefono = $numeroTelefono;
    }
    public function setDireccion($direccion)
    {
        $this -> direccion = $direccion;
    }
    
}


?>