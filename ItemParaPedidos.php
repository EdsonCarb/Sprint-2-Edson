


<!DOCTYPE html>
<html lang='pt-br'>
    <head>
        <link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css' integrity='sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO' crossorigin='anonymous'>    
    </head>
    <body>
    <?php
    	    require_once('sessao.php'); 
            require_once('MenuView.php');
            require_once("ItemRepositorio.php"); 
            require_once("IncluirItemRepositorio.php");
            require_once("IncluirItemClass.php"); 
            require_once("PedidoClass.php");
            require_once("PedidoRepositorio.php");
            require_once("OrdemRepositorio.php");
            require_once("ClienteClass.php");
            require_once("ClienteRepositorio.php");

            if ($_SESSION['autenticado']){ 
             
                $html=" 
                <div class='card'>
                    <div class='card-body'>
                        <h5 class='card-title'>Detalhamento de Itens por Pedido</h5>
                        <form  method='post' action='#'>
                            <div class='form-group'>
                                <label for=''>Código do Item</label>
                                <input type='test' class='form-control' name='cod_Item' aria-describedby='inputHelp' placeholder='Digite código do item'>
                                <small id='inputHelp' class='form-text text-muted'>Digite o código do item para visualisação dos pedidos que ela sera necessaria.</small>
                            </div>
                            <button type='submit' class='btn btn-primary'>Exibir Relatório</button>
                        </form>
                    </div>
                </div>";
                
                if(isset($_POST["cod_Item"])){
                    $incluirRepositorio = new IncluirItensRepositorio();
                    $itemRepositorio = new ItemRepositorio();
                    $pedidoRepositorio = new PedidoRepositorio();
                    $ordemRepositorio = new OrdemRepositorio();
                    $item = $itemRepositorio ->buscarPorId($_POST["cod_Item"]);
                    $clienteRepositorio = new ClienteRepositorio();
                    if ($item != null){
                        $codigo = $_POST["cod_Item"];
                        $descricao = $item->getNome();
                        $material = $item->getMaterial();
                        $estoque = $item->getQuantidade();
                        $totalVendido =  $incluirRepositorio->totalPedido($codigo);
                        $produzindo=$ordemRepositorio->totalOrdemPendente($codigo);
                        if($totalVendido ==0){
                            $pedido =0;
                        }
                        if($produzindo ==0){
                            $produzindo =0;
                        }
                        $html.=  "
                        <table class='table table-bordered table-striped'>
                            <thead>
                                <tr>
                                    <th>Código</th>
                                    <th>Descrição</th>
                                    <th>Material</th>
                                    <th>Estoque</th>
                                    <th>Pedido</th>
                                    <th>Produzindo</th>
                                </tr>
                            </thead>
                            <tbody id='myTable'>
                                <tr>
                                    <td>$codigo</td>
                                    <td>$descricao</td>
                                    <td>$material</td>
                                    <td>$estoque</td>
                                    <td>$totalVendido</td>
                                    <td>$produzindo</td>
                                </tr>
                            </tbody>
                        </table>";
                        $pedidos = $incluirRepositorio->buscarPedidosPorItem($_POST["cod_Item"]);
                        $html.=  "
                        <table class='table table-bordered table-striped'>
                            <thead>
                                <tr>
                                    <th>Código do Cliente</th>
                                    <th>Cliente</th>
                                    <th>Pedido</th>
                                    <th>Data de Emissão</th>
                                    <th>Data de Entrega</th>
                                    <th>Quantidade</th>
                                </tr>
                            </thead>
                            <tbody id='myTable'>";
                            
                            
                            foreach ($pedidos as $pedidos) {
                                $idPedido = $pedidos->getIdPedido();
                                $quantidade = $pedidos->getQuantidade();
                                $pedido =  $pedidoRepositorio->buscarPorId($idPedido);
                                $pedidoLinha = $pedido->getLinhaPedido();
                                $dataEmissao = $pedido->getDataEmisao();
                                $dataEntrega = $pedido->getDataEntrega();
                                $idCliente = $pedido->getIdCliente();
                                $cliente = $clienteRepositorio->buscarPorId($idCliente);
                                $codCliente = $cliente->getId();
                                $nomeCliente = $cliente->getNome();
                                if($pedido->getPendente() == true){
                                    $html.="
                                            <tr>
                                                <td>$codCliente</td>
                                                <td>$nomeCliente</td>
                                                <td>$pedidoLinha</td>
                                                <td> <input type='date' class='form-control' value='$dataEmissao'  disabled></td>
                                                <td> <input type='date' class='form-control' value='$dataEntrega'  disabled></td>
                                                <td>$quantidade</td>
                                            </tr>
                                        ";
                                }    
                            }
                            $html.= '</tbody>
                            </table>';    

                        
                    }else{
                        $html.="<div class='alert alert-danger' role='alert'>
                                Opsss... O código do Item pesquisado não existe
                            </div>";
                    }    
                }
             echo $html;   
            }else{
                header('location:index.php');
            }
        ?>


        <script src='https://code.jquery.com/jquery-3.3.1.slim.min.js' integrity='sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo' crossorigin='anonymous'></script>
        <script src='https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js' integrity='sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49' crossorigin='anonymous'></script>
        <script src='https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js' integrity='sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy' crossorigin='anonymous'></script>
    </body>
</html>