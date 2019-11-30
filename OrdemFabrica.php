<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<?php
    require_once("OrdemClass.php");
    require_once("OrdemRepositorio.php"); 
    
    $ordemRepositorio = new OrdemRepositorio(); 
    if(isset($_POST["quantidade"]) && isset($_POST["dataEntrega"])  
    && isset($_POST["cod_item"])){
        $quantidade = $_POST["quantidade"];
        $dataEntrega = $_POST["dataEntrega"];
        $idItem = $_POST["cod_item"];
        $dataAtual='20';
        $dataAtual.=date("y-m-d");
        $ordem= new Ordem();
        $ordem->setQuantidade($quantidade);
        $ordem->setDataEntrega($dataEntrega);
        $ordem->setIdItem( $idItem);
        $ordem->setDataEmissão($dataAtual);
        $ordem->setPendente(true); 
        echo "<script>'Swal.fire();'</script>";
        echo " ";
        $ordemRepositorio ->postOrdem($ordem); 
        
        #header('location:CadastroItemView.php');
    }else{
        header('location:index.php');
    };
?>
<script>
Swal.fire({
  position: 'center',
  icon: 'success',
  title: 'Dados Salvos com Sucesso',
  showConfirmButton: false,
  timer: 4000
})
setTimeout( function() {
    window.location="RelatorioAnaliticoView.php";
}, 2000 );


</script>