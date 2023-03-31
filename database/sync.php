<?php
include_once 'db.php';
class syncDB extends DB
{
	function getAll()
	{
		$sql = 'SELECT * FROM sync WHERE estado != 0';
		$query = $this->connect()->query($sql);
		return $query;
	}
	function getAllAll()
	{
		$sql = 'SELECT * FROM sync';
		$query = $this->connect()->query($sql);
		return $query;
	}
	function getAllForSync()
	{
		$sql = 'SELECT id, editado_el FROM sync';
		$query = $this->connect()->query($sql);
		return $query;
	}
	function update($datos)
	{
		if($datos['id'] != null){
			$query = $this->connect()->prepare('UPDATE sync SET id = :id, server = :server, tabla = :tabla, ult_mod = :ult_mod WHERE id = :id');
			$query->execute(
				[
					'id' => isset($datos['id']) ? $datos['id'] : null,
					'server' => isset($datos['server']) ? $datos['server'] : null,
					'tabla' => isset($datos['tabla']) ? $datos['tabla'] : null,
					'ult_mod' => isset($datos['ult_mod']) ? $datos['ult_mod'] : null,
				]
			);
			return $query;
		}
	}
	function create($datos)
	{
		if($datos['id'] != null){
			$query = $this->connect()->prepare('INSERT INTO sync (id, server, tabla, ult_mod) VALUES (:id, :server, :tabla, :ult_mod)');
			$query->execute(
				[
					'id' => isset($datos['id']) ? $datos['id'] : null,
					'server' => isset($datos['server']) ? $datos['server'] : null,
					'tabla' => isset($datos['tabla']) ? $datos['tabla'] : null,
					'ult_mod' => isset($datos['ult_mod']) ? $datos['ult_mod'] : null,
				]
			);
			return $query;
		}
	}
}
?>