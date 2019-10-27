<!DOCTYPE html>
<html lang='pt-br'>
    <head>
        <link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css' integrity='sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO' crossorigin='anonymous'>
    </head>
    <body>
        <?php
            require_once('sessao.php'); 
            require_once('MenuView.php');
            if ($_SESSION['autenticado']){


                $html="
                <div class='card'>
                    <div class='card-body'>
                        <h5 class='card-title'>Cadastro de Clientes</h5>
                        <form action='ClienteFabrica.php' method='post'>
                            <div class='form-row'>
                                <div class='col-md-4 mb-3'>
                                    <label for='validationDefault01'>Razão Social</label>
                                    <input type='text' class='form-control' id='validationDefault01' name='nome'  required>
                                </div>
                                <div class='col-md-4 mb-3'>
                                    <label for='validationDefault02'>CNPJ</label>
                                    <input type='text' class='form-control' id='CNPJ' name='cnpj'  required>
                                </div>
                                <div class='col-md-4 mb-3'>
                                    <label for='validationDefault02'>Email</label>
                                    <input type='email' class='form-control' id='validationDefault02' name='email'  required>
                                </div>
                            </div>
                            <div class='form-row'>
                                <div class='col-md-3 mb-3'>
                                    <label for='validationDefault03'>Telefone</label>
                                    <input type='text' class='form-control' id='TEL' name='telefone' required>
                                </div>
                                <div class='col-md-3 mb-3'>
                                    <label for='validationDefault03'>Cidade</label>
                                    <input type='text' class='form-control' id='validationDefault03' name='cidade'  required>
                                </div>
                                <div class='col-md-3 mb-3'>
                                    <label for='validationDefault04'>Estado</label>
                                        <select class='custom-select'name='estado' required>
                                            <option value=''>Estado</option>
                                            <option value='Acre'>Acre</option>
                                            <option value='Alagoas'>Alagoas</option>
                                            <option value='Amapá'>Amapá </option>
                                            <option value='Amazonas'>Amazonas </option>
                                            <option value='Bahia'>Bahia </option>
                                            <option value='Ceará'>Ceará</option>
                                            <option value='Distrito Federal'>Distrito Federal</option>
                                            <option value='Espírito Santo'>Espírito Santo</option>
                                            <option value='Goiás'>Goiás</option>
                                            <option value='Maranhão'>Maranhão </option>
                                            <option value='Mato Grosso'>Mato Grosso </option>
                                            <option value='Mato Grosso do Sul'>Mato Grosso do Sul </option>
                                            <option value='Minas Gerais'>Minas Gerais </option>
                                            <option value='Pará '>Pará  </option>
                                            <option value='Paraíba'>Paraíba</option>
                                            <option value='Paraná '>Paraná  </option>
                                            <option value='Pernambuco'>Pernambuco</option>
                                            <option value='Piauí '>Piauí </option>
                                            <option value='Rio de Janeiro'>Rio de Janeiro</option>
                                            <option value='Rio Grande do Norte'>Rio Grande do Norte</option>
                                            <option value='Rio Grande do Sul'>Rio Grande do Sul</option>
                                            <option value='Rondônia'>Rondônia</option>
                                            <option value='Roraima'>Roraima</option>
                                            <option value='Santa Catarina'>Santa Catarina</option>
                                            <option value='São Paulo'>São Paulo</option>
                                            <option value='Sergipe'>Sergipe</option>
                                            <option value='Tocantins'>Tocantins</option>
                                        </select>
                                </div>
                                <div class='col-md-3 mb-3'>
                                    <label for='validationDefault05'>CEP</label>
                                    <input type='text' class='form-control' id='CEP' name='cep' required>
                                </div>
                            </div>
                            <a href='GestaoComercialView.php' class='btn btn-secondary ' role='button' aria-pressed='true'>Voltar</a>
                            &nbsp &nbsp &nbsp
                            <button class='btn btn-outline-success' type='submit'>Enviar</button>
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