<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script>
    function Sucesso() {
        alert("Ordem Encerrada Com Sucesso")
        window.location.href = "EncerramentoOrdemView.php"
    }
    function NaoConfere() {
        alert("OPSSS...Quantidade de peças aprovadas/reprovadas não confere com o total de peças")
        window.location.href = "EncerramentoOrdemView.php"
    }
    </script>
<?php
    require_once("OrdemClass.php");
    require_once("OrdemRepositorio.php");
    require_once("ItemRepositorio.php"); 
    require_once("ItemClass.php");

    $item= new Item();
    $itemRepositorio = new ItemRepositorio();
    $ordemRepositorio = new OrdemRepositorio(); 
    if(isset($_POST["total"]) && isset($_POST["codItem"])  && isset($_POST["idOrdem"]) 
    && isset($_POST["quantidadeApro"])&& isset($_POST["quantidadeRepro"])){
        $totalOrdem = $_POST["total"];
        $codItem= $_POST["codItem"];
        $idOrdem = $_POST["idOrdem"];
        $ordem = $ordemRepositorio->buscarPorId($idOrdem);
        $item = $itemRepositorio->buscarPorId($codItem);
        $quantidadeApro = $_POST["quantidadeApro"];
        $quantidadeRepro = $_POST["quantidadeRepro"];
        if($quantidadeApro+$quantidadeRepro == $totalOrdem){
            $quantidade = $quantidadeApro+$item->getQuantidade(); 
            $item->setQuantidade($quantidade);
            $itemRepositorio->alterarQuantidade($item);
            $ordem->setPendente(false);
            $ordemRepositorio->alterarStatus($ordem);
            echo"<script>
                Sucesso();
                </script>";
        }else{
            echo"<script>
                NaoConfere();
                </script>";
        }
        
    }else{
        header('location:index.php');
    };
?>
