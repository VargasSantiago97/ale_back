<?php
include_once 'db.php';
class movimientosDB extends DB
{
	function getAll()
	{
		$sql = 'SELECT * FROM movimientos WHERE estado != 0';
		$query = $this->connect()->query($sql);
		return $query;
	}
	function getAllAll()
	{
		$sql = 'SELECT * FROM movimientos';
		$query = $this->connect()->query($sql);
		return $query;
	}
	function getAllForSync()
	{
		$sql = 'SELECT id, editado_el FROM movimientos';
		$query = $this->connect()->query($sql);
		return $query;
	}
	function update($datos)
	{
		if($datos['id'] != null){
			$query = $this->connect()->prepare('UPDATE movimientos SET id = :id, fecha = :fecha, id_campana = :id_campana, id_socio = :id_socio, id_origen = :id_origen, id_grano = :id_grano, id_transporte = :id_transporte, id_chofer = :id_chofer, id_camion = :id_camion, id_corredor = :id_corredor, id_acopio = :id_acopio, id_deposito = :id_deposito, kg_bruto = :kg_bruto, kg_tara = :kg_tara, kg_neto = :kg_neto, kg_regulacion = :kg_regulacion, kg_neto_final = :kg_neto_final, observaciones = :observaciones, tipo_origen = :tipo_origen, creado_por = :creado_por, creado_el = :creado_el, editado_por = :editado_por, editado_el = :editado_el, activo = :activo, estado = :estado WHERE id = :id');
			$query->execute(
				[
					'id' => isset($datos['id']) ? $datos['id'] : null,
					'fecha' => isset($datos['fecha']) ? $datos['fecha'] : null,
					'id_campana' => isset($datos['id_campana']) ? $datos['id_campana'] : null,
					'id_socio' => isset($datos['id_socio']) ? $datos['id_socio'] : null,
					'id_origen' => isset($datos['id_origen']) ? $datos['id_origen'] : null,
					'id_grano' => isset($datos['id_grano']) ? $datos['id_grano'] : null,
					'id_transporte' => isset($datos['id_transporte']) ? $datos['id_transporte'] : null,
					'id_chofer' => isset($datos['id_chofer']) ? $datos['id_chofer'] : null,
					'id_camion' => isset($datos['id_camion']) ? $datos['id_camion'] : null,
					'id_corredor' => isset($datos['id_corredor']) ? $datos['id_corredor'] : null,
					'id_acopio' => isset($datos['id_acopio']) ? $datos['id_acopio'] : null,
					'id_deposito' => isset($datos['id_deposito']) ? $datos['id_deposito'] : null,
					'kg_bruto' => isset($datos['kg_bruto']) ? $datos['kg_bruto'] : null,
					'kg_tara' => isset($datos['kg_tara']) ? $datos['kg_tara'] : null,
					'kg_neto' => isset($datos['kg_neto']) ? $datos['kg_neto'] : null,
					'kg_regulacion' => isset($datos['kg_regulacion']) ? $datos['kg_regulacion'] : null,
					'kg_neto_final' => isset($datos['kg_neto_final']) ? $datos['kg_neto_final'] : null,
					'observaciones' => isset($datos['observaciones']) ? $datos['observaciones'] : null,
					'tipo_origen' => isset($datos['tipo_origen']) ? $datos['tipo_origen'] : null,
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
			$query = $this->connect()->prepare('INSERT INTO movimientos (id, fecha, id_campana, id_socio, id_origen, id_grano, id_transporte, id_chofer, id_camion, id_corredor, id_acopio, id_deposito, kg_bruto, kg_tara, kg_neto, kg_regulacion, kg_neto_final, observaciones, tipo_origen, creado_por, creado_el, editado_por, editado_el, activo, estado) VALUES (:id, :fecha, :id_campana, :id_socio, :id_origen, :id_grano, :id_transporte, :id_chofer, :id_camion, :id_corredor, :id_acopio, :id_deposito, :kg_bruto, :kg_tara, :kg_neto, :kg_regulacion, :kg_neto_final, :observaciones, :tipo_origen, :creado_por, :creado_el, :editado_por, :editado_el, :activo, :estado)');
			$query->execute(
				[
					'id' => isset($datos['id']) ? $datos['id'] : null,
					'fecha' => isset($datos['fecha']) ? $datos['fecha'] : null,
					'id_campana' => isset($datos['id_campana']) ? $datos['id_campana'] : null,
					'id_socio' => isset($datos['id_socio']) ? $datos['id_socio'] : null,
					'id_origen' => isset($datos['id_origen']) ? $datos['id_origen'] : null,
					'id_grano' => isset($datos['id_grano']) ? $datos['id_grano'] : null,
					'id_transporte' => isset($datos['id_transporte']) ? $datos['id_transporte'] : null,
					'id_chofer' => isset($datos['id_chofer']) ? $datos['id_chofer'] : null,
					'id_camion' => isset($datos['id_camion']) ? $datos['id_camion'] : null,
					'id_corredor' => isset($datos['id_corredor']) ? $datos['id_corredor'] : null,
					'id_acopio' => isset($datos['id_acopio']) ? $datos['id_acopio'] : null,
					'id_deposito' => isset($datos['id_deposito']) ? $datos['id_deposito'] : null,
					'kg_bruto' => isset($datos['kg_bruto']) ? $datos['kg_bruto'] : null,
					'kg_tara' => isset($datos['kg_tara']) ? $datos['kg_tara'] : null,
					'kg_neto' => isset($datos['kg_neto']) ? $datos['kg_neto'] : null,
					'kg_regulacion' => isset($datos['kg_regulacion']) ? $datos['kg_regulacion'] : null,
					'kg_neto_final' => isset($datos['kg_neto_final']) ? $datos['kg_neto_final'] : null,
					'observaciones' => isset($datos['observaciones']) ? $datos['observaciones'] : null,
					'tipo_origen' => isset($datos['tipo_origen']) ? $datos['tipo_origen'] : null,
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