
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
        

        $html= "<div class='card mb-3'>
        <img src='Imagens/comer.jpg' class='ard-img-top' height='200'  width='100%'>
        <div class='card-body'>
          <h5 class='card-title'>Gestão Comercial</h5>
          <p class='card-text'>Este módulo permite o gerenciamento de clientes e o gerenciamento de pedidos.</p>
          <a type='button'  href='GestaoComercialView.php' class='btn btn-outline-dark btn-lg btn-block'>Acessar</a>
        </div>
      </div>
        <div class='card mb-3'>
        <img src='Imagens/prod2.jpg' class='ard-img-top' height='200'  width='100%'>
        <div class='card-body'>
          <h5 class='card-title'>Gestão de Produção</h5>
          <p class='card-text'>Este módulo permite o gerenciamento de ordens de produção e a visualização de relatórios.</p>
          <a type='button'  href='GestaoProducaoView.php' class='btn btn-outline-dark btn-lg btn-block'>Acessar</a>
        </div>
        </div>
        <div class='card mb-3'>
          <img src='Imagens/est.jpg' class='ard-img-top' height='200'  width='100%'>
          <div class='card-body'>
            <h5 class='card-title'>Gestão de Estoque</h5>
            <p class='card-text'>Este módulo permite o gerenciamento do estoque e a visualização de relatórios.</p>
            <a type='button'  href='' class='btn btn-outline-dark btn-lg btn-block'>Acessar</a>
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