<?php
include_once 'db.php';
class choferesDB extends DB
{
	function getAll()
	{
		$sql = 'SELECT * FROM choferes WHERE estado != 0';
		$query = $this->connect()->query($sql);
		return $query;
	}
	function getAllAll()
	{
		$sql = 'SELECT * FROM choferes';
		$query = $this->connect()->query($sql);
		return $query;
	}
	function getAllForSync()
	{
		$sql = 'SELECT id, editado_el FROM choferes';
		$query = $this->connect()->query($sql);
		return $query;
	}
	function update($datos)
	{
		if($datos['id'] != null){
			$query = $this->connect()->prepare('UPDATE choferes SET id = :id, id_transportista = :id_transportista, codigo = :codigo, alias = :alias, razon_social = :razon_social, cuit = :cuit, condicion_iva = :condicion_iva, creado_por = :creado_por, creado_el = :creado_el, editado_por = :editado_por, editado_el = :editado_el, estado = :estado WHERE id = :id');
			$query->execute(
				[
					'id' => isset($datos['id']) ? $datos['id'] : null,
					'id_transportista' => isset($datos['id_transportista']) ? $datos['id_transportista'] : null,
					'codigo' => isset($datos['codigo']) ? $datos['codigo'] : null,
					'alias' => isset($datos['alias']) ? $datos['alias'] : null,
					'razon_social' => isset($datos['razon_social']) ? $datos['razon_social'] : null,
					'cuit' => isset($datos['cuit']) ? $datos['cuit'] : null,
					'condicion_iva' => isset($datos['condicion_iva']) ? $datos['condicion_iva'] : null,
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
			$query = $this->connect()->prepare('INSERT INTO choferes (id, id_transportista, codigo, alias, razon_social, cuit, condicion_iva, creado_por, creado_el, editado_por, editado_el, estado) VALUES (:id, :id_transportista, :codigo, :alias, :razon_social, :cuit, :condicion_iva, :creado_por, :creado_el, :editado_por, :editado_el, :estado)');
			$query->execute(
				[
					'id' => isset($datos['id']) ? $datos['id'] : null,
					'id_transportista' => isset($datos['id_transportista']) ? $datos['id_transportista'] : null,
					'codigo' => isset($datos['codigo']) ? $datos['codigo'] : null,
					'alias' => isset($datos['alias']) ? $datos['alias'] : null,
					'razon_social' => isset($datos['razon_social']) ? $datos['razon_social'] : null,
					'cuit' => isset($datos['cuit']) ? $datos['cuit'] : null,
					'condicion_iva' => isset($datos['condicion_iva']) ? $datos['condicion_iva'] : null,
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