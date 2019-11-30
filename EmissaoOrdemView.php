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
            if ($_SESSION['autenticado']){
                $itemRepositorio = new ItemRepositorio();
                $codItem = $_POST["cod_Item"];
                $item=$itemRepositorio->buscarPorId($codItem);
                $descricao = $item->getNome();
                $codigo = $item->getId();
                $material = $item->getMaterial();
                $html="
                <div class='card'>
                    <div class='card-body'>
                        <h5 class='card-title'>Emissão de Ordem de Produção</h5>
                        <table class='table table-bordered table-striped'>
                        <thead>
                            <tr>
                                <th>Código </th>
                                <th>Descrição</th>
                                <th>Material</th>
    
                            </tr>
                        </thead>
                        <tbody id='myTable'>
                            <tr>
                                <td>$codigo</td>
                                <td>$descricao</td>
                                <td>$material</td>
                            </tr>
                         </tbody>
                    </table>
                        <form action='OrdemFabrica.php' method='post'>
                            <div class='form-row'>
                                <div class='col-md-6 mb-3'>
                                    <label for='validationDefault01'>Quantidade</label>
                                    <input type='number' class='form-control' id='validationDefault01' name='quantidade'  required>
                                </div>    
                                <div class='col-md-4 mb-3'>
                                    <label for='validationDefault02'>Data de Entrega</label>
                                    <input type='date' class='form-control' id='validationDefault02' name='dataEntrega'  required>
                                </div> 
                            </div>
                                <input  type='hidden' name='cod_item' value='$codigo'>
                            </div>   
                                <div>
                                    <a href='GestaoEstoqueView.php' class='btn btn-secondary ' role='button' aria-pressed='true'>Voltar</a>
                                    &nbsp &nbsp &nbsp
                                    <button class='btn btn-outline-success' type='submit'>Enviar</button>
                              </div>   
                            </form>
                    </div>
                </div>";
                
                echo $html;
            }else{
            header('location:loginview.php');
            }

        ?>
        <script src='https://code.jquery.com/jquery-3.3.1.slim.min.js' integrity='sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo' crossorigin='anonymous'></script>
        <script src='https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js' integrity='sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49' crossorigin='anonymous'></script>
        <script src='https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js' integrity='sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy' crossorigin='anonymous'></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.0/jquery.mask.js"></script>

        <script>
            $(document).ready(function () { 
                var $campoCnpj = $("#CNPJ");
                $campoCnpj.mask('00.000.000/0000-00', {reverse: true});
                var $campoTelefone = $("#TEL");
                $campoTelefone.mask('(00) 0 0000-0000', {reverse: false}); 
                       
            });
            </script>

    </body>

</html>