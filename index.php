<?php
include("controlador.php");
include("controlador_peliculas.php");
if(isset($_REQUEST["do"]) && strpos($_REQUEST["do"], "pelicula")!=false){
    $c= new ControladorPeliculas();
}else{
    $c = new Controlador();
}
$c->iniciar_conexon();