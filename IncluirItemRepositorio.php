<?php
    require_once("IncluirItemClass.php");
    require_once("ConexaoBanco.php");
    class IncluirItensRepositorio{

        public function postItemPedido(IncluirItem $itemPedido){          
            $itemPed= $itemPedido->getIdPedido();
            $idItem =  $itemPedido->getIdItem();
            $quantidade = $itemPedido->getQuantidade();
            $valorUnitario = $itemPedido->getValorUnitario();
            var_dump($valorUnitario);
            
            $provider = new MySqliProvider();
            $mysqli = $provider->provide();     
            $stmt = $mysqli->prepare('INSERT INTO pedido_item (idItem, idPedido, quantidade,valorUnitario) VALUES (?,?,?,?);');
            $stmt->bind_param('iiis', $idItem,$itemPed, $quantidade,$valorUnitario);  
            $stmt->execute();                      
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

    }