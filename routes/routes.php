<?php
    $routesArray = $_SERVER["REQUEST_URI"];
    $routesArray = explode("/", $routesArray);
    $routesArray = array_filter($routesArray);
    

    if(count($routesArray)==1)
    {
        $json = array(
                    "status" => 404,
                    "result" => "No Found"
        );

        echo json_encode($json, http_response_code($json["status"]));
        return;

        
    }else{
        //ACCEDIENDO POR EL METODO GET
        if(count($routesArray) == 2 &&
            isset($_SERVER["REQUEST_METHOD"]) &&
            $_SERVER["REQUEST_METHOD"] == "GET"){
            
            //consulta con filtro
            if(isset($_GET["campo"]) && isset($_GET["valor"]))
            {
                 $arrayDatos = array(
                    "tabla" => explode("?", $routesArray[2])[0],
                    "campo" => $_GET["campo"],
                    "valor" => $_GET["valor"]
    
                );
                //echo json_encode($arrayDatos);
                //return;
                $response = new GetController();
                $response->GetDataFilter($arrayDatos);

            }else{
                //consulta sin filtro
                $response = new GetController();
                $response->GetData($routesArray[2]);
           
            }

            
        }

        //ACCEDIENDO POR EL METODO POST
        if(count($routesArray) == 2 &&
            isset($_SERVER["REQUEST_METHOD"]) &&
            $_SERVER["REQUEST_METHOD"] == "POST"){
            if(isset($_POST))
                {
                    $tabla = explode("?", $routesArray[2])[0];
                    $response = new PostController();
                    $response->PostData($tabla, $_POST);
                }

           /*  $json = array(
                    "status" => 200,
                    "result" => $_POST
            );
            echo json_encode($json, http_response_code($json["status"]));
            return; */
        }
                
        //ACCEDIENDO POR EL METODO PUT
        if(count($routesArray) == 2 &&
            isset($_SERVER["REQUEST_METHOD"]) &&
            $_SERVER["REQUEST_METHOD"] == "PUT"){
            
            $json = array(
                    "status" => 200,
                    "result" => "PUT"
            );
        }

         //ACCEDIENDO POR EL METODO DELTE
        if(count($routesArray) == 2 &&
            isset($_SERVER["REQUEST_METHOD"]) &&
            $_SERVER["REQUEST_METHOD"] == "DELETE"){
            
            $json = array(
                    "status" => 200,
                    "result" => "DELETE"
            );
        }
    }

   
   
    /*imprimir un array
    echo '<pre>';
        echo print_r($json);
    echo '</pre>';
    */
   