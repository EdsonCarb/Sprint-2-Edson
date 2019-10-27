<?php
    require_once("LoginClass.php");
    require_once("ConexaoBanco.php");
    class LoginRepositorio{

        public function postUsuario(Login $login){          
            $provider = new MySqliProvider();
            $mysqli = $provider->provide();     
            $stmt = $mysqli->prepare('INSERT INTO usuario (nome, senha) VALUES (?,?);');
            $stmt->bind_param('ss', $login->getNome(),$login->getSenha());  
            $stmt->execute();                 
        }

        public function buscarTodos():Array{
            $provider = new MySqliProvider();      
            $mysqli= $provider->provide();           
            $stmt = $mysqli->prepare('SELECT nome, senha, id FROM usuario;');   
            $stmt->execute(); 
            $r = $stmt->bind_result($nome, $senha, $id); 
            $result= array();   
            while ($stmt->fetch())
            {
                $l = new Login();
                $l->setNome($nome);
                $l->setSenha($senha);
                $l->setId($id);            
                $result[] = $l;
            }    
            return $result;
        }        
        public function __construct(){                    
        }
    }