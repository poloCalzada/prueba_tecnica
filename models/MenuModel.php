<?php

/**
 * 
 */
class MenuModel {	
	private $conexion;
	private $sql = null;
	
	function __construct() {
		$this->conexion = (new Conexion())->connect();
	}

	public function create($obj) {
		try {
			$fields = implode(', ', array_keys($obj));
			$values = ':'.implode(', :', array_keys($obj));
			$this->sql = "INSERT INTO menus ({$fields}) VALUES ({$values})";
			$rowAfected = $this->run($obj);
			return $rowAfected;
		} catch (Exception $e) {
			echo $e->getMessage();
		}
	}

	public function read() {
		try {
			$this->sql = "SELECT
							id_menu,
							nombre_menu,
							descripcion_menu,
							IF(menus.id_menu_padre = 0, '', (SELECT menu_padre.nombre_menu_padre FROM menu_padre WHERE menu_padre.id_menu_padre = menus.id_menu_padre)) AS menu_padre
						FROM
							menus";
			$sth = $this->conexion->prepare($this->sql);
			$sth->execute();
			return $sth->fetchAll(PDO::FETCH_ASSOC);
		} catch (Exception $e) {
			echo $e->getMessage();
		}
	}

	public function listMenu() {
		try {
			$this->sql = "SELECT * FROM menu_padre";
			$sth = $this->conexion->prepare($this->sql);
			$sth->execute();
			return $sth->fetchAll(PDO::FETCH_ASSOC);
		} catch (Exception $e) {
			echo $e->getMessage();
		}
	}

	public function listOptionsMenu($idMenuPadre) {
		try {
			$this->sql = "SELECT * FROM menus WHERE id_menu_padre = :id";
			$sth = $this->conexion->prepare($this->sql);
			$sth->bindValue(':id', $idMenuPadre);
			$sth->execute();
			return $sth->fetchAll(PDO::FETCH_ASSOC);
		} catch (Exception $e) {
			echo $e->getMessage();
		}
	}

	public function update($obj, $id) {
		try {
			$fields = '';
			foreach ($obj as $key => $value) {
				$fields .= "$key = :$key,";
			}
			$fields = rtrim($fields, ',');
			$this->sql = "UPDATE menus SET {$fields} WHERE id_menu = $id";
			$rowAfected = $this->run($obj);
			return $rowAfected;
		} catch (Exception $e) {
			echo $e->getMessage();
		}
	}

	public function delete($obj) {
		try {
			$this->sql = "DELETE FROM menus WHERE id_menu = :id";
			$rowAfected = $this->run($obj);
			return $rowAfected;
		} catch (Exception $e) {
			echo $e->getMessage();
		}
	}

	public function getMenu($id) {
		try {
			$this->sql = "SELECT * FROM menus WHERE id_menu = :id";
			$sth = $this->conexion->prepare($this->sql);
			$sth->bindValue(':id', $id);
			$sth->execute();
			return $sth->fetch(PDO::FETCH_ASSOC);
		} catch (PDOException $e) {
			echo $e->getMessage();
		}
	}

	public function run($obj = null) {		
		if ($obj !== null) {
			$sth = $this->conexion->prepare($this->sql);
			foreach ($obj as $key => $value) {
				$sth->bindValue(":$key", $value);
			}
			$sth->execute();
			return $sth->rowCount();
		}
	}
}