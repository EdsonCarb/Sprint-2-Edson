


<!DOCTYPE html>
<html lang='pt-br'>
    <head>
        <link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css' integrity='sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO' crossorigin='anonymous'>    
    </head>
    <body>
    <?php
    	    require_once('sessao.php'); 
            require_once('MenuView.php');
            require_once('PedidoClass.php');
            require_once('PedidoRepositorio.php');
            require_once('ClienteClass.php');
            require_once('ClienteRepositorio.php');
            if ($_SESSION['autenticado']){ 
                $pedidoRepositorio = new PedidoRepositorio();
                $clienteRepositorio = new ClienteRepositorio();
                $cliente = new Cliente;
                $pagina=0;
                if(isset($_GET['pagina'])){
                    $pagina=$_GET['pagina'];
                    $pagina = intval($pagina);
                };
                $totalPedidos = $pedidoRepositorio->buscarTodos(); 
                $pedidos = $pedidoRepositorio->buscar10($pagina); 
                $html=" <div class='card'>
                <div class='card-body'>
                <h5 class='card-title'>Lista de Pedidos</h5>
                <input class='form-control' id='myInput' type='text' placeholder='Procurar..'>
                <table class='table table-bordered table-striped'>
                    <thead>
                        <tr>
                            <th>Id Cliente</th>
                            <th>Número do Pedido</th>
                            <th>Data de Emissão</th>
                            <th>Data de Entrega</th>
                            <th>Status</th>
                            <th>#</th>
                            <th>#</th>
                        </tr>
                    </thead>
                    <tbody id='myTable'>";
    
                if (isset($pedidos)){
					foreach ($pedidos as $pedidos) {
                        $dataEntrega = $pedidos->getDataEntrega();
                        $dataEmisao = $pedidos->getDataEmisao();
                        $idCliente = $pedidos->getIdCliente();
                        $numero = $pedidos->getLinhaPedido();
                        $id = $pedidos->getId();
                        $status = $pedidos->getPendente();
                        if($status){
                            $status = "<span class='badge badge-danger'>Pendente</span>";
                            $sumbitTrue =""; 
                        }else{
                            $status = "<span class='badge badge-success'>Entregue</span>";
                            $sumbitTrue ="disabled='true'"; 
                        }
                        $cliente= $clienteRepositorio->buscarPorId($idCliente);
                        $nomeCliente= $cliente->getNome();
                        $html.="<tr>
                            <td>$nomeCliente</td>
                            <td>$numero</td>
                            <td>
                                <input type='date' class='form-control' value='$dataEmisao'  disabled>
                            </td>
                            <td>
                                <input type='date' class='form-control' value='$dataEntrega'  disabled>
                            </td>
                            <td>
                                $status
                            </td>
                            <td>
                                <form method='post' action='IncluirItensView.php'>
                                    <input  type='hidden' name='id_Pedido' value='$id'>
                                    <input class='btn btn-outline-dark'  type='submit' value='Incluir Itens' $sumbitTrue>
                                </form>
                            </td>
                            <td>
                            <form method='post' action='DetalhesPedidosView.php'>
                                <input  type='hidden' name='id_Pedido' value='$id'>
                                <input class='btn btn-outline-dark'  type='submit' value='Detalhes'>
                            </form>
                            </td>
                        </tr>"
                             
                        ;													
                    }
                    
                    $numeroPedidos=0;
                    foreach ($totalPedidos as $totalPedidos) {
                        $numeroPedidos++;
                    }
                    $numeroPedidos= $numeroPedidos/10;
                    $numeroPagina=1;
                    $html.= "</tbody>
                    </table>
                    <nav aria-label='Page navigation example'>
                    <ul class='pagination justify-content-center'>";
                    while($numeroPedidos>0){
                    $teste = $numeroPagina-1;
                        $html.= 
                            "<li class='page-item'><a class='page-link' href='ListaPedidosView.php?pagina=$teste;'>$numeroPagina</a></li>";
                    
                        $numeroPagina++;
                        $numeroPedidos--;    
                    }
                    $html.= "</ul></nav>  <a href='GestaoComercialView.php' class='btn btn-secondary ' role='button' aria-pressed='true'>Voltar</a></div></div>";
                    echo $html;
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