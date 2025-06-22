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
    <div style="overflow-x: hidden; overflow-y: auto;" class=" h-auto m-2">
            <div class="text-center">
                    <div class="row g-2">
                        <div class="col-lg-3 col-sm-6">
                            <div class="rounded-border p-2 ">
                                <h6 class="text-truncate"><b>TAXA DE PRODUÇÃO</b></h6>
                                <h1><b><span><?php echo $_SESSION['Taxa_de_Producao'] ?></span></b></h1>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6">
                            <div class="rounded-border p-2 ">
                                <h6 class="text-truncate"><b>TAXA DE REFUGO</b></h6>
                                <h1><b><span class="text-truncate"><?php echo $_SESSION['taxa_refugo'] . "%" ?></span></b></h1>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6">
                            <div class="rounded-border p-2 ">
                                <h6 class="text-truncate"><b>TEMPO MEDIO DE PRODUÇÃO</b></h6>
                                <h1><b><span class="text-truncate"><?php echo $_SESSION['Tempo_medio_producao'] ?></span></b></h1>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6">
                            <div class="rounded-border p-2 ">
                                <h5 class="text-truncate"><b>TOTAL PRODUZIDO</b></h5>
                                <h1><b><span><?php echo $_SESSION["producao_total"] ?></span></b></h1>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6">
                            <div class="rounded-border p-2 ">
                                <h5 class="text-truncate"><b>PRODUTO FINAL</b></h5>
                                <h1><b><span><?php echo $_SESSION["produto_final"] ?></span></b></h1>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6">
                            <div class="rounded-border p-2 ">
                                <h5 class="text-truncate"><b><span>PERDAS</span></b></h5>
                                <h1><b><span><?php echo $_SESSION['perda'] ?></span></b></h1>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6">
                            <div class="rounded-border p-2 ">
                                <h5 class="text-truncate"><b><span>DEFEITO COLA</span></b></h5>
                                <h1><b><span><?php echo $_SESSION["retrabalho_cola"]; ?></span></b></h1>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6">
                            <div class="rounded-border p-2 ">
                                <h5 class="text-truncate"><b><span>DEFEITO COURO</span></b></h5>
                                <h1><b><span><?php echo $_SESSION["retrabalho_couro"]; ?></span></b></h1>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <iframe class="rounded-border" src="../graficos/graficolinha.php" style="height: 400px; width: 98%;"></iframe>
                        </div>
                        <div class="col-6 col-md-3" style="height: 400px;">
                            <div class="row g-2 justify-content-center">
                                <iframe class="rounded-border col-12 " src="../graficos/graficoproducao.php" style="height: 400px; width: 98%;"></iframe>
                            </div>
                        </div>
                        <div class="col-6 col-md-3" style="height: 400px;">
                            <div class="row g-2 justify-content-center">
                                <iframe class="rounded-border col-12 " src="../graficos/graficoproducao.php" style="height: 400px; width: 98%;"></iframe>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <iframe class="rounded-border" src="../graficos/graficoprodfuncionarios.php" style="height: 600px; width: 98%;" frameborder="0"></iframe>
                        </div>
                        <div class="col-12 col-md-6">
                            <iframe class="rounded-border" src="../graficos/graficoquanprod.php" style="height: 600px; width: 98%;"></iframe>
                        </div>
                    </div>
            </div>
        </div>
</body>
</html>