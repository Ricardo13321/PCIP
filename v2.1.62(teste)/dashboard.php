<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header('Location: index.php');
    exit();
}

date_default_timezone_set('America/Sao_Paulo');

$datesplit = explode('/', $_SESSION['date'][0]);

include('controle/formulas.php');
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--ajuda o navegador a entender que a linguagem do site é pt-br-->
    <meta http-equiv="content-language" content="pt-br">
    <title>DASHBOARD</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
    <link type="text/css" rel="stylesheet" href="css/estilo.css">
</head>
<style>
    .card{
        border: none;
    }
</style>
<body>
    <div class="menutopo h-10 d-none d-xl-flex align-items-center bg-primary text-white">
        <h2 class="m-auto"><b>GERENCIAMENTO DE PRODUÇÃO</b></h2>
    </div>
    <div class="d-flex h-90 w-100 align-items-stretch">
        <div class="d-flex navmenu">
            <?php include "view/menunav.php" ?>
        </div>
        <div style="overflow-x: hidden; overflow-y: auto;" class=" h-auto w-100">
            <div class="text-center">
                <div class="row g-0">
                    <div class="col-12">
                        <nav class="navbar align-items-start">
                            <form method="get" action="controle/init.php">
                                <div class="input-group">
                                    <label name="data-inicial" class="input-group-text">Data Inicial</label>
                                    <input name="data-inicial" type="date" class="form-control" min="<?php echo $datesplit[2].'-'.$datesplit[1].'-'.$datesplit[0] ?>" max="<?php echo date("Y-m-d") ?>" value="<?php echo $datesplit[2].'-'.$datesplit[1].'-'.$datesplit[0] ?>">
                                </div>
                                <div class="input-group">
                                    <span class="input-group-text">Data Final</span>
                                    <input type="date" class="form-control" min="<?php echo $datesplit[2].'-'.$datesplit[1].'-'.$datesplit[0] ?>" max="<?php echo date("Y-m-d") ?>" value="<?php echo date("Y-m-d") ?>">
                                </div>
                                <input type="submit" value="ATUALIZAR" class="btn btn-primary me-2">
                            </form>
                        </nav>
                    </div>
                <div class="row g-0">
                            <div class="col col-sm-2">
                                <div class="p-2 m-0">
                                    <div class="card shadow-lg">
                                        <div class="card-header">
                                            <h6 class="text-truncate">TAXA DE PRODUÇÃO</h6>
                                        </div>
                                        <div class="card-body">
                                            <b><span><h1><?php echo $_SESSION['Taxa_de_Producao'] ?></h1></span></b>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col col-sm-2">
                                <div class="p-2 m-0">
                                    <div class="card shadow-lg">
                                        <div class="card-header">
                                            <h6 class="text-truncate">TAXA DE REFUGO</h6>
                                        </div>
                                        <div class="card-body">
                                            <b><span><h1><?php echo $_SESSION['taxa_refugo']."%" ?></h1></span></b>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col col-sm-2">
                                <div class="p-2 m-0">
                                    <div class="card shadow-lg">
                                        <div class="card-header">
                                            <h6 class="text-truncate">TEMPO MEDIO DE PRODUÇÃO</h6>
                                        </div>
                                        <div class="card-body">
                                            <b>
                                                <span>
                                                    <h1>
                                                        <?php 
                                                            echo $_SESSION['Tempo_medio_producao']
                                                        ?>
                                                    </h1>
                                                </span>
                                            </b>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col col-sm-2">
                                <div class="p-2 m-0">
                                    <div class="card shadow-lg">
                                        <div class="card-header">
                                            <h6 class="text-truncate">TOTAL PRODUZIDO</h6>
                                        </div>
                                        <div class="card-body">
                                            <b><span><h1><?php echo $_SESSION["producao_total"] ?></h1></span></b>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col col-sm-2">
                                <div class="p-2 m-0">
                                    <div class="card shadow-lg">
                                        <div class="card-header">
                                            <h6 class="text-truncate">PRODUTO FINAL</h6>
                                        </div>
                                        <div class="card-body">
                                            <b><span><h1><?php echo $_SESSION["produto_final"] ?></h1></span></b>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col col-sm-2">
                                <div class="p-2 m-0">
                                    <div class="card shadow-lg">
                                        <div class="card-header">
                                            <h6 class="text-truncate">REFUGO/PERDAS</h6>
                                        </div>
                                        <div class="card-body">
                                            <b><span><h1><?php echo $_SESSION['perda'] ?></h1></span></b>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                <div class="row g-0">
                    <div class="col-xl-9">
                        <div class="row">
                            <div class="p-2 m-0 col-6">
                                <div class="card shadow-lg">
                                    <div class="card-header">
                                        <h6>PERFORMANCE</h6>
                                    </div>
                                    <div class="card-body">
                                        <?php include "graficos/graficoperformance.php" ?><hr>
                                    </div>
                                </div>
                                <div class="card shadow-lg">
                                    <div class="card-header">
                                        <h6>META SEMANAL</h6>
                                    </div>
                                    <div class="card-body">
                                        <?php include "graficos/graficometa.php" ?>
                                    </div>
                                </div>
                            </div>
                            <div class="p-2 m-0 col-6">
                                <div class="card shadow-lg">
                                    <div class="card-header">
                                        <h6>PRODUÇÃO POR FUNCIONÁRIO</h6>
                                    </div>
                                    <div class="card-body">
                                        <?php include "graficos/graficoprodfuncionarios.php" ?>
                                    </div>
                                </div>
                            </div>
                            <div class="p-2 m-0 col-6">
                                
                            </div>
                            
                        </div>
                    </div>
                    <div class="col-xl-3">
                        <div class="row g-0">
                            
                            <div class="col col-sm-12">
                                <div class="p-2 m-0">
                                    <div class="card shadow-lg">
                                        <div class="card-header">
                                            <h6>RETRABALHO</h6>
                                        </div>
                                        <div class="card-body">
                                            <b>
                                                <span>
                                                    <h3>Couro: 
                                                        <?php 
                                                            echo $_SESSION["retrabalho_couro"];
                                                        ?>
                                                        <br>
                                                        Cola: 
                                                        <?php
                                                            echo $_SESSION["retrabalho_cola"];
                                                        ?>
                                                    </h3>
                                                </span>
                                            </b>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                            <div class="col col-sm-12">
                                <div class="p-2 m-0">
                                    <div class="card shadow-lg">
                                        <div class="card-header">
                                            <h6>PRODUÇÃO</h6>
                                        </div>
                                        <div class="card-body">
                                            <?php include "graficos/graficoproducao.php" ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col col-sm-12">
                                <div class="p-2 m-0">
                                    <div class="card shadow-lg">
                                        <div class="card-header">
                                            <h6>RETRABALHO</h6>
                                        </div>
                                        <div class="card-body d-flex justify-content-center">
                                            <?php include "graficos/graficoretrabalho.php" ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>  
                </div>
            </div>
        </div>
    </div>
</body>
</html>
