<?php

class ListasView {
    public function showDiscos($discos) {
        $count = count($discos);
        require 'templates/discosList.phtml';
    }

    public function showArtistas($artistas) {
        $count = count($artistas);
        require 'templates/artistasList.phtml';
    }

    public function showError($error) {
        require 'templates/error.phtml';
    }
}
