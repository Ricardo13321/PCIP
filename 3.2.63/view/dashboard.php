<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header('Location: index.php');
    exit();
}

include('../controle/formulas.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="content-language" content="pt-br">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
    <link type="text/css" rel="stylesheet" href="../css/estilo.css">
</head>
<body>
    <div style="overflow-x: hidden; overflow-y: auto;" class=" h-auto w-100">
            <div class="text-center">
                    <div class="row g-2">
                        <div class="col col-sm-2">
                            <div class="rounded-border p-2 shadow-lg">
                                <h6 class="text-truncate"><b>TAXA DE PRODUÇÃO</b></h6>
                                <hr> 
                                <h1><b><span><?php echo $_SESSION['Taxa_de_Producao'] ?></span></b></h1>
                            </div>
                        </div>
                        <div class="col col-sm-2">
                            <div class="rounded-border p-2 shadow-lg">
                                <h6 class="text-truncate"><b>TAXA DE REFUGO</b></h6>
                                <hr>
                                <h1><b><span class="text-truncate"><?php echo $_SESSION['taxa_refugo'] . "%" ?></span></b></h1>
                            </div>
                        </div>
                        <div class="col col-sm-2">
                            <div class="rounded-border p-2 shadow-lg">
                                <h6 class="text-truncate"><b>TEMPO MEDIO DE PRODUÇÃO</b></h6>
                                <hr>
                                <h1><b><span class="text-truncate"><?php echo $_SESSION['Tempo_medio_producao'] ?></span></b></h1>
                            </div>
                        </div>
                        <div class="col col-sm-2">
                            <div class="rounded-border p-2 shadow-lg">
                                <h5 class="text-truncate"><b>TOTAL PRODUZIDO</b></h5>
                                <hr>
                                <h1><b><span><?php echo $_SESSION["producao_total"] ?></span></b></h1>
                            </div>
                        </div>
                        <div class="col col-sm-2">
                            <div class="rounded-border p-2 shadow-lg">
                                <h5 class="text-truncate"><b>PRODUTO FINAL</b></h5>
                                <hr>
                                <h1><b><span><?php echo $_SESSION["produto_final"] ?></span></b></h1>
                            </div>
                        </div>
                        <div class="col col-sm-2">
                            <div class="rounded-border p-2 shadow-lg">
                                <h5 class="text-truncate"><b><span>PERDAS</span></b></h5>
                                <hr>
                                <h1><b><span><?php echo $_SESSION['perda'] ?></span></b></h1>
                            </div>
                        </div>
                        <div class="col-9">
                            <iframe class="border shadow-lg rounded-border" src="../graficos/graficolinha.php" style="height: 500px; width: 100%;"></iframe>
                        </div>
                        <div class="col col-sm-3">
                            <div class="row g-2 justify-content-center">
                                <div class="rounded-border col-12 p-2 shadow-lg">
                                    <h3 class="text-truncate"><b><span>DEFEITO</span></b></h3>
                                    <hr>
                                    <b><span>
                                            <h3><b><span>Couro: <?php echo $_SESSION["retrabalho_couro"]; ?>
                                                <br>
                                                Cola: <?php echo $_SESSION["retrabalho_cola"]; ?>
                                            </span></b></h3>
                                        </span></b>
                                    </div>
                                <iframe class="rounded-border col-12 shadow-lg" src="../graficos/graficoproducao.php" style="height: 200px;"></iframe>
                            </div>
                        </div>
                        <div class="col-6">
                            <iframe class="border shadow-lg rounded-border" src="../graficos/graficoprodfuncionarios.php" style="height: 500px; width: 100%;" frameborder="0"></iframe>
                        </div>
                        <div class="col-6">
                            <iframe class="col-6 border shadow-lg rounded-border" src="../graficos/graficoperformance.php" style="height: 500px; width: 100%;"></iframe>
                        </div>
                    </div>
            </div>
        </div>
</body>
</html>