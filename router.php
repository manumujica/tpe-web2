<?php
require_once './app/controllers/listas.controller.php';
require_once './app/controllers/discos.controller.php';
require_once './app/controllers/artistas.controller.php';
require_once './app/controllers/auth.controller.php';

define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');


$action = 'discos';

if (!empty( $_GET['action'])) {
    $action = $_GET['action'];
}

// listar    ->         taskController->showList();

$params = explode('/', $action);

switch ($params[0]) {
    case 'login':
        $controller = new AuthController();
        $controller->showLogin();
        break;
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
    case 'listardiscos':
        $controller = new DiscosController();
        $controller->showAlbums();
        break;
    case 'formagregardisco':
        $controller = new DiscosController();
        $controller->showAddalbum();
        break;
    case 'agregardisco':
        $controller = new DiscosController();
        $controller->addAlbum();
        break;
    case 'eliminardisco':
        $controller = new DiscosController();
        $controller->removeAlbum($params[1]);
        break;
    case 'seleccionardisco':
        $controller = new DiscosController();
        $controller->addAlbumToSelection($params[1]);
        break;
    case 'deseleccionardisco':
        $controller = new DiscosController();
        $controller->removeAlbumFromSelection($params[1]);
        break;
    case 'listarartistas':
        $controller = new ArtistasController();
        $controller->showArtists();
        break;
    case 'agregarartista':
        $controller = new ArtistasController();
        $controller->addArtist();
        break;
    case 'eliminarartista':
        $controller = new ArtistasController();
        $controller->removeArtist($params[1]);
        break;
    case 'seleccionarartista':
        $controller = new ArtistasController();
        $controller->addArtistToSelection($params[1]);
        break;
    case 'deseleccionarartista':
        $controller = new ArtistasController();
        $controller->removeArtistFromSelection($params[1]);
        break;
    case 'discosseleccionados':
        $controller = new DiscosController;
        $controller->showSeleccionados();
        break;
    case 'artistasseleccionados':
        $controller = new ArtistasController;
        $controller->showSeleccionados();
        break;
}
