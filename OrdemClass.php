<?php
    class Ordem{
        public $quantidade;
        private $dataEntrega;
        private $dataEmisao;
        private $idItem;
        private $id;
        private $status;
        
        public function  getQuantidade(){
            return $this->quantidade; 
        }
        public function setQuantidade($quantidade){
            $this->quantidade = $quantidade;
        }
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
        public function setIdItem($id){
            $this->idItem = $id;
        }
        public function  getIdItem(){
            return $this->idItem; 
        }
        public function setPendente($boolean){
            $this->pendente = $boolean;
        }
        public function getPendente(){
            return $this->pendente;
        }
        
        public function __construct(){         
        }
        
    }
?>