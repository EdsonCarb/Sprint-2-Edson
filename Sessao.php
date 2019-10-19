<?php 
    session_start();
    
    if (!isset($_SESSION["autenticado"]))
    {
        $_SESSION["autenticado"]=false;
        $_SESSION["aut_nome"]="";
        $_SESSION["id_user"]="";
    }
    function sair(){
        session_destroy();
        header('location:LoginView.php');
    }
?>