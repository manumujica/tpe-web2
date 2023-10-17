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

// discos       ->          ListasController->showDiscos();
// login        ->          

$params = explode('/', $action);

switch ($params[0]) {
    case 'login':
        $controller = new AuthController();
        $controller->showLogin();
        break;
    case 'verificarusuario':
        $controller = new AuthController();
        $controller->verifyUser();
        break;
    case 'registrarse':
        $controller = new AuthController();
        $controller->registerUser();
        break;
    case 'verificarregistro':
        $controller = new AuthController();
        $controller->verifyRegistry();
        break;
    case 'logout':
        $controller = new AuthController();
        $controller->logout();
        break;
    case 'discos':
        $controller = new ListasController();
        $controller->showDiscos();
        break;
    case 'detalleDiscos': 
        $controller = new ListasController();
        $controller->showDetalleDiscoById($params[1]);        
        break;
    case 'artistas':
        $controller = new ListasController();
        $controller->showArtistas();
        break;
    case 'filtrar':
        $controller = new ListasController();
        $controller->filtrarDiscos();
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
    case 'formagregarartista':
        $controller = new ArtistasController();
        $controller->showAddArtist();
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
        $controller = new ListasController();
        $controller->showAlbSeleccionados();
        break;
    case 'artistasseleccionados':
        $controller = new ListasController();
        $controller->showArtSeleccionados();
        break;
    case 'loginhome':
        $controller = new DiscosController();
        $controller->showLoggedHome();
        break;
}
