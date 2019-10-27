<?php
    require_once("LoginClass.php");
    require_once("LoginRepositorio.php");
    require_once("sessao.php");        
    $LoginRepositorio = new LoginRepositorio();
    
    if($_POST["nomeUsuario"] !=null && $_POST["senha"]!=null){
        $nome=$_POST["nomeUsuario"];
        $senha =$_POST["senha"];
        $autenticado=false;
        $usuarios = $LoginRepositorio->buscarTodos();
        if (isset($usuarios))
        {
            foreach ($usuarios as $usuario) {
                $nomeBanco = $usuario->getNome();
                $senhaBanco = $usuario->getSenha();
                $idUsuario = $usuario->getId();
                if($nomeBanco == $nome && $senhaBanco==$senha){ 
                    $_SESSION["autenticado"]=true;
                    $_SESSION["aut_nome"]=$nome;
                    $_SESSION["id_user"] = $idUsuario;
                    header('location:Index.php');
                }
            }
        }
    }
    header('location:Index.php');   


?>