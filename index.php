<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
header("Allow: GET, POST, OPTIONS, PUT, DELETE");
header('Content-Type: application/json; charset=utf-8');

if(!isset($_GET['tabla']) || !isset($_GET['op'])){
    echo 'verifique consulta';
    return 0;
}

$tabla = $_GET['tabla'];
$op = $_GET['op'];


//camiones
if($tabla == 'camiones'){
	include_once 'consultas/camiones.php';
	$api = new Class_camiones;
	if($op=='getAll') $api->getAll();
	if($op=='getID') $api->getID($_GET['id']);
	if($op=='getAllAll') $api->getAllAll();
	if($op=='getAllForSync') $api->getAllForSync();
	if($op=='update') $api->update(json_decode(file_get_contents('php://input'), true));
	if($op=='create') $api->create(json_decode(file_get_contents('php://input'), true));
}

//choferes
if($tabla == 'choferes'){
	include_once 'consultas/choferes.php';
	$api = new Class_choferes;
	if($op=='getAll') $api->getAll();
	if($op=='getID') $api->getID($_GET['id']);
	if($op=='getAllAll') $api->getAllAll();
	if($op=='getAllForSync') $api->getAllForSync();
	if($op=='update') $api->update(json_decode(file_get_contents('php://input'), true));
	if($op=='create') $api->create(json_decode(file_get_contents('php://input'), true));
}

//condicion_iva
if($tabla == 'condicion_iva'){
	include_once 'consultas/condicion_iva.php';
	$api = new Class_condicion_iva;
	if($op=='getAll') $api->getAll();
	if($op=='getID') $api->getID($_GET['id']);
	if($op=='getAllAll') $api->getAllAll();
	if($op=='getAllForSync') $api->getAllForSync();
	if($op=='update') $api->update(json_decode(file_get_contents('php://input'), true));
	if($op=='create') $api->create(json_decode(file_get_contents('php://input'), true));
}

//socios
if($tabla == 'socios'){
	include_once 'consultas/socios.php';
	$api = new Class_socios;
	if($op=='getAll') $api->getAll();
	if($op=='getID') $api->getID($_GET['id']);
	if($op=='getAllAll') $api->getAllAll();
	if($op=='getAllForSync') $api->getAllForSync();
	if($op=='update') $api->update(json_decode(file_get_contents('php://input'), true));
	if($op=='create') $api->create(json_decode(file_get_contents('php://input'), true));
}

//transportistas
if($tabla == 'transportistas'){
	include_once 'consultas/transportistas.php';
	$api = new Class_transportistas;
	if($op=='getAll') $api->getAll();
	if($op=='getID') $api->getID($_GET['id']);
	if($op=='getAllAll') $api->getAllAll();
	if($op=='getAllForSync') $api->getAllForSync();
	if($op=='update') $api->update(json_decode(file_get_contents('php://input'), true));
	if($op=='create') $api->create(json_decode(file_get_contents('php://input'), true));
}

//users
if($tabla == 'users'){
	include_once 'consultas/users.php';
	$api = new Class_users;
	if($op=='getAll') $api->getAll();
	if($op=='getID') $api->getID($_GET['id']);
	if($op=='getAllAll') $api->getAllAll();
	if($op=='getAllForSync') $api->getAllForSync();
	if($op=='update') $api->update(json_decode(file_get_contents('php://input'), true));
	if($op=='create') $api->create(json_decode(file_get_contents('php://input'), true));
}

//campanas
if($tabla == 'campanas'){
	include_once 'consultas/campanas.php';
	$api = new Class_campanas;
	if($op=='getAll') $api->getAll();
	if($op=='getID') $api->getID($_GET['id']);
	if($op=='getAllAll') $api->getAllAll();
	if($op=='getAllForSync') $api->getAllForSync();
	if($op=='update') $api->update(json_decode(file_get_contents('php://input'), true));
	if($op=='create') $api->create(json_decode(file_get_contents('php://input'), true));
}

//depositos
if($tabla == 'depositos'){
	include_once 'consultas/depositos.php';
	$api = new Class_depositos;
	if($op=='getAll') $api->getAll();
	if($op=='getID') $api->getID($_GET['id']);
	if($op=='getAllAll') $api->getAllAll();
	if($op=='getAllForSync') $api->getAllForSync();
	if($op=='update') $api->update(json_decode(file_get_contents('php://input'), true));
	if($op=='create') $api->create(json_decode(file_get_contents('php://input'), true));
}

