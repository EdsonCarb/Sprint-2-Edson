<?php
    class Pedido{
        public $linhaPedido;
        private $dataEntrega;
        private $dataEmisao;
        private $idCliente;
        private $id;
        private $pendente;

        public function  getId(){
            return $this->id; 
        }
        public function setId($id){
            $this->id = $id;
        }
        public function getDataEntrega(){
            return $this->dataEntrega; 
        }
        public function setDataEntrega($dataEntrega){
            $this->dataEntrega = $dataEntrega;
        }
        public function  getDataEmisao(){
            return $this->dataEmisao; 
        }
        public function setDataEmissão($data){
            $this->dataEmisao = $data;
        }
        public function setIdCliente($id){
            $this->idCliente = $id;
        }
        public function  getIdCliente(){
            return $this->idCliente; 
        }
        public function setPendente($boolean){
            $this->pendente = $boolean;
        }
        public function getPendente(){
            return $this->pendente;
        }
        public function setLinhaPedido($pedido){
            $this->linhaPedido = $pedido;
        }
        public function getLinhaPedido(){
            return $this->linhaPedido;
        }
        
        public function __construct(){         
        }
        
    }
?>