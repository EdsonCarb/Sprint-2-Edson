<?php
    require_once("ClienteClass.php");
    require_once("ConexaoBanco.php");
    class ClienteRepositorio{

        public function postCliente(Cliente $cliente){       
            $provider = new MySqliProvider();
            $mysqli = $provider->provide();     
            $stmt = $mysqli->prepare('INSERT INTO cliente (nome, cnpj, email, telefone, cidade, 
            estado, cep) VALUES (?,?,?,?,?,?,?);');
            $stmt->bind_param('sssssss', $cliente->getNome(), $cliente->getCnpj(), 
            $cliente->getEmail(), $cliente->getTelefone(), $cliente->getCidade(), 
            $cliente->getEstado(), $cliente->getCep());  
  
            $stmt->execute();                 
        }
        public function updateCliente(Cliente $cliente){       
            $provider = new MySqliProvider();
            $mysqli = $provider->provide(); 
            

            $stmt = $mysqli->prepare('UPDATE cliente SET nome=?, cnpj=?, email=?, telefone=?, cidade=?, 
            estado=?, cep=?
            WHERE id = ?;')
            ;
            $stmt->bind_param('ssssssss', $cliente->getNome(), $cliente->getCnpj(), 
            $cliente->getEmail(), $cliente->getTelefone(), $cliente->getCidade(), 
            $cliente->getEstado(), $cliente->getCep(), $cliente->getId());  
  
            $stmt->execute();                 
        }
        public function buscarTodos():Array{
            $provider = new MySqliProvider();        
            $mysqli= $provider->provide();            
            $stmt = $mysqli->prepare('SELECT id, nome,cnpj, email, telefone, cidade, 
            estado, cep FROM cliente;');   
            $stmt->execute();   
            $r = $stmt->bind_result($id, $nome, $cnpj, $email, $telefone, $cidade,
                                    $estado, $cep);    
            $result= array();   
            while ($stmt->fetch())
            {
                $c = new Cliente();
                $c->setId($id);
                $c->setNome($nome);
                $c->setCnpj($cnpj);
                $c->setEmail($email);
                $c->setTelefone($telefone);  
                $c->setCidade($cidade);  
                $c->setEstado($estado);  
                $c->setCep($cep);                 
                $result[] = $c;
            }    
            return $result;
        }
        public function buscarPorId($idCliente)
        {   
            $provider = new MySqliProvider();  
            $mysqli= $provider->provide();
            $stmt = $mysqli->prepare('SELECT id, nome,cnpj, email, telefone, cidade, 
            estado, cep FROM cliente WHERE id=?;');            
            $stmt->bind_param('s', $idCliente);
            $stmt->execute(); 
            $r = $stmt->bind_result($id, $nome, $cnpj, $email, $telefone, $cidade,
            $estado, $cep);    
            $result= array();   
            while ($stmt->fetch())
            {
            $c = new Cliente();
            $c->setId($id);
            $c->setNome($nome);
            $c->setCnpj($cnpj);
            $c->setEmail($email);
            $c->setTelefone($telefone);  
            $c->setCidade($cidade);  
            $c->setEstado($estado);  
            $c->setCep($cep);                 
            $result[] = $c;
            }    
            return $c;       
        }
        public function buscarPorNome($NomeCliente)
        {   
            $provider = new MySqliProvider();  
            $mysqli= $provider->provide();
            $stmt = $mysqli->prepare('SELECT id, nome,cnpj, email, telefone, cidade, 
            estado, cep FROM cliente WHERE nome LIKE ?');            
            
            $NomeCliente = "%" . $NomeCliente . "%"; 
            $stmt->bind_param('s', $NomeCliente);
            $stmt->execute(); 
            $r = $stmt->bind_result($id, $nome, $cnpj, $email, $telefone, $cidade,
            $estado, $cep);    
            $result= array();   
            while ($stmt->fetch())
            {
            $c = new Cliente();
            $c->setId($id);
            $c->setNome($nome);
            $c->setCnpj($cnpj);
            $c->setEmail($email);
            $c->setTelefone($telefone);  
            $c->setCidade($cidade);  
            $c->setEstado($estado);  
            $c->setCep($cep);                 
            $result[] = $c;
            }    
            return $result;       
        }
    }
?>
