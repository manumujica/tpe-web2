<?php
require_once './app/controllers/lista.discos.controller.php';

define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');


$action = 'listar';

if (!empty( $_GET['action'])) {
    $action = $_GET['action'];
}

// listar    ->         taskController->showList();

$params = explode('/', $action);

switch ($params[0]) {
    case 'listar':
        $controller = new ListaDiscosController();
        $controller->showDiscos();
        break;
    }