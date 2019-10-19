<?php
    require_once("ItemClass.php");
    require_once("ConexaoBanco.php");
    class ItemRepositorio{

        public function postItem(Item $item){          
            $provider = new MySqliProvider();
            $mysqli = $provider->provide();     
            $stmt = $mysqli->prepare('INSERT INTO item (nome, material) VALUES (?,?);');
            $stmt->bind_param('ss', $item->getNome(),$item->getMaterial());  
            $stmt->execute();                 
        }

        public function buscarTodos():Array{
            $provider = new MySqliProvider();      
            $mysqli= $provider->provide();           
            $stmt = $mysqli->prepare('SELECT nome, material, id FROM item;');   
            $stmt->execute(); 
            $r = $stmt->bind_result($nome, $material, $id); 
            $result= array();   
            while ($stmt->fetch())
            {
                $l = new Item();
                $l->setNome($nome);
                $l->setMaterial($material);
                $l->setId($id);            
                $result[] = $l;
            }    
            return $result;
        }
        
        public function buscarPorId($idItem)
        {   
            $provider = new MySqliProvider();  
            $mysqli= $provider->provide();
            $stmt = $mysqli->prepare('SELECT nome, material, id FROM item WHERE id=?;');            
            $stmt->bind_param('s', $idItem);
            $stmt->execute(); 
            $r = $stmt->bind_result($nome, $material, $id);
            $result= array();   
            while ($stmt->fetch())
            {
                $l = new Item();
                $l->setNome($nome);
                $l->setMaterial($material);
                $l->setId($id);            
                $result[] = $l;
            }    
            return $l;
        }

        public function __construct(){                    
        }
    }