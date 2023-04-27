<?php
include_once 'database/orden_pago.php';
class Class_orden_pago
{
	 function getAll()
	{
		$consulta = new orden_pagoDB();
		$res = $consulta->getAll();
		if($res->rowCount()) echo json_encode($res->fetchAll(PDO::FETCH_ASSOC));
		else echo json_encode([]);
	}
	 function getID($idd)
	{
		$consulta = new orden_pagoDB();
		$res = $consulta->getID($idd);
		if($res->rowCount()) echo json_encode($res->fetchAll(PDO::FETCH_ASSOC));
		else echo json_encode([]);
	}
	function getAllAll()
	{
		$consulta = new orden_pagoDB();
		$res = $consulta->getAllAll();
		if($res->rowCount()) echo json_encode($res->fetchAll(PDO::FETCH_ASSOC));
		else echo json_encode([]);
	}
	function getAllForSync()
	{
		$consulta = new orden_pagoDB();
		$res = $consulta->getAllForSync();
		if($res->rowCount()) echo json_encode($res->fetchAll(PDO::FETCH_ASSOC));
		else echo json_encode([]);
	}
	function update($data)
	{
		$consulta = new orden_pagoDB();
		$res = $consulta->update($data);
		if ($res->rowCount()) {
			echo json_encode(array('mensaje' => true));
		} else {
			echo json_encode(array('mensaje' => false));
		}
	}
	function create($data)
	{
		$consulta = new orden_pagoDB();
		$res = $consulta->create($data);
		if ($res->rowCount()) {
			echo json_encode(array('mensaje' => true));
		} else {
			echo json_encode(array('mensaje' => false));
		}
	}
}
?>