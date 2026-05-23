<?php
    class Conexion
    {
        //necesito almacenar para reutilizar
        static public function Connect()
        {
           	try{

                $link = new PDO("mysql:host=localhost;dbname=storenoche","root", "");

                $link->exec("set names utf8");

            }catch(PDOException $e){

                die("Error: ".$e->getMessage());

            }

            return $link;

        }

    }

?>