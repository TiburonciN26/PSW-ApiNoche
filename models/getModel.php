<?php
    require_once("conexion.php");
    class GetModel
    {
        private static $tablasPermitidas = ["categories", "products", "users", "sales", "orders"];
        static public function GetData($tabla)
        {
            if(!in_array($tabla, self::$tablasPermitidas))
            {
                return ["error" => "Tabla no permitida"];
            }
            $stmt = Conexion::Connect()->prepare("SELECT * FROM $tabla");
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
            
        }

        static public function GetDataFilter($datos)
        {
            if(!in_array($datos['tabla'], self::$tablasPermitidas))
            {
                return ["error" => "Tabla no permitida"];
            }
           
            $stmt = Conexion::Connect()->prepare("SELECT * FROM {$datos['tabla']} WHERE {$datos['campo']} = :valor");
            $stmt->bindParam(":valor", $datos["valor"], PDO::PARAM_STR);
            
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
            
        }
    }

?>