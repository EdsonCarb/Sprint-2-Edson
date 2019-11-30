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
            require_once('IncluirItemRepositorio.php');
            require_once("OrdemRepositorio.php");

            if ($_SESSION['autenticado']){ 
                $itemRepositorio = new ItemRepositorio();
                $incluirItemRepositorio = new IncluirItensRepositorio();
                $ordemRepositorio = new OrdemRepositorio(); 
                $pagina=0;
                if(isset($_GET['pagina'])){
                    $pagina=$_GET['pagina'];
                    $pagina = intval($pagina);
                };
                $totalDeItens = $itemRepositorio->buscarTodos();
                $itens = $itemRepositorio->buscar10($pagina); 
                $html=" <div class='card'>
                <div class='card-body'>
                <h5 class='card-title'>Relatório de Estoque Analítico</h5>
                <input class='form-control' id='myInput' type='text' placeholder='Procurar..'>
                <table class='table table-bordered table-striped'>
                    <thead>
                        <tr>
                            <th>Código </th>
                            <th>Descrição</th>
                            <th>Material</th>
                            <th>Estoque</th>
                            <th> Pedido </th>
                            <th>Produzindo</th>
                            <th>#</th>

                        </tr>
                    </thead>
                    <tbody id='myTable'>";
    
                if (isset($itens)){
					foreach ($itens as $itens) {
                        $descricao = $itens->getNome();
                        $codigo = $itens->getId();
                        $material = $itens->getMaterial();
                        $estoque = $itens->getQuantidade();
                        $pedido = $incluirItemRepositorio->totalPedido($codigo);
                        $produzindo=$ordemRepositorio->totalOrdemPendente($codigo);
                        if($pedido ==0){
                            $pedido =0;
                        }
                        if($produzindo ==0){
                            $produzindo =0;
                        }
                        $html.="
                            <tr>
                                <td>$codigo</td>
                                <td>$descricao</td>
                                <td>$material</td>
                                <td>$estoque</td>
                                <td>$pedido</td>
                                <td>$produzindo</td>
                                <td>
                                    <form method='post' action='EmissaoOrdemView.php'>
                                        <input  type='hidden' name='cod_Item' value='$codigo'>
                                        <input class='btn btn-outline-dark'  type='submit' value='Emitir Ordem de Produção'>
                                    </form>
                                </td>

                            </tr>";													
					}
               
                $numeroItens=0;
                foreach ($totalDeItens as $totalDeItens) {
                    $numeroItens++;
                }
                $numeroItens= $numeroItens/10;
                $numeroPagina=1;
                $html.= "</tbody>
                </table>
                <nav aria-label='Page navigation example'>
                <ul class='pagination justify-content-center'>";
                while($numeroItens>0){
                $teste = $numeroPagina-1;
                    $html.= 
                        "<li class='page-item'><a class='page-link' href='RelatorioAnaliticoView.php?pagina=$teste;'>$numeroPagina</a></li>";
                
                    $numeroPagina++;
                    $numeroItens--;    
                }
                $html.= "</ul></nav>  <a href='GestaoEstoqueView.php' class='btn btn-secondary ' role='button' aria-pressed='true'>Voltar</a></div></div>";
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