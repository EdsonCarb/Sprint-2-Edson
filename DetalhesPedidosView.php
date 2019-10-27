<!DOCTYPE html>
<html lang='pt-br'>
    <head>
        <link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css' integrity='sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO' crossorigin='anonymous'>    
    </head>
    <body>
    <?php
    	    require_once('sessao.php'); 
            require_once('MenuView.php');
            require_once('ItemClass.php');
            require_once('ItemRepositorio.php');
            require_once('PedidoRepositorio.php');
            require_once('ClienteClass.php');
            require_once('ClienteRepositorio.php');
            require_once('IncluirItemRepositorio.php');
            if ($_SESSION['autenticado']){ 
                if(isset($_POST['id_Pedido']) || isset($_GET['idPedido'])){
                    $idPedido = isset($_POST['id_Pedido']) ? $_POST['id_Pedido'] : $_GET['idPedido'];
                    $itemRepositorio = new ItemRepositorio();
                    $pedidoRepositorio = new PedidoRepositorio();
                    $clienteRepositorio = new ClienteRepositorio();
                    $itensPedidoRepositorio = new IncluirItensRepositorio();
                    $pedido = $pedidoRepositorio->buscarPorId($idPedido);
                    $dataEmisao = $pedido->getDataEmisao();
                    $dataEntrega = $pedido->getDataEntrega();
                    $idCliente = $pedido->getIdCliente();
                    $numero = $pedido->getLinhaPedido();
                    $id = $pedido->getId();
                    $total= 0;
                    $cliente= $clienteRepositorio->buscarPorId($idCliente);
                    $nomeCliente= $cliente->getNome();
                    $itens=array();
                    $itensPedido = $itensPedidoRepositorio->buscarItensPedido($id);
                    if (isset($itensPedido)){
                        foreach ($itensPedido as $itensPedido) {
                            $item = new Item();
                            $item = $itemRepositorio->buscarPorId($itensPedido->getIdItem());
                            $item -> setQuantidade($itensPedido->getQuantidade());
                            $item -> setValorUnitario($itensPedido->getValorUnitario());
                            $itens[]=$item;
                        }
                    }
                    $html=" <div class='card'>
                    <div class='card-body'>
                    <table class='table table-bordered table-striped'>
                        <thead>
                                <tr>
                                    <th>Cliente </th>
                                    <th>N° Pedido</th>
                                    <th>Data Entrega</th>
                        </tr>
                            </thead>
                            <tbody id='myTable'>
                            <tr>
                            <td>$nomeCliente</td>
                            <td>$numero</td>
                            <td><input type='date' class='form-control' value='$dataEntrega'  disabled></td>
                        </tr>
                        </tbody>
                    </table>
                    <h5 class='card-title'> Itens Do Pedido</h5>
                    <input class='form-control' id='myInput' type='text' placeholder='Procurar..'>
                    <table class='table table-bordered table-striped'>
                        <thead>
                            <tr>
                                <th>Código </th>
                                <th>Descrição</th>
                                <th>Material</th>
                                <th>Quantidade</th>
                                <th>Preço Unitário</th>
                                <th>Preço Total</th>

                            </tr>
                        </thead>
                        <tbody id='myTable'>";       
                    if (isset($itens)){
                        foreach ($itens as $itens) {

                            $descricao = $itens->getNome();
                            $codigo = $itens->getId();
                            $material = $itens->getMaterial();
                            $quantidade = $itens->getQuantidade();
                            $valorUnitario =  $itens->getValorUnitario();
                            $valorTotal = $valorUnitario * $quantidade;
                            $total = $total + $valorTotal;
                            $html.="
                                <tr>
                                    <td>$codigo</td>
                                    <td>$descricao</td>
                                    <td>$material</td>
                                    <td>$quantidade</td>
                                    <td>R$ $valorUnitario </td>
                                    <td>R$ $valorTotal </td>

                                </tr>";													
                        }
                    
                    $html.= "
                    <td></td><td></td><td></td><td></td><td></td><td><h5>Total: $total R$</h5></td>
                    </tbody>
                    </table><a href='GestaoProducaoView.php' class='btn btn-secondary ' role='button' aria-pressed='true'>Voltar</a></div></div>";
                    echo $html;
                    }
                } 
            }else{
                header('location:index.php');
            }
        ?>


    <script>
        $(document).ready(function() {
            $("#myInput").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("#myTable tr").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
        });
    </script>
        <script src='https://code.jquery.com/jquery-3.3.1.slim.min.js' integrity='sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo' crossorigin='anonymous'></script>
        <script src='https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js' integrity='sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49' crossorigin='anonymous'></script>
        <script src='https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js' integrity='sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy' crossorigin='anonymous'></script>
    </body>
</html>