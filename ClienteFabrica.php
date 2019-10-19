<?php
    require_once("ClienteClass.php");
    require_once("ClienteRepositorio.php"); 
    $clienteRepositorio = new ClienteRepositorio();
    if($_POST["update"]!=null){
        $id=$_POST["update"];
        $nome = $_POST["nome"];
        $cnpj = $_POST["cnpj"];
        $email = $_POST["email"];
        $telefone = $_POST["telefone"];
        $cidade = $_POST["cidade"];
        $estado = $_POST["estado"];
        $cep = $_POST["cep"];
        $cliente= new Cliente();
        $cliente->setId($id);
        $cliente->setNome($nome);
        $cliente->setCnpj($cnpj);
        $cliente->setEmail($email);
        $cliente->setTelefone($telefone);
        $cliente->setCidade($cidade);
        $cliente->setEstado($estado);
        $cliente->setCep($cep);
        var_dump($cliente); 
        $clienteRepositorio ->updateCliente($cliente);;
        echo "<script>alert('Update enviados com sucesso!');location.href = 'GestaoComercialView.php';</script>";
    } 
    else if($_POST["nome"] !=null && $_POST["cnpj"]!=null && $_POST["email"]!=null 
    && $_POST["telefone"]!=null && $_POST["cidade"]!=null && $_POST["estado"]!=null 
    && $_POST["cep"]!=null){
        $nome = $_POST["nome"];
        $cnpj = $_POST["cnpj"];
        $email = $_POST["email"];
        $telefone = $_POST["telefone"];
        $cidade = $_POST["cidade"];
        $estado = $_POST["estado"];
        $cep = $_POST["cep"];
        $cliente= new Cliente();
        $cliente->setNome($nome);
        $cliente->setCnpj($cnpj);
        $cliente->setEmail($email);
        $cliente->setTelefone($telefone);
        $cliente->setCidade($cidade);
        $cliente->setEstado($estado);
        $cliente->setCep($cep); 
        $clienteRepositorio ->postCliente($cliente);
        echo "<script>alert('Dados enviados com sucesso!');location.href = 'GestaoComercialView.php';</script>";
        
    }else{
        header('location:index.php');
    };