<?php
include_once 'db.php';
class intervinientesDB extends DB
{
	function getAll()
	{
		$sql = 'SELECT * FROM intervinientes WHERE estado != 0';
		$query = $this->connect()->query($sql);
		return $query;
	}
	function getID($idd)
	{
		$sql = 'SELECT * FROM intervinientes WHERE id=:idd';
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
		$sql = 'SELECT * FROM intervinientes';
		$query = $this->connect()->query($sql);
		return $query;
	}
	function getAllForSync()
	{
		$sql = 'SELECT id, editado_el FROM intervinientes';
		$query = $this->connect()->query($sql);
		return $query;
	}
	function update($datos)
	{
		if($datos['id'] != null){
			$query = $this->connect()->prepare('UPDATE intervinientes SET id = :id, alias = :alias, razon_social = :razon_social, cuit = :cuit, codigo = :codigo, creado_por = :creado_por, creado_el = :creado_el, editado_por = :editado_por, editado_el = :editado_el, dstro = :dstro, dstno = :dstno, corvtapri = :corvtapri, corvtasec = :corvtasec, mertermino = :mertermino, rtecomvtapri = :rtecomvtapri, rtecomvtasec = :rtecomvtasec, rtecomvtasec2 = :rtecomvtasec2, rteent = :rteent, rterec = :rterec, rtecomprod = :rtecomprod, intflet = :intflet, pagflet = :pagflet, activo = :activo, estado = :estado WHERE id = :id');
			$query->execute(
				[
					'id' => isset($datos['id']) ? $datos['id'] : null,
					'alias' => isset($datos['alias']) ? $datos['alias'] : null,
					'razon_social' => isset($datos['razon_social']) ? $datos['razon_social'] : null,
					'cuit' => isset($datos['cuit']) ? $datos['cuit'] : null,
					'codigo' => isset($datos['codigo']) ? $datos['codigo'] : null,
					'creado_por' => isset($datos['creado_por']) ? $datos['creado_por'] : null,
					'creado_el' => isset($datos['creado_el']) ? $datos['creado_el'] : null,
					'editado_por' => isset($datos['editado_por']) ? $datos['editado_por'] : null,
					'editado_el' => isset($datos['editado_el']) ? $datos['editado_el'] : null,
					'dstro' => isset($datos['dstro']) ? $datos['dstro'] : null,
					'dstno' => isset($datos['dstno']) ? $datos['dstno'] : null,
					'corvtapri' => isset($datos['corvtapri']) ? $datos['corvtapri'] : null,
					'corvtasec' => isset($datos['corvtasec']) ? $datos['corvtasec'] : null,
					'mertermino' => isset($datos['mertermino']) ? $datos['mertermino'] : null,
					'rtecomvtapri' => isset($datos['rtecomvtapri']) ? $datos['rtecomvtapri'] : null,
					'rtecomvtasec' => isset($datos['rtecomvtasec']) ? $datos['rtecomvtasec'] : null,
					'rtecomvtasec2' => isset($datos['rtecomvtasec2']) ? $datos['rtecomvtasec2'] : null,
					'rteent' => isset($datos['rteent']) ? $datos['rteent'] : null,
					'rterec' => isset($datos['rterec']) ? $datos['rterec'] : null,
					'rtecomprod' => isset($datos['rtecomprod']) ? $datos['rtecomprod'] : null,
					'intflet' => isset($datos['intflet']) ? $datos['intflet'] : null,
					'pagflet' => isset($datos['pagflet']) ? $datos['pagflet'] : null,
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
			$query = $this->connect()->prepare('INSERT INTO intervinientes (id, alias, razon_social, cuit, codigo, creado_por, creado_el, editado_por, editado_el, dstro, dstno, corvtapri, corvtasec, mertermino, rtecomvtapri, rtecomvtasec, rtecomvtasec2, rteent, rterec, rtecomprod, intflet, pagflet, activo, estado) VALUES (:id, :alias, :razon_social, :cuit, :codigo, :creado_por, :creado_el, :editado_por, :editado_el, :dstro, :dstno, :corvtapri, :corvtasec, :mertermino, :rtecomvtapri, :rtecomvtasec, :rtecomvtasec2, :rteent, :rterec, :rtecomprod, :intflet, :pagflet, :activo, :estado)');
			$query->execute(
				[
					'id' => isset($datos['id']) ? $datos['id'] : null,
					'alias' => isset($datos['alias']) ? $datos['alias'] : null,
					'razon_social' => isset($datos['razon_social']) ? $datos['razon_social'] : null,
					'cuit' => isset($datos['cuit']) ? $datos['cuit'] : null,
					'codigo' => isset($datos['codigo']) ? $datos['codigo'] : null,
					'creado_por' => isset($datos['creado_por']) ? $datos['creado_por'] : null,
					'creado_el' => isset($datos['creado_el']) ? $datos['creado_el'] : null,
					'editado_por' => isset($datos['editado_por']) ? $datos['editado_por'] : null,
					'editado_el' => isset($datos['editado_el']) ? $datos['editado_el'] : null,
					'dstro' => isset($datos['dstro']) ? $datos['dstro'] : null,
					'dstno' => isset($datos['dstno']) ? $datos['dstno'] : null,
					'corvtapri' => isset($datos['corvtapri']) ? $datos['corvtapri'] : null,
					'corvtasec' => isset($datos['corvtasec']) ? $datos['corvtasec'] : null,
					'mertermino' => isset($datos['mertermino']) ? $datos['mertermino'] : null,
					'rtecomvtapri' => isset($datos['rtecomvtapri']) ? $datos['rtecomvtapri'] : null,
					'rtecomvtasec' => isset($datos['rtecomvtasec']) ? $datos['rtecomvtasec'] : null,
					'rtecomvtasec2' => isset($datos['rtecomvtasec2']) ? $datos['rtecomvtasec2'] : null,
					'rteent' => isset($datos['rteent']) ? $datos['rteent'] : null,
					'rterec' => isset($datos['rterec']) ? $datos['rterec'] : null,
					'rtecomprod' => isset($datos['rtecomprod']) ? $datos['rtecomprod'] : null,
					'intflet' => isset($datos['intflet']) ? $datos['intflet'] : null,
					'pagflet' => isset($datos['pagflet']) ? $datos['pagflet'] : null,
					'activo' => isset($datos['activo']) ? $datos['activo'] : null,
					'estado' => isset($datos['estado']) ? $datos['estado'] : null,
				]
			);
			return $query;
		}
	}
}
?>