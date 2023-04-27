<?php
include_once 'db.php';
class asientosDB extends DB
{
	function getAll()
	{
		$sql = 'SELECT * FROM asientos WHERE estado != 0';
		$query = $this->connect()->query($sql);
		return $query;
	}
	function getID($idd)
	{
		$sql = 'SELECT * FROM asientos WHERE id=:idd';
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
		$sql = 'SELECT * FROM asientos';
		$query = $this->connect()->query($sql);
		return $query;
	}
	function getAllForSync()
	{
		$sql = 'SELECT id, editado_el FROM asientos';
		$query = $this->connect()->query($sql);
		return $query;
	}
	function update($datos)
	{
		if($datos['id'] != null){
			$query = $this->connect()->prepare('UPDATE asientos SET id = :id, tipo = :tipo, id_socio = :id_socio, id_transportista = :id_transportista, fecha = :fecha, descripcion = :descripcion, observacion = :observacion, afecta = :afecta, cpte_letra = :cpte_letra, cpte_punto = :cpte_punto, cpte_numero = :cpte_numero, cpte_fecha = :cpte_fecha, debe = :debe, haber = :haber, creado_por = :creado_por, creado_el = :creado_el, editado_por = :editado_por, editado_el = :editado_el, activo = :activo, estado = :estado WHERE id = :id');
			$query->execute(
				[
					'id' => isset($datos['id']) ? $datos['id'] : null,
					'tipo' => isset($datos['tipo']) ? $datos['tipo'] : null,
					'id_socio' => isset($datos['id_socio']) ? $datos['id_socio'] : null,
					'id_transportista' => isset($datos['id_transportista']) ? $datos['id_transportista'] : null,
					'fecha' => isset($datos['fecha']) ? $datos['fecha'] : null,
					'descripcion' => isset($datos['descripcion']) ? $datos['descripcion'] : null,
					'observacion' => isset($datos['observacion']) ? $datos['observacion'] : null,
					'afecta' => isset($datos['afecta']) ? $datos['afecta'] : null,
					'cpte_letra' => isset($datos['cpte_letra']) ? $datos['cpte_letra'] : null,
					'cpte_punto' => isset($datos['cpte_punto']) ? $datos['cpte_punto'] : null,
					'cpte_numero' => isset($datos['cpte_numero']) ? $datos['cpte_numero'] : null,
					'cpte_fecha' => isset($datos['cpte_fecha']) ? $datos['cpte_fecha'] : null,
					'debe' => isset($datos['debe']) ? $datos['debe'] : null,
					'haber' => isset($datos['haber']) ? $datos['haber'] : null,
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
			$query = $this->connect()->prepare('INSERT INTO asientos (id, tipo, id_socio, id_transportista, fecha, descripcion, observacion, afecta, cpte_letra, cpte_punto, cpte_numero, cpte_fecha, debe, haber, creado_por, creado_el, editado_por, editado_el, activo, estado) VALUES (:id, :tipo, :id_socio, :id_transportista, :fecha, :descripcion, :observacion, :afecta, :cpte_letra, :cpte_punto, :cpte_numero, :cpte_fecha, :debe, :haber, :creado_por, :creado_el, :editado_por, :editado_el, :activo, :estado)');
			$query->execute(
				[
					'id' => isset($datos['id']) ? $datos['id'] : null,
					'tipo' => isset($datos['tipo']) ? $datos['tipo'] : null,
					'id_socio' => isset($datos['id_socio']) ? $datos['id_socio'] : null,
					'id_transportista' => isset($datos['id_transportista']) ? $datos['id_transportista'] : null,
					'fecha' => isset($datos['fecha']) ? $datos['fecha'] : null,
					'descripcion' => isset($datos['descripcion']) ? $datos['descripcion'] : null,
					'observacion' => isset($datos['observacion']) ? $datos['observacion'] : null,
					'afecta' => isset($datos['afecta']) ? $datos['afecta'] : null,
					'cpte_letra' => isset($datos['cpte_letra']) ? $datos['cpte_letra'] : null,
					'cpte_punto' => isset($datos['cpte_punto']) ? $datos['cpte_punto'] : null,
					'cpte_numero' => isset($datos['cpte_numero']) ? $datos['cpte_numero'] : null,
					'cpte_fecha' => isset($datos['cpte_fecha']) ? $datos['cpte_fecha'] : null,
					'debe' => isset($datos['debe']) ? $datos['debe'] : null,
					'haber' => isset($datos['haber']) ? $datos['haber'] : null,
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