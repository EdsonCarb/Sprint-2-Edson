<?php
    require_once("PedidoClass.php");
    require_once("PedidoRepositorio.php"); 
    $pedidoRepositorio = new PedidoRepositorio(); 
    if($_POST["pedidoLinha"] !=null && $_POST["dataEntrega"]!=null  
    && $_POST["id_Cliente"]!=null){
        $pedidoLinha = $_POST["pedidoLinha"];
        $dataEntrega = $_POST["dataEntrega"];
        $idCliente = $_POST["id_Cliente"];
        $dataAtual='20';
        $dataAtual.=date("y-m-d");
        $pedido= new Pedido();
        $pedido->setLinhaPedido($pedidoLinha);
        $pedido->setDataEntrega($dataEntrega);
        $pedido->setIdCliente( $idCliente);
        $pedido->setDataEmissão($dataAtual);
        $pedido->setPendente(true);
        $pedidoRepositorio ->postPedido($pedido); 
        $idPedido = $pedidoRepositorio -> buscarUltimoId(); 
        echo "<script>decisao=confirm('Peido incluido! Deseja incluir itens no pedido: $pedidoLinha ?')</script><script>
            if (decisao) {
                location.href = 'IncluirItensView.php?idPedido=$idPedido';;
            } else {
                location.href = 'ListaPedidosView.php';
            }
                </script>";
    }else{
        header('location:index.php');
    };
?>
