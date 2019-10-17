<?php
//Controlador: esta aplicación solo realiza una accion
include("modelo.php");
include("vista.php");
include("seguridad.php");
    class Controlador{
        protected $user, $securuty;

        public function __construct(){
            $this->user = new Usuarios();
            $this->security = new Security();
        }

        //Inicia la conexion, todas las peticiones pasan por aqui. 
        public function iniciar_conexon(){
        if (isset($_REQUEST["do"])) {   // La variable "do" controla el estado de la aplicación
            $do = $_REQUEST["do"];
        } else {
            $do = "mostrar_página";      // Estado por defecto
        }
        $this->$do();   // Ejecuta la función con el nombre $do. 
                        // P. ej: si $do vale "showFormLogin", ejecuta $this->showFormLogin()
        }

        public function mostrar_página(){
            $data["mensaje"] = (isset($_REQUEST["mensaje"]) ? $_REQUEST["mensaje"] : null);
             View::show("vista_principal", $data);
        }

        public function logearse(){
            $username = $_REQUEST["usuario"];
            $pasword = $_REQUEST["contraseña"];
            $userOk = $this->user->getForUsername($username, $pasword);
            if ($userOk!=null) {
               $this->security->openSession(["id" => $userOk[0]->id, "tipo" => $userOk[0]->tipo]);
               View::redirect("mostrar_datos");
            } else {
                $data["mensaje"] = "Nombre de usuario o contraseña incorrecto";
               View::show("vista_logearse", $data);
            }
        }

        public function mostrar_datos(){
            if ($this->security->get("tipo") == 0) {
                // Tipo de usuario 0 (administador)
                $data["usersList"] = $this->user->getAll();
                $data["idUsuarioLogueado"] = $_SESSION["id"];
                View::show("vista_logAdmin", $data);
            } else if ($this->security->get("tipo") == 1) {
                // Tipo de usuario 1 (usuario normal)
                $usurname = $_SESSION["id"];
                $data["datosUsuario"] = $this->user->getUsuarioAll($usurname);
                View::show("vista_logUsu", $data);
            } else {
                // Tipo de usuario desconocido O no se ha hecho login
                $data["mensaje"] = "No tienes permiso para hacer esto";
                View::redirect("vista_logearse", $data);
            }
        }
    }