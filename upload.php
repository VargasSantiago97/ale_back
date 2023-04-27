<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
header("Allow: GET, POST, OPTIONS, PUT, DELETE");

$directorioPrincipal = "C:\\Users\\Usuario\\Mi unidad\\uploads\\";
//$directorioPrincipal = "C:\\Users\\User\\Documents\\docs\\";


if(isset($_GET['folder'])){

    for($a=0; $a<count($_FILES["demo"]["name"]); $a++)
    {
        $directorio = $directorioPrincipal . $_GET['folder'];

        if (!is_dir($directorio)) {
            mkdir($directorio, 0777, true);
        }

        $target_file = $directorio . "\\" . $_FILES["demo"]["name"][$a];

        if (move_uploaded_file($_FILES["demo"]["tmp_name"][$a], $target_file)) {
            $data = array("mensaje" => "ok");
        }

    }
    print json_encode($data);
    die();
}
?>