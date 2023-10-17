<?php

require_once './app/models/listas.model.php';
require_once './app/views/listas.view.php';

class ListasController {
    private $model;
    private $view;

    public function __construct() {
        $this->model = new ListasModel();
        $this->view = new ListasView();
    }
    
    function showDiscos(){
        $discos = $this->model->getDiscos();
        $this->view->showDiscos($discos);
    }
    
    function filtrarDiscos(){
        $artistaDeseado= $_POST['artistas'];
        echo "Variable artistaDeseado recibida por _post: ";
        var_dump($artistaDeseado);
        if($artistaDeseado=="Todos"){
            $discos = $this->model->getDiscos();
        }
        else{
            $discos = $this->model->getDiscosFiltrados($artistaDeseado);
        }
        echo " | Lo que llegó a la funcion filtrarDiscos(): ";
        var_dump($discos);
        $this->view->showDiscos($discos);
    }

    function showArtistas(){
        $artistas = $this->model->getArtistas();
        $this->view->showArtistas($artistas);
    }

    function showAlbSeleccionados(){
        $albums = $this->model->getSelectedAlbums();
        $this->view->showDiscos($albums);
    }
    
    function showArtSeleccionados(){
        $artistas = $this->model->getSelectedArtists();
        $this->view->showArtistas($artistas);
    }

}