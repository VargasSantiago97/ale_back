<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
header("Allow: GET, POST, OPTIONS, PUT, DELETE");

$directorioPrincipal = "C:\\Users\\Usuario\\Mi unidad\\uploads\\";
//$directorioPrincipal = "C:\\Users\\User\\Documents\\docs\\";


if(isset($_GET['folder']) and isset($_GET['file'])){

    $directorio = $directorioPrincipal . $_GET['folder'] . "\\" . $_GET['file'];

    // Establecer las cabeceras para la descarga
    header("Content-Type: application/pdf");
    header("Content-Disposition: attachment; filename=\"" . basename($directorio) . "\"");
    header("Content-Length: " . filesize($directorio));

    // Descargar el archivo
    readfile($directorio);


}
?>