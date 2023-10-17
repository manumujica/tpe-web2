<?php

include_once './app/models/artistas.model.php';
include_once './app/views/artistas.view.php';
include_once './app/helpers/auth.helper.php';

class ArtistasController{

    private $model;
    private $view;

    function __construct(){
        AuthHelper::verify();
        $this->model = new ArtistasModel();
        $this->view = new ArtistasView();
    }

    function showArtists(){
        $artists = $this->model->getArtists();
        $this->view->showArtists($artists);
    }

    function addArtist(){
        if(!isset($_POST['artist']) || !isset($_POST['dob']) || !isset($_POST['pob'])){
            $this->view->showError("Error en la validación. No se puede agregar el artista.");
            return;
        }
        $artist_name = $_POST['artist'];
        $artist_dob = $_POST['dob'];
        $artist_pob= $_POST['pob'];

        $id = $this->model->insertArtist($artist_name, $artist_dob, $artist_pob);

        if($id){
            header('Location: ' . BASE_URL . 'listarartistas');
        } else {
            $this->view->showError("Error al insertar el artista");
        }
    }

    function removeArtist($id){
        $this->model->deleteArtist($id);
        header('Location: ' . BASE_URL . 'listarartistas');
    }

    function addArtistToSelection($id){
        $this->model->updateArtist($id);
        header('Location: ' . BASE_URL . 'listarartistas');
    }

    function removeArtistFromSelection($id) {
        $this->model->restoreArtist($id);
        header('Location: ' . BASE_URL . 'listarartistas');
    }
}