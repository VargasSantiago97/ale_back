<?php
include_once 'database/choferes.php';
class Class_choferes
{
	 function getAll()
	{
		$consulta = new choferesDB();
		$res = $consulta->getAll();
		if($res->rowCount()) echo json_encode($res->fetchAll(PDO::FETCH_ASSOC));
		else echo json_encode([]);
	}
	 function getID($idd)
	{
		$consulta = new choferesDB();
		$res = $consulta->getID($idd);
		if($res->rowCount()) echo json_encode($res->fetchAll(PDO::FETCH_ASSOC));
		else echo json_encode([]);
	}
	function getAllAll()
	{
		$consulta = new choferesDB();
		$res = $consulta->getAllAll();
		if($res->rowCount()) echo json_encode($res->fetchAll(PDO::FETCH_ASSOC));
		else echo json_encode([]);
	}
	function getAllForSync()
	{
		$consulta = new choferesDB();
		$res = $consulta->getAllForSync();
		if($res->rowCount()) echo json_encode($res->fetchAll(PDO::FETCH_ASSOC));
		else echo json_encode([]);
	}
	function update($data)
	{
		$consulta = new choferesDB();
		$res = $consulta->update($data);
		if ($res->rowCount()) {
			echo json_encode(array('mensaje' => true));
		} else {
			echo json_encode(array('mensaje' => false));
		}
	}
	function create($data)
	{
		$consulta = new choferesDB();
		$res = $consulta->create($data);
		if ($res->rowCount()) {
			echo json_encode(array('mensaje' => true));
		} else {
			echo json_encode(array('mensaje' => false));
		}
	}
}
?>