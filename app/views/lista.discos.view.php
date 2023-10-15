<?php

class ListaDiscosView {
    public function showDiscos($discos) {
        $count = count($discos);
        require 'templates/discosList.phtml';
    }

    public function showError($error) {
        require 'templates/error.phtml';
    }
}
