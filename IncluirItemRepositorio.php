<?php
    require_once("IncluirItemClass.php");
    require_once("ConexaoBanco.php");
    class IncluirItensRepositorio{

        public function postItemPedido(IncluirItem $itemPedido){          
            $itemPed= $itemPedido->getIdPedido();
            $idItem =  $itemPedido->getIdItem();
            $quantidade = $itemPedido->getQuantidade();
            $valorUnitario = $itemPedido->getValorUnitario();
            
            $provider = new MySqliProvider();
            $mysqli = $provider->provide();     
            $stmt = $mysqli->prepare('INSERT INTO pedido_item (idItem, idPedido, quantidade,valorUnitario) VALUES (?,?,?,?);');
            $stmt->bind_param('iiis', $idItem,$itemPed, $quantidade,$valorUnitario);  
            $stmt->execute();                     
        }
        public function totalPedido($id_item){
            $provider = new MySqliProvider();  
            $mysqli= $provider->provide();
            $stmt = $mysqli->prepare('SELECT SUM(quantidade) FROM pedido_item 
            JOIN pedido on pedido_item.idPedido = pedido.id WHERE idItem = ? and pedido.pendente = true;');             
            $stmt->bind_param('s', $id_item);
            $stmt->execute(); 
            $r = $stmt->bind_result($quantidade);    
            $result= array(); 
            while ($stmt->fetch())
            {
                return $quantidade;  
            }       
        }
        
        public function buscarItensPedido($id_pedido)
        {   
            $provider = new MySqliProvider();  
            $mysqli= $provider->provide();
            $stmt = $mysqli->prepare('SELECT id,idItem, idPedido, quantidade,valorUnitario FROM pedido_item WHERE idPedido = ?;');             
            $stmt->bind_param('s', $id_pedido);
            $stmt->execute(); 
            $r = $stmt->bind_result($id,$idItem, $idPedido, $quantidade, $valorUnitario);    
            $result= array(); 
            while ($stmt->fetch())
            {
            $item = new IncluirItem();
            $item->setId($id);
            $item->setIdItem($idItem);
            $item->setIdPedido($idPedido);
            $item->setQuantidade($quantidade);
            $item->setValorUnitario($valorUnitario);                 
            $result[] = $item;
            }    
            return $result;       
        }
        public function buscarPedidosPorItem($id_item)
        {   
            $provider = new MySqliProvider();  
            $mysqli= $provider->provide();
            $stmt = $mysqli->prepare('SELECT id,idItem, idPedido, quantidade,valorUnitario FROM pedido_item 
             WHERE idItem = ?;');             
            $stmt->bind_param('s', $id_item);
            $stmt->execute(); 
            $r = $stmt->bind_result($id,$idItem, $idPedido, $quantidade, $valorUnitario);    
            $result= array(); 
            while ($stmt->fetch())
            {
            $item = new IncluirItem();
            $item->setId($id);
            $item->setIdItem($idItem);
            $item->setIdPedido($idPedido);
            $item->setQuantidade($quantidade);
            $item->setValorUnitario($valorUnitario);                 
            $result[] = $item;
            }    
            return $result;       
        }
        

    }