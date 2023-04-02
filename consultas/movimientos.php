<?php
include_once 'database/movimientos.php';
class Class_movimientos
{
	 function getAll()
	{
		$consulta = new movimientosDB();
		$res = $consulta->getAll();
		if($res->rowCount()) echo json_encode($res->fetchAll(PDO::FETCH_ASSOC));
		else echo json_encode([]);
	}
	 function getID($idd)
	{
		$consulta = new movimientosDB();
		$res = $consulta->getID($idd);
		if($res->rowCount()) echo json_encode($res->fetchAll(PDO::FETCH_ASSOC));
		else echo json_encode([]);
	}
	function getAllAll()
	{
		$consulta = new movimientosDB();
		$res = $consulta->getAllAll();
		if($res->rowCount()) echo json_encode($res->fetchAll(PDO::FETCH_ASSOC));
		else echo json_encode([]);
	}
	function getAllForSync()
	{
		$consulta = new movimientosDB();
		$res = $consulta->getAllForSync();
		if($res->rowCount()) echo json_encode($res->fetchAll(PDO::FETCH_ASSOC));
		else echo json_encode([]);
	}
	function update($data)
	{
		$consulta = new movimientosDB();
		$res = $consulta->update($data);
		if ($res->rowCount()) {
			echo json_encode(array('mensaje' => true));
		} else {
			echo json_encode(array('mensaje' => false));
		}
	}
	function create($data)
	{
		$consulta = new movimientosDB();
		$res = $consulta->create($data);
		if ($res->rowCount()) {
			echo json_encode(array('mensaje' => true));
		} else {
			echo json_encode(array('mensaje' => false));
		}
	}
}
?>