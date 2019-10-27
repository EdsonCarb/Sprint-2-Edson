<?php
    class IncluirItem{
        public $idItem;
        private $idPedido;
        private $id;
        private $quantidade;
        private $valorUnitario;

        public function getValorUnitario(){
            return $this->valorUnitario;
        }
        public function setValorUnitario($valor){
            $this->valorUnitario = $valor;
        }

        public function  getId(){
            return $this->id; 
        }
        public function setId($id){
            $this->id = $id;
        }
        public function  getIdPedido(){
            return $this->idPedido; 
        }
        public function setIdPedido($idPedido){ 
            $this->idPedido = $idPedido;
        }
        public function  getIdItem(){
            return $this->idItem; 
        }
        public function getQuantidade(){
            return $this->quantidade;
        }
        public function setQuantidade($quantidade){
            $this->quantidade = $quantidade;
        }
        public function setIdItem($idItem){
            $this->idItem = $idItem;
        }
        public function __construct(){         
        }        
    }
?>