


<!DOCTYPE html>
<html lang='pt-br'>
    <head>
        <link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css' integrity='sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO' crossorigin='anonymous'>    
    </head>
    <body>
    <?php
    	    require_once('sessao.php'); 
            require_once('MenuView.php');
            require_once('ClienteClass.php');
            require_once('ClienteRepositorio.php');
            if ($_SESSION['autenticado']){ 
                $clienteRepositorio = new ClienteRepositorio();
                $clientes = $clienteRepositorio->buscarTodos(); 
                $html=" <div class='card'>
                <div class='card-body'>
                <h5 class='card-title'>Lista de Clientes</h5>
                <input class='form-control' id='myInput' type='text' placeholder='Procurar..'>
                <table class='table table-bordered table-striped'>
                    <thead>
                        <tr>
                            <th>Código</th>
                            <th>Razão Social</th>
                            <th>Email</th>
                            <th>#</th>
                            <th>#</th>
                        </tr>
                    </thead>
                    <tbody id='myTable'>";
    
                if (isset($clientes)){
					foreach ($clientes as $clientes) {
                        $nome = $clientes->getNome();
                        $id = $clientes->getId();
                        $email = $clientes->getEmail();
                        $telefone = $clientes->getTelefone();
                        $html.="<tr>
                        <td>$id</td>
                        <td>$nome</td>
                        <td>$email</td>
                        <td>
                            <form method='post' action='DetalhesClientesView.php'>
                                <input  type='hidden' name='id_Cliente' value='$id'>
                                <input class='btn btn-outline-dark'  type='submit' value='Detalhes' '>
                            </form>
                         </td>
                        <td><form method='post' action='CadastroPedidoView.php'>
                                <input  type='hidden' name='id_Cliente' value='$id'>
                                <input class='btn btn-outline-dark'  type='submit' value='Incluir Pedido' '>
                                </form>
                        </td>
                    </tr>"
                             
                        ;													
					}
                
                $html.= "   </tbody>
                            </table> <a href='GestaoComercialView.php' class='btn btn-secondary ' role='button' aria-pressed='true'>Voltar</a>
                            </div>
                        </div>";
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