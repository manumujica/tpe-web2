<?php

class DiscosView {
    public function showAlbums($albums){
        require_once './templates/showAlbumsAdmin.phtml';
    }

    public function showAddAlbum($artists){
        require_once './templates/addalbum.phtml';
    }

    public function showError($error){
        require 'templates/error.phtml';
    }

    public function showAdminMenu(){
        require 'templates/adminmenu.phtml';
    }
}