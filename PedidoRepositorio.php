<?php
    require_once("PedidoClass.php");
    require_once("ConexaoBanco.php");
    class PedidoRepositorio{

        public function postPedido(Pedido $pedido){       
            $provider = new MySqliProvider();
            $mysqli = $provider->provide();     
            $stmt = $mysqli->prepare('INSERT INTO pedido (id, pedidoLinha, dataEntrega, dataEmissao, IdCliente, 
             pendente) VALUES (?,?,?,?,?,?);');
            $stmt->bind_param('ssssss', $pedido->getId(), $pedido->getLinhaPedido(), 
            $pedido->getDataEntrega(), $pedido->getDataEmisao(), $pedido->getIdCliente(), 
             $pedido->getPendente());  
            $stmt->execute();                 
        }
        public function buscar10($pagina):Array{
            $provider = new MySqliProvider();
            $limite=10;
            $pagina = $pagina*$limite;        
            $mysqli= $provider->provide();            
            $stmt = $mysqli->prepare("SELECT id, pedidoLinha, dataEntrega, dataEmissao, IdCliente, 
             pendente FROM pedido LIMIT $pagina,$limite");   
            $stmt->execute();   
            $r = $stmt->bind_result($id, $pedidoLinha, $dataEntrega, $dataEmissao, $idCliente, 
                                    $pendente);    
            $result= array();   
            while ($stmt->fetch())
            {
                $c = new Pedido();
                $c->setId($id);
                $c->setLinhaPedido($pedidoLinha);
                $c->setDataEntrega($dataEntrega);
                $c->setDataEmissão($dataEmissao);
                $c->setIdCliente($idCliente);  
                $c->setPendente($pendente);                 
                $result[] = $c;
            }    
            return $result;
        }
        public function buscarTodos():Array{
            $provider = new MySqliProvider();        
            $mysqli= $provider->provide();            
            $stmt = $mysqli->prepare('SELECT id, pedidoLinha, dataEntrega, dataEmissao, IdCliente, 
             pendente FROM pedido;');   
            $stmt->execute();   
            $r = $stmt->bind_result($id, $pedidoLinha, $dataEntrega, $dataEmissao, $idCliente, 
                                    $pendente);    
            $result= array();   
            while ($stmt->fetch())
            {
                $c = new Pedido();
                $c->setId($id);
                $c->setLinhaPedido($pedidoLinha);
                $c->setDataEntrega($dataEntrega);
                $c->setDataEmissão($dataEmissao);
                $c->setIdCliente($idCliente);  
                $c->setPendente($pendente);                 
                $result[] = $c;
            }    
            return $result;
        }
        public function buscarPorId($idPedido)
        {   
            $provider = new MySqliProvider();  
            $mysqli= $provider->provide();
            $stmt = $mysqli->prepare('SELECT  id, pedidoLinha, dataEntrega, dataEmissao, IdCliente, 
            pendente FROM pedido WHERE id=?;');            
            $stmt->bind_param('s', $idPedido);
            $stmt->execute(); 
            $r = $stmt->bind_result($id, $pedidoLinha, $dataEntrega, $dataEmissao, $idCliente, 
            $pendente);    
            $result= array();   
            while ($stmt->fetch()){
                $c = new Pedido();
                $c->setId($id);
                $c->setLinhaPedido($pedidoLinha);
                $c->setDataEntrega($dataEntrega);
                $c->setDataEmissão($dataEmissao);
                $c->setIdCliente($idCliente);  
                $c->setPendente($pendente);                 
                $result[] = $c;
            }    
            return $c;
            }

            public function buscarUltimoId(){
                $provider = new MySqliProvider();        
                $mysqli= $provider->provide();            
                $stmt = $mysqli->prepare('SELECT MAX(id) 
                 FROM pedido;');   
                $stmt->execute();   
                $r = $stmt->bind_result($id);       
                $result= array();   
                while ($stmt->fetch()){
                    $c=($id);                
                }    
                return $c;
                }
            }
            
    
?>
