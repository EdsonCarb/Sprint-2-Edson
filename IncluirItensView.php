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
            if ($_SESSION['autenticado']){ 
                if(isset($_POST['id_Pedido']) || isset($_GET['idPedido'])){
                    $idPedido = isset($_POST['id_Pedido']) ? $_POST['id_Pedido'] : $_GET['idPedido'];
                    $itemRepositorio = new ItemRepositorio();
                    $pedidoRepositorio = new PedidoRepositorio();
                    $clienteRepositorio = new ClienteRepositorio();
                    $pedido = $pedidoRepositorio->buscarPorId($idPedido);
                    $dataEmisao = $pedido->getDataEmisao();
                    $dataEntrega = $pedido->getDataEntrega();
                    $idCliente = $pedido->getIdCliente();
                    $numero = $pedido->getLinhaPedido();
                    $id = $pedido->getId();
                    $cliente= $clienteRepositorio->buscarPorId($idCliente);
                    $nomeCliente= $cliente->getNome();
                    $itens = $itemRepositorio->buscarTodos(); 
                    $html=" <div class='card'>
                    <div class='card-body'>
                    <h5 class='card-title'>Incluir Itens</h5>
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
                    <h5 class='card-title'>Lista de Itens Cadastrados</h5>
                    <input class='form-control' id='myInput' type='text' placeholder='Procurar..'>
                    <table class='table table-bordered table-striped'>
                        <thead>
                            <tr>
                                <th>Código </th>
                                <th>Descrição</th>
                                <th>Material</th>
                                <th>Valor Unitário</th>
                                <th >Quantidade</th>
                                <th>#</th>

                            </tr>
                        </thead>
                        <tbody id='myTable'>";       
                    if (isset($itens)){
                        foreach ($itens as $itens) {
                            $descricao = $itens->getNome();
                            $codigo = $itens->getId();
                            $material = $itens->getMaterial();
                            $html.="
                                <tr>
                                    <td>$codigo</td>
                                    <td>$descricao</td>
                                    <td>$material</td>
                                    <td>
                                    <form action='IncluirItemFabrica.php' method='post'>
                                    <input type='number' step='0.010' name='valor' required></td>
                                    <td>
                                        
                                        <div class='form'>
                                            <div class='col'>
                                                <input type='number' class='form-control'  name='quantidade' placeholder='Quantidade' required>

                                    </td>
                                    <td>
                                                    <input  type='hidden' name='idPedido' value='$idPedido'>
                                                    <input  type='hidden' name='idItem' value='$codigo'>
                                                    <input class='btn btn-outline-dark'  type='submit' value='Adicionar' '>
                                                </div>
                                            </div>    
                                        </form>
                                    </td>

                                </tr>";													
                        }
                    
                    $html.= "</tbody>
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