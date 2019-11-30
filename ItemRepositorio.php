<?php
    require_once("ItemClass.php");
    require_once("ConexaoBanco.php");
    class ItemRepositorio{

        public function postItem(Item $item){          
            $provider = new MySqliProvider();
            $mysqli = $provider->provide();     
            $stmt = $mysqli->prepare('INSERT INTO item (nome, material,quantidade) VALUES (?,?,?);');
            $stmt->bind_param('sss', $item->getNome(),$item->getMaterial(),$item->getQuantidade());  
            $stmt->execute();                 
        }





        public function alterarQuantidade(Item $item){
            $quantidade = $item->getQuantidade();
            $id = $item->getId();          
            $provider = new MySqliProvider();
            $mysqli = $provider->provide();     
            $stmt = $mysqli->prepare('UPDATE item SET quantidade=? WHERE id=?;');
            $stmt->bind_param('ss', $quantidade, $id);  
            $stmt->execute();                 
        }


        public function buscar10($pagina):Array{
            $provider = new MySqliProvider();
            $limite=10;
            $pagina = $pagina*$limite;
            $mysqli= $provider->provide();           
            $stmt = $mysqli->prepare("SELECT nome, material, id, quantidade FROM item LIMIT $pagina,$limite");   
            $stmt->execute(); 
            $r = $stmt->bind_result($nome, $material, $id, $quantidade); 
            $result= array();   
            while ($stmt->fetch())
            {
                $l = new Item();
                $l->setNome($nome);
                $l->setMaterial($material);
                $l->setId($id);
                $l->setQuantidade($quantidade);            
                $result[] = $l;
            }    
            return $result;
        }
        

        public function buscarTodos():Array{
            $provider = new MySqliProvider();      
            $mysqli= $provider->provide();           
            $stmt = $mysqli->prepare('SELECT nome, material, id, quantidade FROM item');   
            $stmt->execute(); 
            $r = $stmt->bind_result($nome, $material, $id, $quantidade); 
            $result= array();   
            while ($stmt->fetch())
            {
                $l = new Item();
                $l->setNome($nome);
                $l->setMaterial($material);
                $l->setId($id); 
                $l->setQuantidade($quantidade);           
                $result[] = $l;
            }    
            return $result;
        }
        
        public function buscarPorId($idItem)
        {   
            $provider = new MySqliProvider();  
            $mysqli= $provider->provide();
            $stmt = $mysqli->prepare('SELECT nome, material, id,quantidade FROM item WHERE id=?;');            
            $stmt->bind_param('s', $idItem);
            $stmt->execute(); 
            $r = $stmt->bind_result($nome, $material, $id, $quantidade);
            $result= array();
             $l= null;    
            while ($stmt->fetch())
            {
                $l = new Item();
                $l->setNome($nome);
                $l->setMaterial($material);
                $l->setId($id);
                $l->setQuantidade($quantidade); 
                
            }
            if($l != null){    
            return $l;
            }else{
                return null;
            }

        }


        public function __construct(){                    
        }
    }