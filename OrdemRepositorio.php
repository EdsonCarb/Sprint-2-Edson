<?php
    require_once("OrdemClass.php");
    require_once("ConexaoBanco.php");
    class OrdemRepositorio{

        public function postOrdem(Ordem $ordem){
            $id_item =  $ordem->getIdItem();
            $quantidade =  $ordem->getQuantidade();
            $entrega = $ordem->getDataEntrega();
            $emissao =  $ordem->getDataEmisao();
            $provider = new MySqliProvider();
            $mysqli = $provider->provide();     
            $stmt = $mysqli->prepare('INSERT INTO item_ordem ( id_item, quantidade, entrega, emissao, 
             pendente) VALUES (?,?,?,?,?);');
            $stmt->bind_param('sssss', $id_item, 
            $quantidade, $entrega,$emissao, 
            $ordem->getPendente());  
            $stmt->execute();               
        }
        public function buscarPendentes():Array{
            $provider = new MySqliProvider();        
            $mysqli= $provider->provide();            
            $stmt = $mysqli->prepare('SELECT id, id_item, quantidade
             FROM item_ordem where pendente = 1;');   
            $stmt->execute();   
            $r = $stmt->bind_result($id, $id_item, $quantidade);    
            $result= array();   
            while ($stmt->fetch())
            {
                $c = new Ordem();
                $c->setId($id);
                $c->setIdItem($id_item);
                $c->setQuantidade($quantidade);              
                $result[] = $c;
            }    
            return $result;
        }
        public function buscarPorId($idOrdem)
        {   
            $provider = new MySqliProvider();  
            $mysqli= $provider->provide();
            $stmt = $mysqli->prepare('SELECT id, id_item, quantidade
            FROM item_ordem WHERE id=?;');            
            $stmt->bind_param('s', $idOrdem);
            $stmt->execute(); 
            $r = $stmt->bind_result($id, $id_item, $quantidade); 
            $result= array();   
            while ($stmt->fetch())
            {
                $c = new Ordem();
                $c->setId($id);
                $c->setIdItem($id_item);
                $c->setQuantidade($quantidade);
                
            }    
            return $c;
        }

        public function alterarStatus(Ordem $ordem){
            $pendente = $ordem->getPendente();
            $id = $ordem->getId();          
            $provider = new MySqliProvider();
            $mysqli = $provider->provide();     
            $stmt = $mysqli->prepare('UPDATE item_ordem SET pendente=? WHERE id=?;');
            $stmt->bind_param('ss', $pendente, $id);  
            $stmt->execute();                 
        }

        public function totalOrdemPendente($id_item){
            $provider = new MySqliProvider();  
            $mysqli= $provider->provide();
            $stmt = $mysqli->prepare('SELECT SUM(quantidade) FROM item_ordem 
            WHERE id_Item = ? and pendente = true;');             
            $stmt->bind_param('s', $id_item);
            $stmt->execute(); 
            $r = $stmt->bind_result($quantidade);    
            $result= array(); 
            while ($stmt->fetch())
            {
                return $quantidade;  
            }    
                
        }
    }

?>
