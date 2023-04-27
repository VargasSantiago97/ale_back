<?php
include_once 'db.php';
class carta_porteDB extends DB
{
	function getAll()
	{
		$sql = 'SELECT * FROM carta_porte WHERE estado != 0';
		$query = $this->connect()->query($sql);
		return $query;
	}
	function getID($idd)
	{
		$sql = 'SELECT * FROM carta_porte WHERE id=:idd';
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
		$sql = 'SELECT * FROM carta_porte';
		$query = $this->connect()->query($sql);
		return $query;
	}
	function getAllForSync()
	{
		$sql = 'SELECT id, editado_el FROM carta_porte';
		$query = $this->connect()->query($sql);
		return $query;
	}
	function update($datos)
	{
		if($datos['id'] != null){
			$query = $this->connect()->prepare('UPDATE carta_porte SET id = :id, sucursal = :sucursal, nro_cpe = :nro_cpe, nro_ctg = :nro_ctg, id_movimiento = :id_movimiento, cuit_solicitante = :cuit_solicitante, tipo_cpe = :tipo_cpe, observaciones = :observaciones, es_solicitante_campo = :es_solicitante_campo, planta_origen = :planta_origen, cod_provincia_operador = :cod_provincia_operador, cod_localidad_operador = :cod_localidad_operador, cod_provincia_productor = :cod_provincia_productor, cod_localidad_productor = :cod_localidad_productor, corresponde_retiro_productor = :corresponde_retiro_productor, certificado_coe = :certificado_coe, cuit_remitente_comercial_productor = :cuit_remitente_comercial_productor, cuit_destino = :cuit_destino, cuit_destinatario = :cuit_destinatario, es_destino_campo = :es_destino_campo, cod_localidad = :cod_localidad, cod_provincia = :cod_provincia, planta_destino = :planta_destino, cuit_corredor_venta_primaria = :cuit_corredor_venta_primaria, cuit_corredor_venta_secundaria = :cuit_corredor_venta_secundaria, cuit_mercado_a_termino = :cuit_mercado_a_termino, cuit_remitente_comercial_venta_primaria = :cuit_remitente_comercial_venta_primaria, cuit_remitente_comercial_venta_secundaria = :cuit_remitente_comercial_venta_secundaria, cuit_remitente_comercial_venta_secundaria2 = :cuit_remitente_comercial_venta_secundaria2, cuit_representante_entregador = :cuit_representante_entregador, cuit_representante_recibidor = :cuit_representante_recibidor, peso_tara = :peso_tara, peso_bruto = :peso_bruto, cod_grano = :cod_grano, cosecha = :cosecha, cuit_transportista = :cuit_transportista, cuit_pagador_flete = :cuit_pagador_flete, cuit_intermediario_flete = :cuit_intermediario_flete, cuit_chofer = :cuit_chofer, mercaderia_fumigada = :mercaderia_fumigada, km_recorrer = :km_recorrer, tarifa_referencia = :tarifa_referencia, tarifa = :tarifa, codigo_turno = :codigo_turno, fecha_hora_partida = :fecha_hora_partida, dominio = :dominio, datos = :datos, creado_por = :creado_por, creado_el = :creado_el, editado_por = :editado_por, editado_el = :editado_el, activo = :activo, estado = :estado, terminada = :terminada, controlada = :controlada, controlada_final = :controlada_final, sistema = :sistema, observaciones_sistema = :observaciones_sistema, data = :data WHERE id = :id');
			$query->execute(
				[
					'id' => isset($datos['id']) ? $datos['id'] : null,
					'sucursal' => isset($datos['sucursal']) ? $datos['sucursal'] : null,
					'nro_cpe' => isset($datos['nro_cpe']) ? $datos['nro_cpe'] : null,
					'nro_ctg' => isset($datos['nro_ctg']) ? $datos['nro_ctg'] : null,
					'id_movimiento' => isset($datos['id_movimiento']) ? $datos['id_movimiento'] : null,
					'cuit_solicitante' => isset($datos['cuit_solicitante']) ? $datos['cuit_solicitante'] : null,
					'tipo_cpe' => isset($datos['tipo_cpe']) ? $datos['tipo_cpe'] : null,
					'observaciones' => isset($datos['observaciones']) ? $datos['observaciones'] : null,
					'es_solicitante_campo' => isset($datos['es_solicitante_campo']) ? $datos['es_solicitante_campo'] : null,
					'planta_origen' => isset($datos['planta_origen']) ? $datos['planta_origen'] : null,
					'cod_provincia_operador' => isset($datos['cod_provincia_operador']) ? $datos['cod_provincia_operador'] : null,
					'cod_localidad_operador' => isset($datos['cod_localidad_operador']) ? $datos['cod_localidad_operador'] : null,
					'cod_provincia_productor' => isset($datos['cod_provincia_productor']) ? $datos['cod_provincia_productor'] : null,
					'cod_localidad_productor' => isset($datos['cod_localidad_productor']) ? $datos['cod_localidad_productor'] : null,
					'corresponde_retiro_productor' => isset($datos['corresponde_retiro_productor']) ? $datos['corresponde_retiro_productor'] : null,
					'certificado_coe' => isset($datos['certificado_coe']) ? $datos['certificado_coe'] : null,
					'cuit_remitente_comercial_productor' => isset($datos['cuit_remitente_comercial_productor']) ? $datos['cuit_remitente_comercial_productor'] : null,
					'cuit_destino' => isset($datos['cuit_destino']) ? $datos['cuit_destino'] : null,
					'cuit_destinatario' => isset($datos['cuit_destinatario']) ? $datos['cuit_destinatario'] : null,
					'es_destino_campo' => isset($datos['es_destino_campo']) ? $datos['es_destino_campo'] : null,
					'cod_localidad' => isset($datos['cod_localidad']) ? $datos['cod_localidad'] : null,
					'cod_provincia' => isset($datos['cod_provincia']) ? $datos['cod_provincia'] : null,
					'planta_destino' => isset($datos['planta_destino']) ? $datos['planta_destino'] : null,
					'cuit_corredor_venta_primaria' => isset($datos['cuit_corredor_venta_primaria']) ? $datos['cuit_corredor_venta_primaria'] : null,
					'cuit_corredor_venta_secundaria' => isset($datos['cuit_corredor_venta_secundaria']) ? $datos['cuit_corredor_venta_secundaria'] : null,
					'cuit_mercado_a_termino' => isset($datos['cuit_mercado_a_termino']) ? $datos['cuit_mercado_a_termino'] : null,
					'cuit_remitente_comercial_venta_primaria' => isset($datos['cuit_remitente_comercial_venta_primaria']) ? $datos['cuit_remitente_comercial_venta_primaria'] : null,
					'cuit_remitente_comercial_venta_secundaria' => isset($datos['cuit_remitente_comercial_venta_secundaria']) ? $datos['cuit_remitente_comercial_venta_secundaria'] : null,
					'cuit_remitente_comercial_venta_secundaria2' => isset($datos['cuit_remitente_comercial_venta_secundaria2']) ? $datos['cuit_remitente_comercial_venta_secundaria2'] : null,
					'cuit_representante_entregador' => isset($datos['cuit_representante_entregador']) ? $datos['cuit_representante_entregador'] : null,
					'cuit_representante_recibidor' => isset($datos['cuit_representante_recibidor']) ? $datos['cuit_representante_recibidor'] : null,
					'peso_tara' => isset($datos['peso_tara']) ? $datos['peso_tara'] : null,
					'peso_bruto' => isset($datos['peso_bruto']) ? $datos['peso_bruto'] : null,
					'cod_grano' => isset($datos['cod_grano']) ? $datos['cod_grano'] : null,
					'cosecha' => isset($datos['cosecha']) ? $datos['cosecha'] : null,
					'cuit_transportista' => isset($datos['cuit_transportista']) ? $datos['cuit_transportista'] : null,
					'cuit_pagador_flete' => isset($datos['cuit_pagador_flete']) ? $datos['cuit_pagador_flete'] : null,
					'cuit_intermediario_flete' => isset($datos['cuit_intermediario_flete']) ? $datos['cuit_intermediario_flete'] : null,
					'cuit_chofer' => isset($datos['cuit_chofer']) ? $datos['cuit_chofer'] : null,
					'mercaderia_fumigada' => isset($datos['mercaderia_fumigada']) ? $datos['mercaderia_fumigada'] : null,
					'km_recorrer' => isset($datos['km_recorrer']) ? $datos['km_recorrer'] : null,
					'tarifa_referencia' => isset($datos['tarifa_referencia']) ? $datos['tarifa_referencia'] : null,
					'tarifa' => isset($datos['tarifa']) ? $datos['tarifa'] : null,
					'codigo_turno' => isset($datos['codigo_turno']) ? $datos['codigo_turno'] : null,
					'fecha_hora_partida' => isset($datos['fecha_hora_partida']) ? $datos['fecha_hora_partida'] : null,
					'dominio' => isset($datos['dominio']) ? $datos['dominio'] : null,
					'datos' => isset($datos['datos']) ? $datos['datos'] : null,
					'creado_por' => isset($datos['creado_por']) ? $datos['creado_por'] : null,
					'creado_el' => isset($datos['creado_el']) ? $datos['creado_el'] : null,
					'editado_por' => isset($datos['editado_por']) ? $datos['editado_por'] : null,
					'editado_el' => isset($datos['editado_el']) ? $datos['editado_el'] : null,
					'activo' => isset($datos['activo']) ? $datos['activo'] : null,
					'estado' => isset($datos['estado']) ? $datos['estado'] : null,
					'terminada' => isset($datos['terminada']) ? $datos['terminada'] : null,
					'controlada' => isset($datos['controlada']) ? $datos['controlada'] : null,
					'controlada_final' => isset($datos['controlada_final']) ? $datos['controlada_final'] : null,
					'sistema' => isset($datos['sistema']) ? $datos['sistema'] : null,
					'observaciones_sistema' => isset($datos['observaciones_sistema']) ? $datos['observaciones_sistema'] : null,
					'data' => isset($datos['data']) ? $datos['data'] : null,
				]
			);
			return $query;
		}
	}
	function create($datos)
	{
		if($datos['id'] != null){
			$query = $this->connect()->prepare('INSERT INTO carta_porte (id, sucursal, nro_cpe, nro_ctg, id_movimiento, cuit_solicitante, tipo_cpe, observaciones, es_solicitante_campo, planta_origen, cod_provincia_operador, cod_localidad_operador, cod_provincia_productor, cod_localidad_productor, corresponde_retiro_productor, certificado_coe, cuit_remitente_comercial_productor, cuit_destino, cuit_destinatario, es_destino_campo, cod_localidad, cod_provincia, planta_destino, cuit_corredor_venta_primaria, cuit_corredor_venta_secundaria, cuit_mercado_a_termino, cuit_remitente_comercial_venta_primaria, cuit_remitente_comercial_venta_secundaria, cuit_remitente_comercial_venta_secundaria2, cuit_representante_entregador, cuit_representante_recibidor, peso_tara, peso_bruto, cod_grano, cosecha, cuit_transportista, cuit_pagador_flete, cuit_intermediario_flete, cuit_chofer, mercaderia_fumigada, km_recorrer, tarifa_referencia, tarifa, codigo_turno, fecha_hora_partida, dominio, datos, creado_por, creado_el, editado_por, editado_el, activo, estado, terminada, controlada, controlada_final, sistema, observaciones_sistema, data) VALUES (:id, :sucursal, :nro_cpe, :nro_ctg, :id_movimiento, :cuit_solicitante, :tipo_cpe, :observaciones, :es_solicitante_campo, :planta_origen, :cod_provincia_operador, :cod_localidad_operador, :cod_provincia_productor, :cod_localidad_productor, :corresponde_retiro_productor, :certificado_coe, :cuit_remitente_comercial_productor, :cuit_destino, :cuit_destinatario, :es_destino_campo, :cod_localidad, :cod_provincia, :planta_destino, :cuit_corredor_venta_primaria, :cuit_corredor_venta_secundaria, :cuit_mercado_a_termino, :cuit_remitente_comercial_venta_primaria, :cuit_remitente_comercial_venta_secundaria, :cuit_remitente_comercial_venta_secundaria2, :cuit_representante_entregador, :cuit_representante_recibidor, :peso_tara, :peso_bruto, :cod_grano, :cosecha, :cuit_transportista, :cuit_pagador_flete, :cuit_intermediario_flete, :cuit_chofer, :mercaderia_fumigada, :km_recorrer, :tarifa_referencia, :tarifa, :codigo_turno, :fecha_hora_partida, :dominio, :datos, :creado_por, :creado_el, :editado_por, :editado_el, :activo, :estado, :terminada, :controlada, :controlada_final, :sistema, :observaciones_sistema, :data)');
			$query->execute(
				[
					'id' => isset($datos['id']) ? $datos['id'] : null,
					'sucursal' => isset($datos['sucursal']) ? $datos['sucursal'] : null,
					'nro_cpe' => isset($datos['nro_cpe']) ? $datos['nro_cpe'] : null,
					'nro_ctg' => isset($datos['nro_ctg']) ? $datos['nro_ctg'] : null,
					'id_movimiento' => isset($datos['id_movimiento']) ? $datos['id_movimiento'] : null,
					'cuit_solicitante' => isset($datos['cuit_solicitante']) ? $datos['cuit_solicitante'] : null,
					'tipo_cpe' => isset($datos['tipo_cpe']) ? $datos['tipo_cpe'] : null,
					'observaciones' => isset($datos['observaciones']) ? $datos['observaciones'] : null,
					'es_solicitante_campo' => isset($datos['es_solicitante_campo']) ? $datos['es_solicitante_campo'] : null,
					'planta_origen' => isset($datos['planta_origen']) ? $datos['planta_origen'] : null,
					'cod_provincia_operador' => isset($datos['cod_provincia_operador']) ? $datos['cod_provincia_operador'] : null,
					'cod_localidad_operador' => isset($datos['cod_localidad_operador']) ? $datos['cod_localidad_operador'] : null,
					'cod_provincia_productor' => isset($datos['cod_provincia_productor']) ? $datos['cod_provincia_productor'] : null,
					'cod_localidad_productor' => isset($datos['cod_localidad_productor']) ? $datos['cod_localidad_productor'] : null,
					'corresponde_retiro_productor' => isset($datos['corresponde_retiro_productor']) ? $datos['corresponde_retiro_productor'] : null,
					'certificado_coe' => isset($datos['certificado_coe']) ? $datos['certificado_coe'] : null,
					'cuit_remitente_comercial_productor' => isset($datos['cuit_remitente_comercial_productor']) ? $datos['cuit_remitente_comercial_productor'] : null,
					'cuit_destino' => isset($datos['cuit_destino']) ? $datos['cuit_destino'] : null,
					'cuit_destinatario' => isset($datos['cuit_destinatario']) ? $datos['cuit_destinatario'] : null,
					'es_destino_campo' => isset($datos['es_destino_campo']) ? $datos['es_destino_campo'] : null,
					'cod_localidad' => isset($datos['cod_localidad']) ? $datos['cod_localidad'] : null,
					'cod_provincia' => isset($datos['cod_provincia']) ? $datos['cod_provincia'] : null,
					'planta_destino' => isset($datos['planta_destino']) ? $datos['planta_destino'] : null,
					'cuit_corredor_venta_primaria' => isset($datos['cuit_corredor_venta_primaria']) ? $datos['cuit_corredor_venta_primaria'] : null,
					'cuit_corredor_venta_secundaria' => isset($datos['cuit_corredor_venta_secundaria']) ? $datos['cuit_corredor_venta_secundaria'] : null,
					'cuit_mercado_a_termino' => isset($datos['cuit_mercado_a_termino']) ? $datos['cuit_mercado_a_termino'] : null,
					'cuit_remitente_comercial_venta_primaria' => isset($datos['cuit_remitente_comercial_venta_primaria']) ? $datos['cuit_remitente_comercial_venta_primaria'] : null,
					'cuit_remitente_comercial_venta_secundaria' => isset($datos['cuit_remitente_comercial_venta_secundaria']) ? $datos['cuit_remitente_comercial_venta_secundaria'] : null,
					'cuit_remitente_comercial_venta_secundaria2' => isset($datos['cuit_remitente_comercial_venta_secundaria2']) ? $datos['cuit_remitente_comercial_venta_secundaria2'] : null,
					'cuit_representante_entregador' => isset($datos['cuit_representante_entregador']) ? $datos['cuit_representante_entregador'] : null,
					'cuit_representante_recibidor' => isset($datos['cuit_representante_recibidor']) ? $datos['cuit_representante_recibidor'] : null,
					'peso_tara' => isset($datos['peso_tara']) ? $datos['peso_tara'] : null,
					'peso_bruto' => isset($datos['peso_bruto']) ? $datos['peso_bruto'] : null,
					'cod_grano' => isset($datos['cod_grano']) ? $datos['cod_grano'] : null,
					'cosecha' => isset($datos['cosecha']) ? $datos['cosecha'] : null,
					'cuit_transportista' => isset($datos['cuit_transportista']) ? $datos['cuit_transportista'] : null,
					'cuit_pagador_flete' => isset($datos['cuit_pagador_flete']) ? $datos['cuit_pagador_flete'] : null,
					'cuit_intermediario_flete' => isset($datos['cuit_intermediario_flete']) ? $datos['cuit_intermediario_flete'] : null,
					'cuit_chofer' => isset($datos['cuit_chofer']) ? $datos['cuit_chofer'] : null,
					'mercaderia_fumigada' => isset($datos['mercaderia_fumigada']) ? $datos['mercaderia_fumigada'] : null,
					'km_recorrer' => isset($datos['km_recorrer']) ? $datos['km_recorrer'] : null,
					'tarifa_referencia' => isset($datos['tarifa_referencia']) ? $datos['tarifa_referencia'] : null,
					'tarifa' => isset($datos['tarifa']) ? $datos['tarifa'] : null,
					'codigo_turno' => isset($datos['codigo_turno']) ? $datos['codigo_turno'] : null,
					'fecha_hora_partida' => isset($datos['fecha_hora_partida']) ? $datos['fecha_hora_partida'] : null,
					'dominio' => isset($datos['dominio']) ? $datos['dominio'] : null,
					'datos' => isset($datos['datos']) ? $datos['datos'] : null,
					'creado_por' => isset($datos['creado_por']) ? $datos['creado_por'] : null,
					'creado_el' => isset($datos['creado_el']) ? $datos['creado_el'] : null,
					'editado_por' => isset($datos['editado_por']) ? $datos['editado_por'] : null,
					'editado_el' => isset($datos['editado_el']) ? $datos['editado_el'] : null,
					'activo' => isset($datos['activo']) ? $datos['activo'] : null,
					'estado' => isset($datos['estado']) ? $datos['estado'] : null,
					'terminada' => isset($datos['terminada']) ? $datos['terminada'] : null,
					'controlada' => isset($datos['controlada']) ? $datos['controlada'] : null,
					'controlada_final' => isset($datos['controlada_final']) ? $datos['controlada_final'] : null,
					'sistema' => isset($datos['sistema']) ? $datos['sistema'] : null,
					'observaciones_sistema' => isset($datos['observaciones_sistema']) ? $datos['observaciones_sistema'] : null,
					'data' => isset($datos['data']) ? $datos['data'] : null,
				]
			);
			return $query;
		}
	}
}
?>