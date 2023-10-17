<?php

class DiscosView {
    public function showAlbums($albums){
        require 'templates/addalbum.phtml';
        ?>
        <table>
            <tr>
            <th>Título del disco</th>
            <th>Fecha de lanzamiento</th>
            <th>Artista</th>
            <th>Duración</th>
            <th>Eliminar</th>
            <th>Selección</th>
            </tr><?php
            foreach ($albums as $album) { ?>
                <tr>
                <td><?php echo $album->album_name ?></td>
                <td><?php echo $album->release_date ?></td>
                <td><?php echo $album->artist_name ?></td>
                <td><?php echo $album->duration?></td>
                <td><a href="eliminardisco/<?php echo $album->id_album ?>">eliminar</a></td>
                <td><?php if(!$album->selected){ ?> <a href="seleccionardisco/<?php echo $album->id_album ?>">agregar a selección</a><?php }
                else {?> <a href="deseleccionardisco/<?php echo $album->id_album ?>">quitar de selección</a> <?php } ?></td>
                </tr>
            <?php } ?>
            </table> <?php
    }

    public function showError($error){
        require 'templates/error.phtml';
    }
}