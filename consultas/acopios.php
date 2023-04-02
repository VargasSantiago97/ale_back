<?php
include_once 'database/acopios.php';
class Class_acopios
{
	 function getAll()
	{
		$consulta = new acopiosDB();
		$res = $consulta->getAll();
		if($res->rowCount()) echo json_encode($res->fetchAll(PDO::FETCH_ASSOC));
		else echo json_encode([]);
	}
	 function getID($idd)
	{
		$consulta = new acopiosDB();
		$res = $consulta->getID($idd);
		if($res->rowCount()) echo json_encode($res->fetchAll(PDO::FETCH_ASSOC));
		else echo json_encode([]);
	}
	function getAllAll()
	{
		$consulta = new acopiosDB();
		$res = $consulta->getAllAll();
		if($res->rowCount()) echo json_encode($res->fetchAll(PDO::FETCH_ASSOC));
		else echo json_encode(array('mensaje' => 'error conectando a db'));
	}
	function getAllForSync()
	{
		$consulta = new acopiosDB();
		$res = $consulta->getAllForSync();
		if($res->rowCount()) echo json_encode($res->fetchAll(PDO::FETCH_ASSOC));
		else echo json_encode(array('mensaje' => 'error conectando a db'));
	}
	function update($data)
	{
		$consulta = new acopiosDB();
		$res = $consulta->update($data);
		if ($res->rowCount()) {
			echo json_encode(array('mensaje' => true));
		} else {
			echo json_encode(array('mensaje' => false));
		}
	}
	function create($data)
	{
		$consulta = new acopiosDB();
		$res = $consulta->create($data);
		if ($res->rowCount()) {
			echo json_encode(array('mensaje' => true));
		} else {
			echo json_encode(array('mensaje' => false));
		}
	}
}
?>