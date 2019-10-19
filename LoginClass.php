<?php
    class Login{
        public $nome;
        private $senha;
        private $id;
        public function  getId(){
            return $this->id; 
        }
        public function setId($id){
            $this->id = $id;
        }
        public function  getNome(){
            return $this->nome; 
        }
        public function  getSenha(){
            return $this->senha; 
        }
        public function setNome($nome){
            $this->nome = $nome;
        }
        public function setSenha($senha){
            $this->senha = $senha;
        }
        public function __construct(){         
        }
        
    }
?>