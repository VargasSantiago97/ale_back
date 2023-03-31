<?php
include_once 'db.php';
class camionesDB extends DB
{
	function getAll()
	{
		$sql = 'SELECT * FROM camiones WHERE estado != 0';
		$query = $this->connect()->query($sql);
		return $query;
	}
	function getID($idd)
	{
		$sql = 'SELECT * FROM camiones WHERE id=:idd';
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
		$sql = 'SELECT * FROM camiones';
		$query = $this->connect()->query($sql);
		return $query;
	}
	function getAllForSync()
	{
		$sql = 'SELECT id, editado_el FROM camiones';
		$query = $this->connect()->query($sql);
		return $query;
	}
	function update($datos)
	{
		if($datos['id'] != null){
			$query = $this->connect()->prepare('UPDATE camiones SET id = :id, id_transportista = :id_transportista, patente_chasis = :patente_chasis, patente_acoplado = :patente_acoplado, patente_otro = :patente_otro, codigo = :codigo, alias = :alias, modelo = :modelo, kg_tara = :kg_tara, creado_por = :creado_por, creado_el = :creado_el, editado_por = :editado_por, editado_el = :editado_el, estado = :estado WHERE id = :id');
			$query->execute(
				[
					'id' => isset($datos['id']) ? $datos['id'] : null,
					'id_transportista' => isset($datos['id_transportista']) ? $datos['id_transportista'] : null,
					'patente_chasis' => isset($datos['patente_chasis']) ? $datos['patente_chasis'] : null,
					'patente_acoplado' => isset($datos['patente_acoplado']) ? $datos['patente_acoplado'] : null,
					'patente_otro' => isset($datos['patente_otro']) ? $datos['patente_otro'] : null,
					'codigo' => isset($datos['codigo']) ? $datos['codigo'] : null,
					'alias' => isset($datos['alias']) ? $datos['alias'] : null,
					'modelo' => isset($datos['modelo']) ? $datos['modelo'] : null,
					'kg_tara' => isset($datos['kg_tara']) ? $datos['kg_tara'] : null,
					'creado_por' => isset($datos['creado_por']) ? $datos['creado_por'] : null,
					'creado_el' => isset($datos['creado_el']) ? $datos['creado_el'] : null,
					'editado_por' => isset($datos['editado_por']) ? $datos['editado_por'] : null,
					'editado_el' => isset($datos['editado_el']) ? $datos['editado_el'] : null,
					'estado' => isset($datos['estado']) ? $datos['estado'] : null,
				]
			);
			return $query;
		}
	}
	function create($datos)
	{
		if($datos['id'] != null){
			$query = $this->connect()->prepare('INSERT INTO camiones (id, id_transportista, patente_chasis, patente_acoplado, patente_otro, codigo, alias, modelo, kg_tara, creado_por, creado_el, editado_por, editado_el, estado) VALUES (:id, :id_transportista, :patente_chasis, :patente_acoplado, :patente_otro, :codigo, :alias, :modelo, :kg_tara, :creado_por, :creado_el, :editado_por, :editado_el, :estado)');
			$query->execute(
				[
					'id' => isset($datos['id']) ? $datos['id'] : null,
					'id_transportista' => isset($datos['id_transportista']) ? $datos['id_transportista'] : null,
					'patente_chasis' => isset($datos['patente_chasis']) ? $datos['patente_chasis'] : null,
					'patente_acoplado' => isset($datos['patente_acoplado']) ? $datos['patente_acoplado'] : null,
					'patente_otro' => isset($datos['patente_otro']) ? $datos['patente_otro'] : null,
					'codigo' => isset($datos['codigo']) ? $datos['codigo'] : null,
					'alias' => isset($datos['alias']) ? $datos['alias'] : null,
					'modelo' => isset($datos['modelo']) ? $datos['modelo'] : null,
					'kg_tara' => isset($datos['kg_tara']) ? $datos['kg_tara'] : null,
					'creado_por' => isset($datos['creado_por']) ? $datos['creado_por'] : null,
					'creado_el' => isset($datos['creado_el']) ? $datos['creado_el'] : null,
					'editado_por' => isset($datos['editado_por']) ? $datos['editado_por'] : null,
					'editado_el' => isset($datos['editado_el']) ? $datos['editado_el'] : null,
					'estado' => isset($datos['estado']) ? $datos['estado'] : null,
				]
			);
			return $query;
		}
	}
}
?>