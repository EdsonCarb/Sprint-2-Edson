<?php
    require_once("IncluirItemClass.php");
    require_once("IncluirItemRepositorio.php"); 
    $incluirRepositorio = new IncluirItensRepositorio(); 
    if($_POST["idPedido"] !=null && $_POST["idItem"]!=null && $_POST["quantidade"]!=null ){  
        $idPedido = $_POST["idPedido"];
        $idItem = $_POST["idItem"];
        $quantidade = $_POST["quantidade"];
        $valorUnitario = $_POST["valor"];
        $itemParaIncluir= new IncluirItem();
        $itemParaIncluir->setIdPedido($idPedido);
        $itemParaIncluir->setIdItem($idItem);
        $itemParaIncluir->setQuantidade($quantidade);
        $itemParaIncluir-> setValorUnitario($valorUnitario);
        $incluirRepositorio ->postItemPedido($itemParaIncluir); 
        echo "<script>
            decisao=confirm('Item incluido! Deseja incluir mais itens?')</script><script>
            if (decisao) {
                location.href = 'IncluirItensView.php?idPedido=$idPedido';;
            } else {
                location.href = 'ListaPedidosView.php';
            }
                </script>";
    }else{
        header('location:index.php');
    };