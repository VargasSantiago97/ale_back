<?php
include_once 'db.php';
class gastosDB extends DB
{
	function getAll()
	{
		$sql = 'SELECT * FROM gastos WHERE estado != 0';
		$query = $this->connect()->query($sql);
		return $query;
	}
	function getAllAll()
	{
		$sql = 'SELECT * FROM gastos';
		$query = $this->connect()->query($sql);
		return $query;
	}
	function getAllForSync()
	{
		$sql = 'SELECT id, editado_el FROM gastos';
		$query = $this->connect()->query($sql);
		return $query;
	}
	function update($datos)
	{
		if($datos['id'] != null){
			$query = $this->connect()->prepare('UPDATE gastos SET id = :id, alias = :alias, descripcion = :descripcion, codigo = :codigo, creado_por = :creado_por, creado_el = :creado_el, editado_por = :editado_por, editado_el = :editado_el, activo = :activo, estado = :estado WHERE id = :id');
			$query->execute(
				[
					'id' => isset($datos['id']) ? $datos['id'] : null,
					'alias' => isset($datos['alias']) ? $datos['alias'] : null,
					'descripcion' => isset($datos['descripcion']) ? $datos['descripcion'] : null,
					'codigo' => isset($datos['codigo']) ? $datos['codigo'] : null,
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
			$query = $this->connect()->prepare('INSERT INTO gastos (id, alias, descripcion, codigo, creado_por, creado_el, editado_por, editado_el, activo, estado) VALUES (:id, :alias, :descripcion, :codigo, :creado_por, :creado_el, :editado_por, :editado_el, :activo, :estado)');
			$query->execute(
				[
					'id' => isset($datos['id']) ? $datos['id'] : null,
					'alias' => isset($datos['alias']) ? $datos['alias'] : null,
					'descripcion' => isset($datos['descripcion']) ? $datos['descripcion'] : null,
					'codigo' => isset($datos['codigo']) ? $datos['codigo'] : null,
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