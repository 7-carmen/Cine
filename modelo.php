<?php
include("bdAbstract.php");
include("config.php");
class Usuarios {
    private $conexdb;

    public function __construct(){ //Conecxion con la BD. 
        $config = new Config();
        $this->conexdb =new DBAbstract(config::$dbHost, config::$dbUser, config::$dbPass, config::$dbName);
    }

    public function getForUsername($username, $pasword) {
        $result = $this->conexdb->sqlSelect("SELECT * FROM usuarios WHERE usuario = '$username' AND contraseña = '$pasword'");
            if (count($result) > 0) {
                return $result;
            } else {
                return null;
            }
    }

    public function get($nombre) {
        return true;
    }

    public function getAll() {
        $result = $this->conexdb->sqlSelect("SELECT * FROM usuarios");
        return $result;
    }

    public function getUsuarioAll($username) {
        $result = $this->conexdb->sqlSelect("SELECT * FROM usuarios WHERE nombre = '$username'");
        return $result;
    }

    public function insert($data) {
        $username =$data["usuario"];
        $pasword = $data["pasword"];
        $nombre = $data["nombre"];
        $apellidos = $data["apellidos"];
        $correo = $data["correo"];
        $sql = ("INSERT INTO usuarios VALUES ('$username', '$pasword', 1, '$nombre', '$apellidos', '$correo')");
        echo $sql;
        $result = $this->conexdb->sqlOther($sql);
        if ($result == 1) {
            return true;
        } else {
            return false;
        }

    }

    public function insertAdmin($data) {
        $username =$data["usuario"];
        $pasword = $data["pasword"];
        $nombre = $data["nombre"];
        $apellidos = $data["apellidos"];
        $correo = $data["correo"];
        $tipo = $data["tipo"];
        $sql = ("INSERT INTO usuarios VALUES ('$username', '$pasword', '$tipo', '$nombre', '$apellidos', '$correo')");echo $sql;
        $result = $this->conexdb->sqlOther($sql);
        if ($result == 1) {
            return true;
        } else {
            return false;
        }

    }

    public function updateAdmin($data){
        $username =$data["usuario"];
        $pasword = $data["pasword"];
        $nombre = $data["nombre"];
        $apellidos = $data["apellidos"];
        $correo = $data["correo"];
        $tipo = $data["tipo"];
        $sql = ("UPDATE usuarios SET pasword = '$pasword', tipo = '$tipo', nombre_real= '$nombre', apellidos = '$apellidos', correo = '$correo' WHERE nombre = '$username'");
        $result =$this->conexdb->sqlOther($sql);
        if ($result == 1) {
            return true;
        } else {
            return false;
        }
    }

    
    public function update($data){
        $username =$data["usuario"];
        $pasword = $data["pasword"];
        $nombre = $data["nombre"];
        $apellidos = $data["apellidos"];
        $correo = $data["correo"];
        $sql = ("UPDATE usuarios SET pasword = '$pasword', nombre_real= '$nombre', apellidos = '$apellidos', correo = '$correo' WHERE nombre = '$username'");
        $result= $this->conexdb->sqlOther($sql);
        if ($result == 1) {
            return true;
        } else {
            return false;
        }
    }

    public function delete($data){
        $username = $data["usuario"];
        $sql = ("DELETE FROM usuarios WHERE nombre = '$username'");
        $result=$this->conexdb->sqlOther($sql);
        if ($result == 1) {
            return true;
        } else {
            return false;
        }
    }
    
}

//AÑADIR LO NECESARIO PARA COMPROBAR LAS PELICULAS. 
?>