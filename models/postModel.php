<?php
require_once "conexion.php";
class PostModel
{
    static public function PostData($tabla, $datos)
    {
        /* echo '<pre>';
        print_r($datos);
        echo '<pre>';
        return; */
        $stm = Conexion::Connect()->prepare("INSERT INTO categories( name_category,
         title_list_category, url_category, image_category, icon_category, views_category,
          date_created_category) VALUES (:name_category,
         :title_list_category, :url_category, :image_category, :icon_category, :views_category,
          :date_created_category)");
          $stm->bindParam(":name_category", $datos["name_category"], PDO::PARAM_STR);
          $stm->bindParam(":title_list_category", $datos["title_list_category"], PDO::PARAM_STR);
          $stm->bindParam(":url_category", $datos["url_category"], PDO::PARAM_STR);
          $stm->bindParam(":image_category", $datos["image_category"], PDO::PARAM_STR);
          $stm->bindParam(":icon_category", $datos["icon_category"], PDO::PARAM_STR);
          $stm->bindParam(":views_category", $datos["views_category"], PDO::PARAM_STR);
          $stm->bindParam(":date_created_category", $datos["date_created_category"], PDO::PARAM_STR);
          if($stm->execute()){
            return "Registros satisfactorios";
          }else{
            return Conexion::Connect()->errorInfo();
          }
    }
}
