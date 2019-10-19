<?php
    // Capa de abstracción de la base de datos 
    class DBAbstract {
        private $mysql;

        public function __construct($dbHost, $dbUser, $dbPass, $dbName) {
            $this->mysql = new mysqli($dbHost, $dbUser, $dbPass, $dbName);
            if (! $this->mysql->set_charset("utf8")) {
                printf("Error cargando el conjunto de caracteres utf8: %s\n", $this->mysql->error);
                exit();
            }
        }

        /**
         * Lanza una sentencia SELECT contra la base de datos
         * @return Un array con el resultado de la consulta
         */
        public function sqlSelect($sql) {
            $result = $this->mysql->query($sql);
            //var_dump($result);
            $a = array();
            if($result==false){
                echo "ERROR: Could not execute $sql. " . print_r($this->mysql->error);
            }else{
                while ($row = $result->fetch_object()) {
                    $a[] = $row;
                }
            }
            return $a;
        }

        /**
         * Lanza una sentencia SQL (excepto SELECT) contra la base de datos
         * @return Número de registros afectados por la sentencia SQL
         */
        public function sqlOther($sql) {
            $this->mysql->query($sql);
            return $this->mysql->affected_rows;
        }




    }