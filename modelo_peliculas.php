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
}
?>
