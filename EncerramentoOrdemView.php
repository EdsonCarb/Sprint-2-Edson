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
            require_once('OrdemRepositorio.php');
            if ($_SESSION['autenticado']){ 
                $itemRepositorio = new ItemRepositorio();
                $ordemRepositorio = new OrdemRepositorio();
                $ordensPendentes = $ordemRepositorio->buscarPendentes();
                $html=" <div class='card'>
                <div class='card-body'>
                <h5 class='card-title'> Encerrar Ordens de Produção</h5>
                <input class='form-control' id='myInput' type='text' placeholder='Procurar..'>
                <table class='table table-bordered table-striped'>
                    <thead>
                        <tr>
                            <th>Numero da Ordem</th>
                            <th>Código do Item</th>
                            <th>Descricao</th>
                            <th>Material</th>
                            <th>Quantidade Total</th>
                            <th>Quantidade Aprovada</th>
                            <th>Quantidade Reprovada</th>
                            <th>#</th>
                        </tr>
                    </thead>
                    <tbody id='myTable'>";
                foreach ($ordensPendentes as $ordensPendentes) {  
                     $codOrdem = $ordensPendentes->getId();   
                     $codItem = $ordensPendentes->getIdItem();
                     $item =  $itemRepositorio->buscarPorId($codItem);
                     $descricao = $item->getNome();
                     $material = $item->getMaterial();
                     $quantidadeTotal = $ordensPendentes->getQuantidade();
                    
                    $html.="<tr>
                                <td>$codOrdem</td>
                                <td>$codItem</td>
                                <td>$descricao</td>
                                <td>$material</td>
                                <td>$quantidadeTotal</td>
                                <td>
                                    <form method='post' action='EncerrarOrdemFabrica.php'>
                                        <input  type='hidden' name='total' value='$quantidadeTotal'>
                                        <input  type='hidden' name='idOrdem' value='$codOrdem'>
                                        <input  type='hidden' name='codItem' value='$codItem'>
                                        <input type='number' class='form-control' id='validationDefault01' name='quantidadeApro'  required>        
                                </td>
                                <td>
                                <input type='number' class='form-control' id='validationDefault01' name='quantidadeRepro'  required>
                                </td>
                                <td>
                                    <input class='btn btn-outline-dark'  type='submit' value='Encerrar' '>
                                    </form>
                                </td>

                            </tr>";													
                    
                }
                $html.= "
                </tbody>
                </table><a href='GestaoProducaoView.php' class='btn btn-secondary ' role='button' aria-pressed='true'>Voltar</a></div></div>";
                echo $html;
                    
                  
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