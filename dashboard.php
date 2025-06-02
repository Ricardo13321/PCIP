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
    <link type="text/css" rel="stylesheet" href="estilo.css">
</head>
<style>
    .card{
        border: none;
    }

    .card-header {
        background: white;
        border-bottom: 1px solid gray;
    }
</style>
<body>
    <div class="menutopo h-10 d-none d-xl-flex align-items-center bg-primary text-white">
        <h2 class="m-auto"><b>GERENCIAMENTO DE PRODUÇÃO</b></h2>
    </div>
    <div class="d-flex h-90 w-100 align-items-stretch">
        <div class="d-flex navmenu">
            <?php include "menunav.html" ?>
        </div>
        <div style="overflow-x: hidden; overflow-y: auto;" class=" h-auto w-100">
            <div class="text-center">
                <div class="row g-0">
                    <div class="col-12">
                        <nav class="navbar">
                            
                        </nav>
                    </div>
                <div class="row g-0">
                    <div class="col-xl-9">
                        <div class="p-2 m-0">
                            <div class="card shadow-lg">
                                <div class="card-header">
                                    <h6>PERFORMANCE</h6>
                                </div>
                                <div class="card-body">
                                    <?php include "graficoperformance.php" ?><hr>
                                </div>
                            </div>
                        </div>
                        <div class="p-2 m-0">
                            <div class="card shadow-lg">
                                <div class="card-header">
                                    <h6>META SEMANAL</h6>
                                </div>
                                <div class="card-body">
                                    <?php include "graficometa.php" ?>
                                </div>
                            </div>
                        </div>
                        <div class="p-2 m-0">
                            <div class="card shadow-lg">
                                <div class="card-header">
                                    <h6>PRODUÇÃO POR FUNCIONÁRIO</h6>
                                </div>
                                <div class="card-body">
                                    <?php include "graficoprodfuncionarios.php" ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3">
                        <div class="row g-0">
                            <div class="col col-sm-12">
                                <div class="p-2 m-0">
                                    <div class="card shadow-lg">
                                        <div class="card-header">
                                            <h6>TOTAL PRODUZIDO</h6>
                                        </div>
                                        <div class="card-body">
                                            <h6>875</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col col-sm-12">
                                <div class="p-2 m-0">
                                    <div class="card shadow-lg">
                                        <div class="card-header">
                                            <h6>RETRABALHO COLA</h6>
                                        </div>
                                        <div class="card-body">
                                            <h6>56</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col col-sm-12">
                                <div class="p-2 m-0">
                                    <div class="card shadow-lg">
                                        <div class="card-header">
                                            <h6>RETRABALHO COURO</h6>
                                        </div>
                                        <div class="card-body">
                                            <h6>45</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col col-sm-12">
                                <div class="p-2 m-0">
                                    <div class="card shadow-lg">
                                        <div class="card-header">
                                            <h6>REFUGO/PERDAS</h6>
                                        </div>
                                        <div class="card-body">
                                            <h6>102</h6>
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
                                            <?php include "graficoproducao.php" ?>
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
                                        <div class="card-body">
                                            <?php include "graficoretrabalho.php" ?>
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