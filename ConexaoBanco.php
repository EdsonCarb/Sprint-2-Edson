<?php
    class MySqliProvider {
        private $host = 'localhost';
        private $usuario = 'root';
        private $senha = '';
        private $database = 'basededadospp2';

        public function provide(){
            $mysqli = new mysqli($this->host, $this->usuario, $this->senha, $this->database);
            $mysqli->set_charset('utf8');
            if($mysqli->errno){
                echo 'Erro ao tentar se conectar com banco MySQL: ' . $mysqli->error;
            }

            return $mysqli;
        }
    }
?>