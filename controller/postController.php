<?php   
class PosController{
    public function PostData($tabla, $datos){
        $response = PostModel::PostData($tabla, $datos);
        
        $json = array(
                    "status" => 200,
                    "result" => $response
            );
            echo json_encode($json, http_response_code($json["status"]));
            return;
    };
}