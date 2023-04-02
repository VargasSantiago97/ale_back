<?php
include_once 'db.php';
class banderasDB extends DB
{
	function getAll()
	{
		$sql = 'SELECT * FROM banderas WHERE estado != 0';
		$query = $this->connect()->query($sql);
		return $query;
	}
	function getID($idd)
	{
		$sql = 'SELECT * FROM banderas WHERE id=:idd';
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
		$sql = 'SELECT * FROM banderas';
		$query = $this->connect()->query($sql);
		return $query;
	}
	function getAllForSync()
	{
		$sql = 'SELECT id, editado_el FROM banderas';
		$query = $this->connect()->query($sql);
		return $query;
	}
	function update($datos)
	{
		if($datos['id'] != null){
			$query = $this->connect()->prepare('UPDATE banderas SET id = :id, alias = :alias, codigo = :codigo, icono = :icono, fondo = :fondo, color = :color, creado_por = :creado_por, creado_el = :creado_el, editado_por = :editado_por, editado_el = :editado_el, activo = :activo, estado = :estado WHERE id = :id');
			$query->execute(
				[
					'id' => isset($datos['id']) ? $datos['id'] : null,
					'alias' => isset($datos['alias']) ? $datos['alias'] : null,
					'codigo' => isset($datos['codigo']) ? $datos['codigo'] : null,
					'icono' => isset($datos['icono']) ? $datos['icono'] : null,
					'fondo' => isset($datos['fondo']) ? $datos['fondo'] : null,
					'color' => isset($datos['color']) ? $datos['color'] : null,
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
			$query = $this->connect()->prepare('INSERT INTO banderas (id, alias, codigo, icono, fondo, color, creado_por, creado_el, editado_por, editado_el, activo, estado) VALUES (:id, :alias, :codigo, :icono, :fondo, :color, :creado_por, :creado_el, :editado_por, :editado_el, :activo, :estado)');
			$query->execute(
				[
					'id' => isset($datos['id']) ? $datos['id'] : null,
					'alias' => isset($datos['alias']) ? $datos['alias'] : null,
					'codigo' => isset($datos['codigo']) ? $datos['codigo'] : null,
					'icono' => isset($datos['icono']) ? $datos['icono'] : null,
					'fondo' => isset($datos['fondo']) ? $datos['fondo'] : null,
					'color' => isset($datos['color']) ? $datos['color'] : null,
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