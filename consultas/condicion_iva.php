<?php
include_once 'database/condicion_iva.php';
class Class_condicion_iva
{
	 function getAll()
	{
		$consulta = new condicion_ivaDB();
		$res = $consulta->getAll();
		if($res->rowCount()) echo json_encode($res->fetchAll(PDO::FETCH_ASSOC));
		else echo json_encode([]);
	}
	 function getID($idd)
	{
		$consulta = new condicion_ivaDB();
		$res = $consulta->getID($idd);
		if($res->rowCount()) echo json_encode($res->fetchAll(PDO::FETCH_ASSOC));
		else echo json_encode([]);
	}
	function getAllAll()
	{
		$consulta = new condicion_ivaDB();
		$res = $consulta->getAllAll();
		if($res->rowCount()) echo json_encode($res->fetchAll(PDO::FETCH_ASSOC));
		else echo json_encode(array('mensaje' => 'error conectando a db'));
	}
	function getAllForSync()
	{
		$consulta = new condicion_ivaDB();
		$res = $consulta->getAllForSync();
		if($res->rowCount()) echo json_encode($res->fetchAll(PDO::FETCH_ASSOC));
		else echo json_encode(array('mensaje' => 'error conectando a db'));
	}
	function update($data)
	{
		$consulta = new condicion_ivaDB();
		$res = $consulta->update($data);
		if ($res->rowCount()) {
			echo json_encode(array('mensaje' => true));
		} else {
			echo json_encode(array('mensaje' => false));
		}
	}
	function create($data)
	{
		$consulta = new condicion_ivaDB();
		$res = $consulta->create($data);
		if ($res->rowCount()) {
			echo json_encode(array('mensaje' => true));
		} else {
			echo json_encode(array('mensaje' => false));
		}
	}
}
?>