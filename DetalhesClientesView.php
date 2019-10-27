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
            if ($_SESSION['autenticado']){
                $idCliente = $_POST['id_Cliente'];
                $clienteRepositorio = new ClienteRepositorio();
                $clientes = new Cliente();
                $clientes = $clienteRepositorio->buscarPorId($idCliente);

                $nome =$clientes->getNome();
                $cnpj=$clientes->getCnpj();
                $email=$clientes->getEmail();
                $telefone=$clientes->getTelefone();  
                $cidade=$clientes->getCidade();  
                $estado=$clientes->getEstado();  
                $cep=$clientes->getCep();
                
                $html="
                <div class='card'>
                    <div class='card-body'>
                        <h5 class='card-title'>Detalhes do Cliente</h5>
                        <form action='EditarClientesView.php' method='post'>
                            <div class='form-row'>
                                <div class='col-md-4 mb-3'>
                                    <label for='validationDefault01'>Nome/Razão Social</label>
                                    <input type='text' class='form-control' id='validationDefault01' name='nome' value='$nome'  readonly>
                                </div>
                                <div class='col-md-4 mb-3'>
                                    <label for='validationDefault02'>CPF/CNPJ</label>
                                    <input type='text' class='form-control' id='validationDefault02' name='cnpj' value='$cnpj'  readonly>
                                </div>
                                <div class='col-md-4 mb-3'>
                                    <label for='validationDefault02'>Email</label>
                                    <input type='email' class='form-control' id='validationDefault02' name='email' value='$email'  readonly>
                                </div>
                            </div>
                            <div class='form-row'>
                                <div class='col-md-3 mb-3'>
                                    <label for='validationDefault03'>Telefone</label>
                                    <input type='text' class='form-control' id='validationDefault03' name='telefone' value='$telefone' readonly>
                                </div>
                                <div class='col-md-3 mb-3'>
                                    <label for='validationDefault03'>Cidade</label>
                                    <input type='text' class='form-control' id='validationDefault03' name='cidade' value='$cidade' readonly>
                                </div>
                                <div class='col-md-3 mb-3'>
                                    <label for='validationDefault04'>Estado</label>
                                    <input type='text' class='form-control' id='validationDefault02' name='estado' value='$estado' readonly>
                                </div>
                                <div class='col-md-3 mb-3'>
                                    <label for='validationDefault05'>CEP</label>
                                    <input type='text' class='form-control' id='validationDefault05' name='cep' value='$cep' readonly>
                                </div>
                            </div>

                            <input  type='hidden' name='id_Cliente' value='$idCliente'>
                            <a href='ListaClientesView.php' class='btn btn-secondary ' role='button' aria-pressed='true'>Voltar</a>
                            &nbsp &nbsp &nbsp
                            <input class='btn btn-outline-success'  type='submit' value='Editar' '>
                        </form>
                        <br>
                       
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
    </body>

</html>