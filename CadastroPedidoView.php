<!DOCTYPE html>
<html lang='pt-br'>
    <head>
        <link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css' integrity='sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO' crossorigin='anonymous'>
    </head>
    <body>
        <?php
            require_once('sessao.php'); 
            require_once('MenuView.php');
            require_once('ClienteRepositorio.php');
            require_once('ClienteClass.php');
            if ($_SESSION['autenticado'] and  $_POST['id_Cliente']){
                $idCliente = $_POST['id_Cliente'];
                $clienteRepositorio = new ClienteRepositorio();
                $cliente = new Cliente();
                $cliente = $clienteRepositorio->buscarPorId($idCliente);
                $nome =$cliente->getNome();
                $id=$cliente->getId();
                    
                $html="
                <div class='card'>
                    <div class='card-body'>
                        <h5 class='card-title'>Cadastro de Pedidos</h5>
                        <h5>Cliente: '$nome'</h5>
                        <form action='PedidoFabrica.php' method='post'>
                            <div class='form-row'>
                                <div class='col-md-4 mb-3'>
                                    <label for='validationDefault01'>Pedido Linha </label>
                                    <input type='text' class='form-control' id='validationDefault01' name='pedidoLinha'  required>
                                </div>
                                <div class='col-md-4 mb-3'>
                                    <label for='validationDefault02'>Data de Entrega</label>
                                    <input type='date' class='form-control' id='validationDefault02' name='dataEntrega'  required>
                                </div>
                                
                                <input  type='hidden' name='id_Cliente' value='$id'>
                            </div>
                            <button class='btn btn-primary' type='submit'>Enviar</button>
                        </form>
                    </div>
                </div>";
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