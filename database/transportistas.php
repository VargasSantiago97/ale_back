<?php
include_once 'db.php';
class transportistasDB extends DB
{
	function getAll()
	{
		$sql = 'SELECT * FROM transportistas WHERE estado != 0';
		$query = $this->connect()->query($sql);
		return $query;
	}
	function getAllAll()
	{
		$sql = 'SELECT * FROM transportistas';
		$query = $this->connect()->query($sql);
		return $query;
	}
	function getAllForSync()
	{
		$sql = 'SELECT id, editado_el FROM transportistas';
		$query = $this->connect()->query($sql);
		return $query;
	}
	function update($datos)
	{
		if($datos['id'] != null){
			$query = $this->connect()->prepare('UPDATE transportistas SET id = :id, codigo = :codigo, alias = :alias, razon_social = :razon_social, cuit = :cuit, condicion_iva = :condicion_iva, creado_por = :creado_por, creado_el = :creado_el, editado_por = :editado_por, editado_el = :editado_el, estado = :estado, tipoPersona = :tipoPersona, nombre = :nombre, apellido = :apellido, direccion = :direccion, localidad = :localidad, codigoPostal = :codigoPostal, descripcionProvincia = :descripcionProvincia WHERE id = :id');
			$query->execute(
				[
					'id' => isset($datos['id']) ? $datos['id'] : null,
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
					'tipoPersona' => isset($datos['tipoPersona']) ? $datos['tipoPersona'] : null,
					'nombre' => isset($datos['nombre']) ? $datos['nombre'] : null,
					'apellido' => isset($datos['apellido']) ? $datos['apellido'] : null,
					'direccion' => isset($datos['direccion']) ? $datos['direccion'] : null,
					'localidad' => isset($datos['localidad']) ? $datos['localidad'] : null,
					'codigoPostal' => isset($datos['codigoPostal']) ? $datos['codigoPostal'] : null,
					'descripcionProvincia' => isset($datos['descripcionProvincia']) ? $datos['descripcionProvincia'] : null,
				]
			);
			return $query;
		}
	}
	function create($datos)
	{
		if($datos['id'] != null){
			$query = $this->connect()->prepare('INSERT INTO transportistas (id, codigo, alias, razon_social, cuit, condicion_iva, creado_por, creado_el, editado_por, editado_el, estado, tipoPersona, nombre, apellido, direccion, localidad, codigoPostal, descripcionProvincia) VALUES (:id, :codigo, :alias, :razon_social, :cuit, :condicion_iva, :creado_por, :creado_el, :editado_por, :editado_el, :estado, :tipoPersona, :nombre, :apellido, :direccion, :localidad, :codigoPostal, :descripcionProvincia)');
			$query->execute(
				[
					'id' => isset($datos['id']) ? $datos['id'] : null,
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
					'tipoPersona' => isset($datos['tipoPersona']) ? $datos['tipoPersona'] : null,
					'nombre' => isset($datos['nombre']) ? $datos['nombre'] : null,
					'apellido' => isset($datos['apellido']) ? $datos['apellido'] : null,
					'direccion' => isset($datos['direccion']) ? $datos['direccion'] : null,
					'localidad' => isset($datos['localidad']) ? $datos['localidad'] : null,
					'codigoPostal' => isset($datos['codigoPostal']) ? $datos['codigoPostal'] : null,
					'descripcionProvincia' => isset($datos['descripcionProvincia']) ? $datos['descripcionProvincia'] : null,
				]
			);
			return $query;
		}
	}
}
?>