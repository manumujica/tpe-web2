<?php

include_once './app/models/discos.model.php';
include_once './app/models/artistas.model.php';
include_once './app/views/discos.view.php';
include_once './app/helpers/auth.helper.php';

class DiscosController {
    
    private $model;
    private $view;

    function __construct(){
        AuthHelper::verify();
        $this->model = new DiscosModel();
        $this->view = new DiscosView();
    }
    function showAlbumsAdmin(){
        $albums = $this->model->getAlbums();
        $this->view->showAlbums($albums);
    }

    function showAddalbum(){
        $artists = $this->model->getArtistsForAlbum();
        $this->view->showAddAlbum($artists);
    }

    function addAlbum(){
        if(!isset($_POST['album']) || !isset($_POST['dor']) || !isset($_POST['id_artist']) || !isset($_POST['duration'])){
            $this->view->showError("Error en la validación. No se puede agregar album.");
            return;
        }
        $album_name = $_POST['album'];
        $release_date = $_POST['dor'];
        $id_artist = $_POST['id_artist'];
        $duration = $_POST['duration'];

        $id = $this->model->insertAlbum($album_name, $release_date, $id_artist, $duration);

        if($id){
            header('Location: ' . BASE_URL . 'listardiscos');
        } else {
            $this->view->showError("Error al insertar el álbum");
        }
    }

    function removeAlbum($id) {
        $this->model->deleteAlbum($id);
        header('Location: ' . BASE_URL . 'listardiscos');
    }

    function addAlbumToSelection($id){
        $this->model->updateAlbum($id);
        header('Location: ' . BASE_URL . 'listardiscos');
    }

    function removeAlbumFromSelection($id){
        $this->model->restoreAlbum($id);
        header('Location: ' . BASE_URL . 'listardiscos');
    }

    function showLoggedHome(){
        $this->view->showAdminMenu();
    }

    //Por acá están las funciones de los usuarios publicos
    function showAlbumsPublic(){
        $albums = $this->model->getAlbums();
        $this->view->showAlbumsPublic($albums);
        $this->showFiltro();
    }

    function showFiltro(){
        //pido los artistas para mostrarlos en el select del form de filtradodinamicamente
        $modelArtistas = new ArtistasModel;
        $artistas = $modelArtistas->getArtists();
        $this->view->showFiltroPublic($artistas);
    }

    function showDetalleDiscoById($id){
        $disco=$this->model->getDiscoById($id);
        $this->view->showDetalleDisco($disco);
    }

    function filtrarDiscos(){
        //recibo por $_POST el artista por el que quiero filtrar los discos mostrados y lo guardo en variable
        $artistaDeseado= $_POST['artistas'];
        if($artistaDeseado=="Todos"){$discos = $this->model->getAlbums();}
        else{$discos = $this->model->getDiscosFiltrados($artistaDeseado);}

        if (count($discos)==0){
            $error="No hay discos de éste artista";
            $this->view->showError($error);
            $this->showFiltro();
        }
        else{
            $this->view->showAlbumsPublic($discos);
            $this->showFiltro();
        }        
    }

    function showAlbSeleccionados(){
        $albums = $this->model->getSelectedAlbums();
        $this->view->showAlbumsPublic($albums);
    }


}