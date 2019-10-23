<?php
//Controlador: esta aplicación solo realiza una accion
include("modelo_peliculas.php");
    class ControladorPeliculas{
        protected $peli, $securuty;

        public function __construct(){
            $this->peli = new Peliculas();
        }


        //Inicia la conexion, todas las peticiones pasan por aquí. 
        public function iniciar_conexon(){
            if (isset($_REQUEST["do"])) {   // La variable "do" controla el estado de la aplicación
                $do = $_REQUEST["do"];
            } else {
                $do = "mostrar_peliculas";      // Estado por defecto
            }
            $this->$do();   // Ejecuta la función con el nombre $do. 
                            // Ej: si $do vale "showFormLogin", ejecuta $this->showFormLogin()
        }

        public function mostrar_admin_pelicula(){
            $data["mensaje"] = (isset($_REQUEST["mensaje"]) ? $_REQUEST["mensaje"] : null);
            $data["peliculas"] = $this->peli->getAll();
            View::show("vista_adminPelis", $data);
        }

        public function mostrar_peliculas(){
            $data["peliculas"] = $this->peli->getAll();

            return $data["peliculas"];
        }

        public function eliminar_pelicula(){
                $data["id"]=$_REQUEST["id"];
                $resultInsert = $this->peli->delete($data);
                if($resultInsert){
                    $data["mensaje"] = "Pelicula eliminada con exito";
                }else {
                    $data["mensaje"] = "No se pudo borrar la pelicula";
                }
                View::redirect("mostrar_admin_pelicula", $data);
        }

        public function anadir_pelicula(){
            $data['nombre'] = $_REQUEST['nombre'];
            $data['anyo'] = $_REQUEST['anyo'];
            $data["duracion"] = $_REQUEST["duracion"];
            $data['genero'] = $_REQUEST['genero'];
            $data['cartel'] = $_REQUEST['cartel'];
            $resultInsert = $this->peli->insertAdmin($data);
            $data = null;
            if ($resultInsert == 1) {
                $data["mensaje"] = "Pelicula añadida con éxito";
                View::redirect("mostrar_admin_pelicula", $data);
            } else {
    
                $data["mensaje"] = "Error, no se puedo añadir la pelicula";
                View::redirect("mostrar_admin_pelicula", $data);
            }
        }

        public function modificar_pelicula(){
            $data["id"]=$_REQUEST["id"];
            $data['nombre'] = $_REQUEST['nombre'];
            $data['anyo'] = $_REQUEST['anyo'];
            $data["duracion"] = $_REQUEST["duracion"];
            $data['genero'] = $_REQUEST['genero'];
            $data['cartel'] = $_REQUEST['cartel'];
            $resultInsert = $this->peli->updateAdmin($data);
            $data = null;
            if ($resultInsert == 1) {
                $data["mensaje"] = "Pelicula modificada con éxito";
                View::redirect("mostrar_admin_pelicula", $data);
            } else {
    
                $data["mensaje"] = "Error, no se pudo modificar la pelicula";
                View::redirect("mostrar_admin_pelicula", $data);
            }
        }

        public function mostrar_pelicula_modificar(){
            $id = $_REQUEST["id"];
            $data["id"]=$id;
            $data["datosPelicula"] = $this->peli->getUsuarioAll($id);
            $data["mensaje"] = (isset($_REQUEST["mensaje"]) ? $_REQUEST["mensaje"] : null);
            View::show("vista_modificar_pelicula", $data);
        }


    }
