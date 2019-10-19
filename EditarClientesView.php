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
                        <h5 class='card-title'>Editar Cliente</h5>
                        <form action='ClienteFabrica.php' method='post'>
                            <div class='form-row'>
                                <div class='col-md-4 mb-3'>
                                    <label for='validationDefault01'>Nome/Razão Social</label>
                                    <input type='text' class='form-control' id='validationDefault01' name='nome' value='$nome'  required>
                                </div>
                                <div class='col-md-4 mb-3'>
                                    <label for='validationDefault02'>CPF/CNPJ</label>
                                    <input type='text' class='form-control' id='validationDefault02' name='cnpj' value='$cnpj'  required>
                                </div>
                                <div class='col-md-4 mb-3'>
                                    <label for='validationDefault02'>Email</label>
                                    <input type='email' class='form-control' id='validationDefault02' name='email' value='$email'  required>
                                </div>
                            </div>
                            <div class='form-row'>
                                <div class='col-md-3 mb-3'>
                                    <label for='validationDefault03'>Telefone</label>
                                    <input type='text' class='form-control' id='validationDefault03' name='telefone' value='$telefone' required>
                                </div>
                                <div class='col-md-3 mb-3'>
                                    <label for='validationDefault03'>Cidade</label>
                                    <input type='text' class='form-control' id='validationDefault03' name='cidade' value='$cidade' required>
                                </div>
                                <div class='col-md-3 mb-3'>
                                <label for='validationDefault04'>Estado</label>
                                <select class='custom-select'name='estado' required>
                                    <option value=''>Estado</option>
                                    <option value='Acre' ";if($estado=="Acre"){$html.='selected';};$html.= ">Acre</option>
                                    <option value='Alagoas' ";if($estado=="Alagoas"){$html.='selected';};$html.= ">Alagoas</option>
                                    <option value='Amapá'";if($estado=="Amapa"){$html.='selected';};$html.= ">Amapá </option>
                                    <option value='Amazonas'";if($estado=="Amazonas"){$html.='selected';};$html.= ">Amazonas </option>
                                    <option value='Bahia'";if($estado=="Bahia"){$html.='selected';};$html.= ">Bahia </option>
                                    <option value='Ceará'";if($estado=="Ceará"){$html.='selected';};$html.= ">Ceará</option>
                                    <option value='Distrito Federal'";if($estado=="Distrito Federal"){$html.='selected';};$html.= ">Distrito Federal</option>
                                    <option value='Espírito Santo'";if($estado=="Espirito Santo"){$html.='selected';};$html.= ">Espírito Santo</option>
                                    <option value='Goiás'";if($estado=="Goiás"){$html.='selected';};$html.= ">Goiás</option>
                                    <option value='Maranhão'";if($estado=="Maranhão"){$html.='selected';};$html.= ">Maranhão </option>
                                    <option value='Mato Grosso'";if($estado=="Mato Grosso"){$html.='selected';};$html.= ">Mato Grosso </option>
                                    <option value='Mato Grosso do Sul'";if($estado=="Mato Grosso do Sul"){$html.='selected';};$html.= ">Mato Grosso do Sul </option>
                                    <option value='Minas Gerais'";if($estado=="Minas Gerais"){$html.='selected';};$html.= ">Minas Gerais </option>
                                    <option value='Pará '";if($estado=="Pará"){$html.='selected';};$html.= ">Pará  </option>
                                    <option value='Paraíba'";if($estado=="Paraíba"){$html.='selected';};$html.= ">Paraíba</option>
                                    <option value='Paraná '";if($estado=="Paraná"){$html.='selected';};$html.= ">Paraná  </option>
                                    <option value='Pernambuco'";if($estado=="Pernambuco"){$html.='selected';};$html.= ">Pernambuco</option>
                                    <option value='Piauí '";if($estado=="Piauí"){$html.='selected';};$html.= ">Piauí </option>
                                    <option value='Rio de Janeiro'";if($estado=="Rio de Janeiro"){$html.='selected';};$html.= ">Rio de Janeiro</option>
                                    <option value='Rio Grande do Norte'";if($estado=="Rio Grande do Norte"){$html.='selected';};$html.= ">Rio Grande do Norte</option>
                                    <option value='Rio Grande do Sul'";if($estado=="Rio Grande do Sul"){$html.='selected';};$html.= ">Rio Grande do Sul</option>
                                    <option value='Rondônia'";if($estado=="Rondônia"){$html.='selected';};$html.= ">Rondônia</option>
                                    <option value='Roraima'";if($estado=="Roraima"){$html.='selected';};$html.= ">Roraima</option>
                                    <option value='Santa Catarina'";if($estado=="Santa Catarina"){$html.='selected';};$html.= ">Santa Catarina</option>
                                    <option value='São Paulo'";if($estado=="São Paulo"){$html.='selected';};$html.= ">São Paulo</option>
                                    <option value='Sergipe'";if($estado=="Sergipe"){$html.='selected';};$html.= ">Sergipe</option>
                                    <option value='Tocantins'";if($estado=="Tocantins"){$html.='selected';};$html.= ">Tocantins</option>
                                </select>
                                </div>
                                <div class='col-md-3 mb-3'>
                                    <label for='validationDefault05'>CEP</label>
                                    <input type='text' class='form-control' id='validationDefault05' name='cep' value='$cep' required>
                                </div>
                                <input  type='hidden' name='update' value='$idCliente'>
                                <input class='btn btn-outline-dark'  type='submit' value='Salvar' '>
                                &nbsp &nbsp &nbsp
                                <a href='ListaClientesView.php' class='btn btn-secondary ' role='button' aria-pressed='true'>Voltar</a>
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
    </body>

</html>