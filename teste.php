<!DOCTYPE html>
<html lang='pt-br'>
    <head>
        <link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css' integrity='sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO' crossorigin='anonymous'>
        
    </head>
    <body style =' background-color: #A9A9A9'>
    <?php
      	require_once('sessao.php'); 
        require_once('MenuView.php');?>
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <div class='card mb-3 card text-white' style =' background-color: #A9A9A9'>
          <img src='Imagens/comer.jpg' class='ard-img-top' height='200'  width='100%'>
        <div class='card-body'>
          <br>
          <br>
          <h5 class='card-title'>Gestão Comercial</h5>
          <p class='card-text'>Este módulo permite o gerenciamento de clientes e o gerenciamento de pedidos.</p>
          <br><br>
          <a type='button'  href='GestaoComercialView.php' class='btn btn-outline-secondary btn-lg btn-block'>Acessar</a>
        </div>
      </div>
      </div>
      <div class="carousel-item">
      <div class='card mb-3 card text-white' style =' background-color: #A9A9A9'>
        <img src='Imagens/prod2.jpg' class='ard-img-top' height='200'  width='100%'>
        <div class='card-body'>
          <h5 class='card-title'>Gestão de Produção</h5>
          <p class='card-text'>Este módulo permite o gerenciamento de ordens de produção e a visualização de relatórios.</p>
          <br><br>
          <a type='button'  href='GestaoProducaoView.php' class='btn btn-outline-secondary btn-lg btn-block'>Acessar</a>
        </div>
      </div>
      </div>
      <div class="carousel-item">
      <div class='card mb-3 card text-white' style =' background-color: #A9A9A9'>
          <img src='Imagens/est.jpg' class='ard-img-top' height='200'  width='100%'>
          <div class='card-body'>
            <h5 class='card-title'>Gestão de Estoque</h5>
            <p class='card-text'>Este módulo permite o gerenciamento do estoque e a visualização de relatórios.</p>
            <br><br>
            <a type='button'  href='' class='btn btn-outline-secondary btn-lg btn-block'>Acessar</a>
          </div>
        </div>
      </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev" >
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Anterior</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next" >
      <span class="carousel-control-next-icon"  aria-hidden="true"></span>
      <span class="sr-only">Próximo</span>
    </a>
</div>







<!--Carousel Wrapper-->
<div id="carousel-example-2" class="carousel slide carousel-fade" data-ride="carousel">
  <!--Indicators-->
  <ol class="carousel-indicators">
    <li data-target="#carousel-example-2" data-slide-to="0" class="active"></li>
    <li data-target="#carousel-example-2" data-slide-to="1"></li>
    <li data-target="#carousel-example-2" data-slide-to="2"></li>
  </ol>
  <!--/.Indicators-->
  <!--Slides-->
  <div class="carousel-inner" role="listbox">
    <div class="carousel-item active">
      <div class="view">
        <img class="d-block w-100" src='Imagens/testeCom.jpg'
          alt="First slide">
        <div class="mask rgba-black-light"></div>
      </div>
      <div class="carousel-caption">
        <h3 class="h3-responsive">Light mask</h3>
        <p>First text</p>
      </div>
    </div>
    <div class="carousel-item">
      <!--Mask color-->
      <div class="view">
        <img class="d-block w-100" src="https://mdbootstrap.com/img/Photos/Slides/img%20(6).jpg"
          alt="Second slide">
        <div class="mask rgba-black-strong"></div>
      </div>
      <div class="carousel-caption">
        <h3 class="h3-responsive">Strong mask</h3>
        <p>Secondary text</p>
      </div>
    </div>
    <div class="carousel-item">
      <!--Mask color-->
      <div class="view">
        <img class="d-block w-100" src="https://mdbootstrap.com/img/Photos/Slides/img%20(9).jpg"
          alt="Third slide">
        <div class="mask rgba-black-slight"></div>
      </div>
      <div class="carousel-caption">
        <h3 class="h3-responsive">Slight mask</h3>
        <p>Third text</p>
      </div>
    </div>
  </div>
  <!--/.Slides-->
  <!--Controls-->
  <a class="carousel-control-prev" href="#carousel-example-2" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carousel-example-2" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
  <!--/.Controls-->
</div>
<!--/.Carousel Wrapper--












        <script src='https://code.jquery.com/jquery-3.3.1.slim.min.js' integrity='sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo' crossorigin='anonymous'></script>
        <script src='https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js' integrity='sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49' crossorigin='anonymous'></script>
        <script src='https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js' integrity='sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy' crossorigin='anonymous'></script>
    </body>

</html>