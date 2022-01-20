<?php

class MenuController {
	private $menuModel;

	function __construct() {
		$this->menuModel = new MenuModel();
	}

	public function index() {
		require_once 'views/listMenu.php';
	}

	public function newAction() {
		$menuPadre = $this->menuModel->listMenu();
		require_once 'views/newMenu.php';
	}

	public function createAction() {
		$obj = [
			'id_menu_padre' => $_POST['menu_padre'],
			'nombre_menu' => $_POST['nombre'],
			'descripcion_menu' => $_POST['descripcion']
		];
		$res = $this->menuModel->create($obj);
		$this->readAction();
		$msj = $res === 1 ? 'Insertado' : 'No insertado';
		echo $msj;
	}

	public function readAction() {
		$menus = $this->menuData();
		$datos = $this->menuModel->read();
		require_once 'views/listMenu.php';		
	}

	public function menuData() {
		$menus = [];
		$menuPadre = $this->menuModel->listMenu();		
		foreach ($menuPadre as $key => $value) {
			$opciones = [];
			$menuOptions = $this->menuModel->listOptionsMenu($value['id_menu_padre']);
			foreach ($menuOptions as $key2 => $value2) {
				$opciones[] = [
					"id_menu" => $value2['id_menu'],
					"menus" => $value2['nombre_menu']
				];
			}

			$menus[] = [
				"id_menu_padre" => $value['id_menu_padre'],
				"nombre_menu_padre" => $value['nombre_menu_padre'],
				"menus" => $opciones
			];			
		}
		return $menus;
	}

	public function updateAction() {
		$id = $_GET['id'];
		$obj = [
			'id_menu_padre' => $_POST['menu_padre'],
			'nombre_menu' => $_POST['nombre'],
			'descripcion_menu' => $_POST['descripcion']
		];
		$res = $this->menuModel->update($obj, $id);
		$this->readAction();
		$msj = $res === 1 ? 'Modificado' : 'No modificado';
		echo $msj;
	}

	public function deleteAction() {
		$obj = [
			'id' => $_GET['id']
		];
		$res = $this->menuModel->delete($obj);
		$this->readAction();
		$msj = $res === 1 ? 'Eliminado' : 'No eliminado';
		echo $msj;
	}

	public function getMenuAction() {	
		$id = $_GET['id'];
		$dato = $this->menuModel->getMenu($id);
		$menuPadre = $this->menuModel->listMenu();
		require_once 'views/editMenu.php';
	}

	public function showDescription() {
		$id = $_GET['id'];
		$menus = $this->menuData();
		$dato = $this->menuModel->getMenu($id);
		require_once 'views/showDescription.php';
	}

}
