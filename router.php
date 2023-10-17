<?php
require_once './app/controllers/listas.controller.php';

define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');


$action = 'discos';

if (!empty( $_GET['action'])) {
    $action = $_GET['action'];
}

// listar    ->         taskController->showList();

$params = explode('/', $action);

switch ($params[0]) {
    case 'discos':
        $controller = new ListasController();
        $controller->showDiscos();
        break;
    case 'artistas':
        $controller = new ListasController();
        $controller->showArtistas();
        break;
    case 'filtrar':
        $controller = new ListasController();
        $controller->filtrarDiscos();
        break;
    case 'login':
        require 'templates/header.phtml';
        break;
    }