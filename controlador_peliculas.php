<?php
//Controlador: esta aplicación solo realiza una accion
include("modelo_peliculas.php");
//include("vista.php");
//include("seguridad.php");
    class ControladorPeliculas{
        protected $peli, $securuty;

        public function __construct(){
            $this->peli = new Peliculas();
        }

        public function mostrar_peliculas(){
            $data["peliculas"] = $this->peli->getAll();

            return $data["peliculas"];
        }
    }
    ?>
