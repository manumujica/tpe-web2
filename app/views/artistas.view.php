<?php

class ArtistasView{
    public function showArtistsAdmin($artists){
        require 'templates/showArtistsAdmin.phtml';
    }

    public function showArtistasPublic($artistas) {
        $count = count($artistas);
        require 'templates/artistasListPublic.phtml';
    }

    public function showAddArtist(){
        require_once './templates/addartist.phtml';
    }

    public function showError($error){
        require 'templates/error.phtml';
    }
}