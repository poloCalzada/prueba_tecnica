<?php

require_once 'config/Conexion.php';
require_once 'controllers/MenuController.php';
require_once 'models/MenuModel.php';

$menuController = new MenuController();

if (empty($_GET['action'])) {
    $action = 'list';
} else {
    $action = $_GET['action'];
}

switch ($action) {
    case 'list':
        $menuController->readAction();
        break;

    case 'new':
        $menuController->newAction();
        break;

    case 'save':
        $menuController->createAction();
        break;

    case 'edit':
        $menuController->getMenuAction();
        break;

    case 'update':
        $menuController->updateAction();
        break;

    case 'delete':
        $menuController->deleteAction();
        break;

    case 'description':
        $menuController->showDescription();
        break;

    default:
        echo "url no valida";
        break;
}
