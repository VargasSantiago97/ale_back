<?php
    header('Access-Control-Allow-Origin: *');
    header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
    header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
    header("Allow: GET, POST, OPTIONS, PUT, DELETE");
    header('Content-Type: application/json; charset=utf-8');

    if(isset($_GET["consulta"])){
        $consulta = $_GET["consulta"];

        include_once 'consulta.php';
        $api = new MiConsulta;

        //################################
        //           CLIENTES
        //################################

        if ($consulta == "getAll"){
            $data = json_decode(file_get_contents("php://input"), true);
            if(isset($data['alias'])){
                $api->getAll($data);
            }
        }
        if ($consulta == "crearNuevoCliente"){
            $data = json_decode(file_get_contents("php://input"), true);
            if(isset($data['alias'])){
                $api->crearNuevoCliente($data);
            }
        }
        if ($consulta == "obtenerClienteID"){
            $idd = $_GET["id"];
            $api->obtenerClienteID($idd);
        }
        if ($consulta == "eliminarCliente"){
            $idd = $_GET["id"];
            $api->eliminarCliente($idd);
        }



        //################################
        //        MONOTRIBUTISTAS
        //################################

        if ($consulta == "existeMonotributista"){
            $idd = $_GET["id"];
            $api->existeMonotributista($idd);
        }
        if ($consulta == "datosMonotributista"){
            $idd = $_GET["id"];
            $api->datosMonotributista($idd);
        }


        if ($consulta == "crearNuevoMonotributista"){
            $data = json_decode(file_get_contents("php://input"), true);
            if(isset($data['id'])){
                $api->crearNuevoMonotributista($data);
            }
        }
        if ($consulta == "editarMonotributista"){
            $data = json_decode(file_get_contents("php://input"), true);
            if(isset($data['id'])){
                $api->editarMonotributista($data);
            }
        }


        if ($consulta == "tablaActualMonotributo"){
            $api->tablaActualMonotributo();
        }
        if ($consulta == "datosTablaMonotributo"){
            $idd = strval($_GET["id"]);
            $api->datosTablaMonotributo($idd);
        }



        //################################
        //
        //################################
    };
?>
