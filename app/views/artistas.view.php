<?php

class ArtistasView{
    public function showArtists($artists){
        require 'templates/addartist.phtml';
        require 'templates/showArtistsAdmin.phtml';
    }
    public function showError($error){
        require 'templates/error.phtml';
    }
}