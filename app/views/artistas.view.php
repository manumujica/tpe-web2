<?php

class ArtistasView{
    public function showArtists($artists){
        require 'templates/addartist.phtml';
        require 'templates/showArtistsAdmin.phtml';
    }

    public function showAddArtist(){
        require_once './templates/addartist.phtml';
    }

    public function showError($error){
        require 'templates/error.phtml';
    }
}