//establecimientos
if($tabla == 'establecimientos'){
	include_once 'consultas/establecimientos.php';
	$api = new Class_establecimientos;
	if($op=='getAll') $api->getAll();
	if($op=='getID') $api->getID($_GET['id']);
	if($op=='getAllAll') $api->getAllAll();
	if($op=='getAllForSync') $api->getAllForSync();
	if($op=='update') $api->update(json_decode(file_get_contents('php://input'), true));
	if($op=='create') $api->create(json_decode(file_get_contents('php://input'), true));
}

//gastos
if($tabla == 'gastos'){
	include_once 'consultas/gastos.php';
	$api = new Class_gastos;
	if($op=='getAll') $api->getAll();
	if($op=='getID') $api->getID($_GET['id']);
	if($op=='getAllAll') $api->getAllAll();
	if($op=='getAllForSync') $api->getAllForSync();
	if($op=='update') $api->update(json_decode(file_get_contents('php://input'), true));
	if($op=='create') $api->create(json_decode(file_get_contents('php://input'), true));
}

//granos
if($tabla == 'granos'){
	include_once 'consultas/granos.php';
	$api = new Class_granos;
	if($op=='getAll') $api->getAll();
	if($op=='getID') $api->getID($_GET['id']);
	if($op=='getAllAll') $api->getAllAll();
	if($op=='getAllForSync') $api->getAllForSync();
	if($op=='update') $api->update(json_decode(file_get_contents('php://input'), true));
	if($op=='create') $api->create(json_decode(file_get_contents('php://input'), true));
}

//orden_carga
if($tabla == 'orden_carga'){
	include_once 'consultas/orden_carga.php';
	$api = new Class_orden_carga;
	if($op=='getAll') $api->getAll();
	if($op=='getID') $api->getID($_GET['id']);
	if($op=='getAllAll') $api->getAllAll();
	if($op=='getAllForSync') $api->getAllForSync();
	if($op=='update') $api->update(json_decode(file_get_contents('php://input'), true));
	if($op=='create') $api->create(json_decode(file_get_contents('php://input'), true));
}

//movimientos
if($tabla == 'movimientos'){
	include_once 'consultas/movimientos.php';
	$api = new Class_movimientos;
	if($op=='getAll') $api->getAll();
	if($op=='getID') $api->getID($_GET['id']);
	if($op=='getAllAll') $api->getAllAll();
	if($op=='getAllForSync') $api->getAllForSync();
	if($op=='update') $api->update(json_decode(file_get_contents('php://input'), true));
	if($op=='create') $api->create(json_decode(file_get_contents('php://input'), true));
}

//sync
if($tabla == 'sync'){
	include_once 'consultas/sync.php';
	$api = new Class_sync;
	if($op=='getAll') $api->getAll();
	if($op=='getID') $api->getID($_GET['id']);
	if($op=='getAllAll') $api->getAllAll();
	if($op=='getAllForSync') $api->getAllForSync();
	if($op=='update') $api->update(json_decode(file_get_contents('php://input'), true));
	if($op=='create') $api->create(json_decode(file_get_contents('php://input'), true));
}

//corredores
if($tabla == 'corredores'){
	include_once 'consultas/corredores.php';
	$api = new Class_corredores;
	if($op=='getAll') $api->getAll();
	if($op=='getID') $api->getID($_GET['id']);
	if($op=='getAllAll') $api->getAllAll();
	if($op=='getAllForSync') $api->getAllForSync();
	if($op=='update') $api->update(json_decode(file_get_contents('php://input'), true));
	if($op=='create') $api->create(json_decode(file_get_contents('php://input'), true));
}

//acopios
if($tabla == 'acopios'){
	include_once 'consultas/acopios.php';
	$api = new Class_acopios;
	if($op=='getAll') $api->getAll();
	if($op=='getID') $api->getID($_GET['id']);
	if($op=='getAllAll') $api->getAllAll();
	if($op=='getAllForSync') $api->getAllForSync();
	if($op=='update') $api->update(json_decode(file_get_contents('php://input'), true));
	if($op=='create') $api->create(json_decode(file_get_contents('php://input'), true));
}

//banderas
if($tabla == 'banderas'){
	include_once 'consultas/banderas.php';
	$api = new Class_banderas;
	if($op=='getAll') $api->getAll();
	if($op=='getID') $api->getID($_GET['id']);
	if($op=='getAllAll') $api->getAllAll();
	if($op=='getAllForSync') $api->getAllForSync();
	if($op=='update') $api->update(json_decode(file_get_contents('php://input'), true));
	if($op=='create') $api->create(json_decode(file_get_contents('php://input'), true));
}

?>