<?php
    class GetController
    {
        public function GetData($tabla)
        {
            $response = GetModel::GetData($tabla);

            if(!empty($response))
            {
                $json = array(
                    "status" => 200,
                    "result" => $response
                );

            }else{
                $json = array(
                    "status" => 404,
                    "result" => "Not Found"
                );

            }

           
            echo json_encode($json, http_response_code($json["status"]));
            return;

        }

        public function GetDataFilter($datos)
        {
            $response = GetModel::GetDataFilter($datos);

            if(!empty($response))
            {
                $json = array(
                    "status" => 200,
                    "total registros" =>count($response),
                    "result" => $response
                );

            }else{
                $json = array(
                    "status" => 404,
                    "result" => "Not Found"
                );

            }

            echo json_encode($json, http_response_code($json["status"]));
            return;

        }
    }

?>