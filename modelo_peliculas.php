<?php
class Peliculas {
    private $conexdb;

    public function __construct(){ //Conecxion con la BD. 
        $config = new Config();
        $this->conexdb =new DBAbstract(config::$dbHost, config::$dbUser, config::$dbPass, config::$dbName);
    }

    public function getAll() {
        $result = $this->conexdb->sqlSelect("SELECT * FROM peliculas");
        return $result;
    }

    public function getUsuarioAll($id) {
        $result = $this->conexdb->sqlSelect("SELECT * FROM peliculas WHERE id = '$id'");
        return $result;
    }

    public function delete($data){
        $id = $data["id"];
        $sql = ("DELETE FROM peliculas WHERE id = '$id'");
        echo $sql;
        $result=$this->conexdb->sqlOther($sql);
        if ($result == 1) {
            return true;
        } else {
            return false;
        }
    }

    public function insertAdmin($data) {
        $nombre =$data["nombre"];
        $anyo = $data["anyo"];
        $duracion = $data["duracion"];
        $genero = $data["genero"];
        $cartel = $data["cartel"];
        $sql = ("INSERT INTO peliculas VALUES (NULL,'$cartel', '$nombre', '$anyo', '$duracion','$genero')");echo $sql;
        $result = $this->conexdb->sqlOther($sql);
        if ($result == 1) {
            return true;
        } else {
            return false;
        }

}

public function updateAdmin($data){
    $id = $data["id"];
    $nombre =$data["nombre"];
    $anyo = $data["anyo"];
    $duracion = $data["duracion"];
    $genero = $data["genero"];
    $cartel = $data["cartel"];
    $sql = ("UPDATE peliculas SET cartel = '$cartel', nombre= '$nombre', anyo_presentacion = '$anyo', duracion = '$duracion', genero = '$genero' WHERE id = '$id'");
    $result =$this->conexdb->sqlOther($sql);
    if ($result == 1) {
        return true;
    } else {
        return false;
    }
}
}
?>
