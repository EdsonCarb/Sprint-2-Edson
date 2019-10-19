<?php
    class Cliente{

        private $id;
        private $nome;
        private $cnpj;
        private $email;
        private $telefone;
        private $cidade;
        private $estado;
        private $cep;

        
        public function  getId(){
            return $this->id; 
        }
        public function setId($id){
            $this->id = $id;
        }
        public function  getNome(){
            return $this->nome; 
        }
        public function setNome($nome){
            $this->nome = $nome;
        }
        public function  getCnpj(){
            return $this->cnpj; 
        }
        public function setCnpj($cnpj){
            $this->cnpj = $cnpj;
        }
        public function  getEmail(){
            return $this->email; 
        }
        public function setEmail($email){
            $this->email = $email;
        }
        public function  getTelefone(){
            return $this->telefone; 
        }
        public function setTelefone($telefone){
            $this->telefone = $telefone;
        }
        public function  getCidade(){
            return $this->cidade; 
        }
        public function setCidade($cidade){
            $this->cidade = $cidade;
        }
        public function  getEstado(){
            return $this->estado; 
        }
        public function setEstado($estado){
            $this->estado = $estado;
        }
        public function  getCep(){
            return $this->cep; 
        }
        public function setCep($cep){
            $this->cep = $cep;
        }

        public function __construct(){         
        }
        
    }
?>
