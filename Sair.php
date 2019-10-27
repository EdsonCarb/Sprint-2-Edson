<?php 
    require_once("sessao.php");   
    session_destroy();
    header('location:LoginView.php');   
?>