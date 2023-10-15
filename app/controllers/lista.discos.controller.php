<?php

require_once './app/models/lista.discos.model.php';
require_once './app/views/lista.discos.view.php';

class ListaDiscosController {
    private $model;
    private $view;

    public function __construct() {
        $this->model = new ListaDiscosModel();
        $this->view = new ListaDiscosView();
    }
    
    function showDiscos(){
        $discos = $this->model->getDiscos();
        $this->view->showDiscos($discos);
    }


}