<?php
    require_once("ItemClass.php");
    require_once("ItemRepositorio.php"); 
    $itemRepositorio = new ItemRepositorio(); 
    if($_POST["nomeItem"] !=null && $_POST["materialItem"]!=null ){
        $nomeItem = $_POST["nomeItem"];
        $materialItem = $_POST["materialItem"];
        $item= new Item();
        $item->setNome($nomeItem);
        $item->setMaterial($materialItem);
        $itemRepositorio ->postItem($item);
        echo "<script>alert('Dados enviados com sucesso!');location.href = 'CadastroItemView.php';</script>";
    }else{
        header('location:index.php');
    };