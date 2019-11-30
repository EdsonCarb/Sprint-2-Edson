
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
        <img src='http://dbcorp.com.br/wp-content/uploads/2017/03/estoque-dark-1.jpg' class='ard-img-top' height='200'  width='100%'>
        <div class='card-body'>
            <h5 class='card-title'>Gestão de Estoque</h5>
            <a type='button'  href='RelatorioAnaliticoView.php' class='btn btn-outline-dark btn-lg btn-block'>Relatorio de Estoque Analítico</a>
            <a type='button'  href='EncerramentoOrdemView.php' class='btn btn-outline-dark btn-lg btn-block'>Encerramento de Ordens de Produção</a>
            <a type='button'  href='ItemParaPedidos.php' class='btn btn-outline-dark btn-lg btn-block'>Detalhamento de Pedidos por Item</a>
             
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