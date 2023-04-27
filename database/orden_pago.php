<?php
include_once 'db.php';
class orden_pagoDB extends DB
{
	function getAll()
	{
		$sql = 'SELECT * FROM orden_pago WHERE estado != 0';
		$query = $this->connect()->query($sql);
		return $query;
	}
	function getID($idd)
	{
		$sql = 'SELECT * FROM orden_pago WHERE id=:idd';
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
		$sql = 'SELECT * FROM orden_pago';
		$query = $this->connect()->query($sql);
		return $query;
	}
	function getAllForSync()
	{
		$sql = 'SELECT id, editado_el FROM orden_pago';
		$query = $this->connect()->query($sql);
		return $query;
	}
	function update($datos)
	{
		if($datos['id'] != null){
			$query = $this->connect()->prepare('UPDATE orden_pago SET id = :id, id_asiento = :id_asiento, id_socio = :id_socio, id_transportista = :id_transportista, fecha = :fecha, beneficiario_razon = :beneficiario_razon, beneficiario_domicilio = :beneficiario_domicilio, beneficiario_codigo = :beneficiario_codigo, beneficiario_cuit = :beneficiario_cuit, total_letras = :total_letras, total = :total, observacion = :observacion, fondo = :fondo, afecta = :afecta, punto = :punto, numero = :numero, creado_por = :creado_por, creado_el = :creado_el, editado_por = :editado_por, editado_el = :editado_el, activo = :activo, estado = :estado WHERE id = :id');
			$query->execute(
				[
					'id' => isset($datos['id']) ? $datos['id'] : null,
					'id_asiento' => isset($datos['id_asiento']) ? $datos['id_asiento'] : null,
					'id_socio' => isset($datos['id_socio']) ? $datos['id_socio'] : null,
					'id_transportista' => isset($datos['id_transportista']) ? $datos['id_transportista'] : null,
					'fecha' => isset($datos['fecha']) ? $datos['fecha'] : null,
					'beneficiario_razon' => isset($datos['beneficiario_razon']) ? $datos['beneficiario_razon'] : null,
					'beneficiario_domicilio' => isset($datos['beneficiario_domicilio']) ? $datos['beneficiario_domicilio'] : null,
					'beneficiario_codigo' => isset($datos['beneficiario_codigo']) ? $datos['beneficiario_codigo'] : null,
					'beneficiario_cuit' => isset($datos['beneficiario_cuit']) ? $datos['beneficiario_cuit'] : null,
					'total_letras' => isset($datos['total_letras']) ? $datos['total_letras'] : null,
					'total' => isset($datos['total']) ? $datos['total'] : null,
					'observacion' => isset($datos['observacion']) ? $datos['observacion'] : null,
					'fondo' => isset($datos['fondo']) ? $datos['fondo'] : null,
					'afecta' => isset($datos['afecta']) ? $datos['afecta'] : null,
					'punto' => isset($datos['punto']) ? $datos['punto'] : null,
					'numero' => isset($datos['numero']) ? $datos['numero'] : null,
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
			$query = $this->connect()->prepare('INSERT INTO orden_pago (id, id_asiento, id_socio, id_transportista, fecha, beneficiario_razon, beneficiario_domicilio, beneficiario_codigo, beneficiario_cuit, total_letras, total, observacion, fondo, afecta, punto, numero, creado_por, creado_el, editado_por, editado_el, activo, estado) VALUES (:id, :id_asiento, :id_socio, :id_transportista, :fecha, :beneficiario_razon, :beneficiario_domicilio, :beneficiario_codigo, :beneficiario_cuit, :total_letras, :total, :observacion, :fondo, :afecta, :punto, :numero, :creado_por, :creado_el, :editado_por, :editado_el, :activo, :estado)');
			$query->execute(
				[
					'id' => isset($datos['id']) ? $datos['id'] : null,
					'id_asiento' => isset($datos['id_asiento']) ? $datos['id_asiento'] : null,
					'id_socio' => isset($datos['id_socio']) ? $datos['id_socio'] : null,
					'id_transportista' => isset($datos['id_transportista']) ? $datos['id_transportista'] : null,
					'fecha' => isset($datos['fecha']) ? $datos['fecha'] : null,
					'beneficiario_razon' => isset($datos['beneficiario_razon']) ? $datos['beneficiario_razon'] : null,
					'beneficiario_domicilio' => isset($datos['beneficiario_domicilio']) ? $datos['beneficiario_domicilio'] : null,
					'beneficiario_codigo' => isset($datos['beneficiario_codigo']) ? $datos['beneficiario_codigo'] : null,
					'beneficiario_cuit' => isset($datos['beneficiario_cuit']) ? $datos['beneficiario_cuit'] : null,
					'total_letras' => isset($datos['total_letras']) ? $datos['total_letras'] : null,
					'total' => isset($datos['total']) ? $datos['total'] : null,
					'observacion' => isset($datos['observacion']) ? $datos['observacion'] : null,
					'fondo' => isset($datos['fondo']) ? $datos['fondo'] : null,
					'afecta' => isset($datos['afecta']) ? $datos['afecta'] : null,
					'punto' => isset($datos['punto']) ? $datos['punto'] : null,
					'numero' => isset($datos['numero']) ? $datos['numero'] : null,
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