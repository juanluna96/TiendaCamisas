<?php 

class utilidades
{
    public static function borrarSession($nombre){
        if(isset($_SESSION[$nombre])){
            $_SESSION[$nombre]=null;
        }

        return $nombre;
    }
}

?>