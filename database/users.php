<?php
include_once 'db.php';
class usersDB extends DB
{
	function getAll()
	{
		$sql = 'SELECT * FROM users WHERE estado != 0';
		$query = $this->connect()->query($sql);
		return $query;
	}
	function getAllAll()
	{
		$sql = 'SELECT * FROM users';
		$query = $this->connect()->query($sql);
		return $query;
	}
	function getAllForSync()
	{
		$sql = 'SELECT id, editado_el FROM users';
		$query = $this->connect()->query($sql);
		return $query;
	}
	function update($datos)
	{
		if($datos['id'] != null){
			$query = $this->connect()->prepare('UPDATE users SET id = :id, alias = :alias, nombre = :nombre, apellido = :apellido, foto_url = :foto_url, estado = :estado WHERE id = :id');
			$query->execute(
				[
					'id' => isset($datos['id']) ? $datos['id'] : null,
					'alias' => isset($datos['alias']) ? $datos['alias'] : null,
					'nombre' => isset($datos['nombre']) ? $datos['nombre'] : null,
					'apellido' => isset($datos['apellido']) ? $datos['apellido'] : null,
					'foto_url' => isset($datos['foto_url']) ? $datos['foto_url'] : null,
					'estado' => isset($datos['estado']) ? $datos['estado'] : null,
				]
			);
			return $query;
		}
	}
	function create($datos)
	{
		if($datos['id'] != null){
			$query = $this->connect()->prepare('INSERT INTO users (id, alias, nombre, apellido, foto_url, estado) VALUES (:id, :alias, :nombre, :apellido, :foto_url, :estado)');
			$query->execute(
				[
					'id' => isset($datos['id']) ? $datos['id'] : null,
					'alias' => isset($datos['alias']) ? $datos['alias'] : null,
					'nombre' => isset($datos['nombre']) ? $datos['nombre'] : null,
					'apellido' => isset($datos['apellido']) ? $datos['apellido'] : null,
					'foto_url' => isset($datos['foto_url']) ? $datos['foto_url'] : null,
					'estado' => isset($datos['estado']) ? $datos['estado'] : null,
				]
			);
			return $query;
		}
	}
}
?>