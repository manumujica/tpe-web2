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
        $this->showFiltro();
    }
    
    function filtrarDiscos(){
        //recibo por $_POST el artista por el que quiero filtrar los discos mostrados y lo guardo en variable
        $artistaDeseado= $_POST['artistas'];
        if($artistaDeseado=="Todos"){$discos = $this->model->getDiscos();}
        else{$discos = $this->model->getDiscosFiltrados($artistaDeseado);}

        if (count($discos)==0){
            $error="No hay discos de éste artista";
            $this->view->showError($error);
            $this->showFiltro();
        }
        else{
            $this->view->showDiscos($discos);
            $this->showFiltro();
        }        
        //$this->view->showDiscos($discos);
        //$this->showFiltro();
    }

    function showDetalleDiscoById($id){
        $disco=$this->model->getDiscoById($id);
        $this->view->showDetalleDisco($disco);
    }

    function showArtistas(){
        $artistas = $this->model->getArtistas();
        $this->view->showArtistas($artistas);
    }
    
    function showFiltro(){
        //pido los artistas para mostrarlos en el select del form de filtradodinamicamente
        $artistas = $this->model->getArtistas();
        $this->view->showFiltro($artistas);
    }

}