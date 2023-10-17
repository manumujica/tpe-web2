<?php
require_once './app/controllers/lista.discos.controller.php';
require_once './app/controllers/discos.controller.php';
require_once './app/controllers/artistas.controller.php';

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
    case 'listardiscos':
        $controller = new DiscosController();
        $controller->showAlbums();
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
}
