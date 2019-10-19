<?php
    class Item{
        public $nome;
        private $material;
        private $id;
        private $valorUnitario;
        private $quantidade;

        public function getValorUnitario(){
            return $this->valorUnitario;
        }
        public function setValorUnitario($valor){
            $this->valorUnitario = $valor;
        }
        public function getQuantidade(){
            return $this->quantidade;
        }
        public function setQuantidade($quant){
            $this->quantidade = $quant;
        }
        public function  getId(){
            return $this->id; 
        }
        public function setId($id){
            $this->id = $id;
        }
        public function  getNome(){
            return $this->nome; 
        }
        public function  getMaterial(){
            return $this->material; 
        }
        public function setNome($nome){
            $this->nome = $nome;
        }
        public function setMaterial($material){
            $this->material = $material;
        }
        public function __construct(){         
        }
        
    }
?>