<?php

include_once './app/models/lista.discos.model.php';
include_once './app/views/lista.discos.view.php';

class DiscosController {
    
    private $model;
    private $view;

    function __construct() {
        $this->model = new DiscosModel();
        $this->view = new DiscosView();
    }

    function showAlbums() {
        $discos = $this->model->getAlbums();
    }

}