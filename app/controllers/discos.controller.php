<?php

include_once './app/models/discos.model.php';
include_once './app/views/discos.view.php';

class DiscosController {
    
    private $model;
    private $view;

    function __construct(){
        $this->model = new DiscosModel();
        $this->view = new DiscosView();
    }

    function showAlbums(){
        $albums = $this->model->getAlbums();
        //$artists = $this->model->getArtistsForAlbum();
        $this->view->showAlbums($albums);
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

    function showSeleccionados(){
        $albums = $this->model->getSelectedAlbums();
        $this->view->showAlbums($albums);
    }
}