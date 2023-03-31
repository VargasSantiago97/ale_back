<?php
include_once 'database/establecimientos.php';
class Class_establecimientos
{
	 function getAll()
	{
		$consulta = new establecimientosDB();
		$res = $consulta->getAll();
		if($res->rowCount()) echo json_encode($res->fetchAll(PDO::FETCH_ASSOC));
		else echo json_encode([]);
	}
	function getAllAll()
	{
		$consulta = new establecimientosDB();
		$res = $consulta->getAllAll();
		if($res->rowCount()) echo json_encode($res->fetchAll(PDO::FETCH_ASSOC));
		else echo json_encode(array('mensaje' => 'error conectando a db'));
	}
	function getAllForSync()
	{
		$consulta = new establecimientosDB();
		$res = $consulta->getAllForSync();
		if($res->rowCount()) echo json_encode($res->fetchAll(PDO::FETCH_ASSOC));
		else echo json_encode(array('mensaje' => 'error conectando a db'));
	}
	function update($data)
	{
		$consulta = new establecimientosDB();
		$res = $consulta->update($data);
		if ($res->rowCount()) {
			echo json_encode(array('mensaje' => true));
		} else {
			echo json_encode(array('mensaje' => false));
		}
	}
	function create($data)
	{
		$consulta = new establecimientosDB();
		$res = $consulta->create($data);
		if ($res->rowCount()) {
			echo json_encode(array('mensaje' => true));
		} else {
			echo json_encode(array('mensaje' => false));
		}
	}
}
?>