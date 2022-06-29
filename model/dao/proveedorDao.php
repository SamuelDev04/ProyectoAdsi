<?php
class ProveedorModel{
    private $idProveedor;
    private $nombre;
    private $numeroTelefono;
    private $direccion;

    public function __construct($objDtoProveedor)
    {
        $this -> idProveedor = $objDtoProveedor -> getIdProve();
        $this -> nombre = $objDtoProveedor -> getNom();
        $this -> numeroTelefono = $objDtoProveedor -> getNumTel();
        $this -> direccion = $objDtoProveedor -> getDireccion();
    }

    public function mIdInsertProveedor()
    {
        $sql = "CALL spInsertarProveedor(?, ?, ?);";
        $estado = false;
        try {
            $objCon = new Conexion();
            $stmt = $objCon -> getConec() -> prepare($sql);
            $stmt -> bindParam(1, $this -> nombre,   PDO::PARAM_STR);
            $stmt -> bindParam(2, $this -> numeroTelefono,      PDO::PARAM_INT);
            $stmt -> bindParam(3, $this -> direccion,     PDO::PARAM_STR);
            $estado = $stmt -> execute();
        } catch (PDOexception $e) {
            echo "Error al insertar productos" . $e -> getMessage();
        }
        return $estado;
    }

    public function mIdEraseProveedor()
    {
        $respon = false;
        $sql = "CALL spBorrarProveedor(?)";
        
        try {
            $objCon = new Conexion;
            $stmt = $objCon -> getConec() -> prepare($sql);
            $stmt -> bindParam(1, $this-> idProveedor, PDO::PARAM_INT);
            $stmt -> execute();
            $respon = true;
        } catch (PDOException $e) {
            echo "Ha ocurrido un error al eliminar los registros en el dao " .$e -> getMessage();
        }
        return $respon;
    }

    public function mIdSearchAllProveedor()
    {
        $sql = "call spSearchAllProveedor()";

        try {
            $objCon = new Conexion;
            $stmt = $objCon -> getConec() -> prepare($sql);
            $stmt -> execute();
            $respon = $stmt;
        } catch (PDOException $e) {
            echo "Ha ocurrido un error al mostrar los datos en el dao " .$e -> getMessage();
        }

        return $respon;
    }

    public function mIdUpdateProveedor()
    {
        $sql = "CALL spUpdateProveedor(?, ?, ?, ?);";
        $estado = false;

        try {
            $objCon = new Conexion();
            $stmt = $objCon->getConec()->prepare($sql);
            $stmt->bindParam(1, $this-> idProveedor,         PDO::PARAM_INT);
            $stmt->bindParam(2, $this-> nombre,    PDO::PARAM_STR);
            $stmt->bindParam(3, $this-> numeroTelefono,       PDO::PARAM_INT);
            $stmt->bindParam(4, $this-> direccion,      PDO::PARAM_STR);
            $estado = $stmt->execute();
        } catch (PDOexception $e) {
            echo "Error al modificar el proveedor " . $e->getMessage();
        }
        return $estado;
    }

}
