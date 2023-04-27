<?php
include_once 'db.php';
class medios_pagoDB extends DB
{
	function getAll()
	{
		$sql = 'SELECT * FROM medios_pago WHERE estado != 0';
		$query = $this->connect()->query($sql);
		return $query;
	}
	function getID($idd)
	{
		$sql = 'SELECT * FROM medios_pago WHERE id=:idd';
		$query = $this->connect()->prepare($sql);
		$query->execute(
			[
				'idd' => $idd
			]
			);
			
		return $query;
	}
	function getAllAll()
	{
		$sql = 'SELECT * FROM medios_pago';
		$query = $this->connect()->query($sql);
		return $query;
	}
	function getAllForSync()
	{
		$sql = 'SELECT id, editado_el FROM medios_pago';
		$query = $this->connect()->query($sql);
		return $query;
	}
	function update($datos)
	{
		if($datos['id'] != null){
			$query = $this->connect()->prepare('UPDATE medios_pago SET id = :id, id_orden = :id_orden, fecha = :fecha, descripcion = :descripcion, serie = :serie, emisor = :emisor, numero = :numero, tipo = :tipo, valor = :valor, creado_por = :creado_por, creado_el = :creado_el, editado_por = :editado_por, editado_el = :editado_el, activo = :activo, estado = :estado WHERE id = :id');
			$query->execute(
				[
					'id' => isset($datos['id']) ? $datos['id'] : null,
					'id_orden' => isset($datos['id_orden']) ? $datos['id_orden'] : null,
					'fecha' => isset($datos['fecha']) ? $datos['fecha'] : null,
					'descripcion' => isset($datos['descripcion']) ? $datos['descripcion'] : null,
					'serie' => isset($datos['serie']) ? $datos['serie'] : null,
					'emisor' => isset($datos['emisor']) ? $datos['emisor'] : null,
					'numero' => isset($datos['numero']) ? $datos['numero'] : null,
					'tipo' => isset($datos['tipo']) ? $datos['tipo'] : null,
					'valor' => isset($datos['valor']) ? $datos['valor'] : null,
					'creado_por' => isset($datos['creado_por']) ? $datos['creado_por'] : null,
					'creado_el' => isset($datos['creado_el']) ? $datos['creado_el'] : null,
					'editado_por' => isset($datos['editado_por']) ? $datos['editado_por'] : null,
					'editado_el' => isset($datos['editado_el']) ? $datos['editado_el'] : null,
					'activo' => isset($datos['activo']) ? $datos['activo'] : null,
					'estado' => isset($datos['estado']) ? $datos['estado'] : null,
				]
			);
			return $query;
		}
	}
	function create($datos)
	{
		if($datos['id'] != null){
			$query = $this->connect()->prepare('INSERT INTO medios_pago (id, id_orden, fecha, descripcion, serie, emisor, numero, tipo, valor, creado_por, creado_el, editado_por, editado_el, activo, estado) VALUES (:id, :id_orden, :fecha, :descripcion, :serie, :emisor, :numero, :tipo, :valor, :creado_por, :creado_el, :editado_por, :editado_el, :activo, :estado)');
			$query->execute(
				[
					'id' => isset($datos['id']) ? $datos['id'] : null,
					'id_orden' => isset($datos['id_orden']) ? $datos['id_orden'] : null,
					'fecha' => isset($datos['fecha']) ? $datos['fecha'] : null,
					'descripcion' => isset($datos['descripcion']) ? $datos['descripcion'] : null,
					'serie' => isset($datos['serie']) ? $datos['serie'] : null,
					'emisor' => isset($datos['emisor']) ? $datos['emisor'] : null,
					'numero' => isset($datos['numero']) ? $datos['numero'] : null,
					'tipo' => isset($datos['tipo']) ? $datos['tipo'] : null,
					'valor' => isset($datos['valor']) ? $datos['valor'] : null,
					'creado_por' => isset($datos['creado_por']) ? $datos['creado_por'] : null,
					'creado_el' => isset($datos['creado_el']) ? $datos['creado_el'] : null,
					'editado_por' => isset($datos['editado_por']) ? $datos['editado_por'] : null,
					'editado_el' => isset($datos['editado_el']) ? $datos['editado_el'] : null,
					'activo' => isset($datos['activo']) ? $datos['activo'] : null,
					'estado' => isset($datos['estado']) ? $datos['estado'] : null,
				]
			);
			return $query;
		}
	}
}
?>