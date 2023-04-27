<?php
include_once 'db.php';
class orden_cargaDB extends DB
{
	function getAll()
	{
		$sql = 'SELECT * FROM orden_carga WHERE estado != 0';
		$query = $this->connect()->query($sql);
		return $query;
	}
	function getID($idd)
	{
		$sql = 'SELECT * FROM orden_carga WHERE id=:idd';
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
		$sql = 'SELECT * FROM orden_carga';
		$query = $this->connect()->query($sql);
		return $query;
	}
	function getAllForSync()
	{
		$sql = 'SELECT id, editado_el FROM orden_carga';
		$query = $this->connect()->query($sql);
		return $query;
	}
	function update($datos)
	{
		if($datos['id'] != null){
			$query = $this->connect()->prepare('UPDATE orden_carga SET id = :id, id_movimiento = :id_movimiento, numero = :numero, fecha = :fecha, beneficiario = :beneficiario, transportista = :transportista, conductor = :conductor, patentes = :patentes, establecimiento = :establecimiento, cultivo = :cultivo, trilla_silo = :trilla_silo, tara = :tara, bruto = :bruto, neto = :neto, firma1 = :firma1, firma2 = :firma2, observaciones = :observaciones, creado_por = :creado_por, creado_el = :creado_el, editado_por = :editado_por, editado_el = :editado_el, activo = :activo, estado = :estado WHERE id = :id');
			$query->execute(
				[
					'id' => isset($datos['id']) ? $datos['id'] : null,
					'id_movimiento' => isset($datos['id_movimiento']) ? $datos['id_movimiento'] : null,
					'numero' => isset($datos['numero']) ? $datos['numero'] : null,
					'fecha' => isset($datos['fecha']) ? $datos['fecha'] : null,
					'beneficiario' => isset($datos['beneficiario']) ? $datos['beneficiario'] : null,
					'transportista' => isset($datos['transportista']) ? $datos['transportista'] : null,
					'conductor' => isset($datos['conductor']) ? $datos['conductor'] : null,
					'patentes' => isset($datos['patentes']) ? $datos['patentes'] : null,
					'establecimiento' => isset($datos['establecimiento']) ? $datos['establecimiento'] : null,
					'cultivo' => isset($datos['cultivo']) ? $datos['cultivo'] : null,
					'trilla_silo' => isset($datos['trilla_silo']) ? $datos['trilla_silo'] : null,
					'tara' => isset($datos['tara']) ? $datos['tara'] : null,
					'bruto' => isset($datos['bruto']) ? $datos['bruto'] : null,
					'neto' => isset($datos['neto']) ? $datos['neto'] : null,
					'firma1' => isset($datos['firma1']) ? $datos['firma1'] : null,
					'firma2' => isset($datos['firma2']) ? $datos['firma2'] : null,
					'observaciones' => isset($datos['observaciones']) ? $datos['observaciones'] : null,
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
			$query = $this->connect()->prepare('INSERT INTO orden_carga (id, id_movimiento, numero, fecha, beneficiario, transportista, conductor, patentes, establecimiento, cultivo, trilla_silo, tara, bruto, neto, firma1, firma2, observaciones, creado_por, creado_el, editado_por, editado_el, activo, estado) VALUES (:id, :id_movimiento, :numero, :fecha, :beneficiario, :transportista, :conductor, :patentes, :establecimiento, :cultivo, :trilla_silo, :tara, :bruto, :neto, :firma1, :firma2, :observaciones, :creado_por, :creado_el, :editado_por, :editado_el, :activo, :estado)');
			$query->execute(
				[
					'id' => isset($datos['id']) ? $datos['id'] : null,
					'id_movimiento' => isset($datos['id_movimiento']) ? $datos['id_movimiento'] : null,
					'numero' => isset($datos['numero']) ? $datos['numero'] : null,
					'fecha' => isset($datos['fecha']) ? $datos['fecha'] : null,
					'beneficiario' => isset($datos['beneficiario']) ? $datos['beneficiario'] : null,
					'transportista' => isset($datos['transportista']) ? $datos['transportista'] : null,
					'conductor' => isset($datos['conductor']) ? $datos['conductor'] : null,
					'patentes' => isset($datos['patentes']) ? $datos['patentes'] : null,
					'establecimiento' => isset($datos['establecimiento']) ? $datos['establecimiento'] : null,
					'cultivo' => isset($datos['cultivo']) ? $datos['cultivo'] : null,
					'trilla_silo' => isset($datos['trilla_silo']) ? $datos['trilla_silo'] : null,
					'tara' => isset($datos['tara']) ? $datos['tara'] : null,
					'bruto' => isset($datos['bruto']) ? $datos['bruto'] : null,
					'neto' => isset($datos['neto']) ? $datos['neto'] : null,
					'firma1' => isset($datos['firma1']) ? $datos['firma1'] : null,
					'firma2' => isset($datos['firma2']) ? $datos['firma2'] : null,
					'observaciones' => isset($datos['observaciones']) ? $datos['observaciones'] : null,
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