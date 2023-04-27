<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
header("Allow: GET, POST, OPTIONS, PUT, DELETE");

$directorioPrincipal = "C:\\Users\\Usuario\\Mi unidad\\uploads\\";
//$directorioPrincipal = "C:\\Users\\User\\Documents\\docs\\";

if(isset($_GET['dir'])){

    $directorio = $directorioPrincipal . $_GET['dir'];

    if (!is_dir($directorio)) {
        $data = array("mensaje" => FALSE, "ruta" => $directorio);
        print json_encode($data);
        die();
    } else {
        $archivos = scandir($directorio);
        array_splice($archivos, 0, 2);
        $data = array("mensaje" => TRUE, "ruta" => $archivos);
        print json_encode($data);
        die();
    }

}
?>