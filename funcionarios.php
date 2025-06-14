<?php 
session_start();
if (!isset($_SESSION['usuario'])) {
    header('Location: index.php');
    exit();
}
?>
<!-- link para os botões customizados https://uiverse.io/buttons?page=1-->
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--Ajuda o navegador a entender que a linguagem do site é pt-br -->
    <meta http-equiv="content-language" content="pt-br">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
    <title>LISTAGEM</title>
    <link rel="icon" type="image/x-icon" href="caticon.png">
    <link type="text/css" rel="stylesheet" href="css/estilo.css">
</head>
<body>
    <div class="menutopo h-10 d-none d-xl-flex align-items-center bg-primary text-white">
        <h2 class="m-auto" ><b>FUNCIONÁRIO</b></h2>
    </div>
    <div class="d-xl-flex  h-85">
            <?php include "view/menunav.php" ?>
        <div class="w-100 h-85">
            <div class="py-3 d-flex justify-content-between" style="background: whitesmoke;">
                <strong><h3>LISTAGEM DO DIA 27/05/2025</h3></strong>
                <div class="row row-cols-sm-auto d-flex m-0 p-0 h-100">
                    <div>
                        Filtrar por:
                        <div>
                            <input type="checkbox" name="filtro">
                            <label>Funcionário</label>
                            <input type="checkbox" name="filtro">
                            <label>Modelo</label>
                            <input type="checkbox" name="filtro">
                            <label>Estado</label>
                        </div>
                    </div>
                    <div>
                        <input type="search" id="pesquisar" class="" placeholder="Pesquisar">
                    </div>
                    <?php if ($_SESSION['privilegios'] == 'admin') { ?>
                    <div class="d-flex flex-column flex-xxl-row">
                        <b><input class="m-1 btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" type="button" value="CADASTRAR"></b>
                        <a href="controle/salvar.php"><input class="m-1 btn btn-primary" type="button" value="SALVAR"></a>
                    </div>
                    <?php } ?>
                </div>
            </div> 
            <div class="overflow-auto" style="height: 90%; background: white;">         
                <table class="table table-bordered">
                    <tbody id="table">
                        <?php include "view/listafuncionarios.php" ?>
                    </tbody>
                </table>
            </div>
            <div class="h-auto p-1" style="background: whitesmoke;">
                
            </div>
        </div>        
    </div>

    <!-- Modal CADASTRAR-->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title fs-5" id="exampleModalLabel">CADASTRAR ENTREGA</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <?php if ($_SESSION['privilegios'] == 'admin') { ?>
                <div id="form" class="modal-body text-start">
                    <form method="get" action="cadastrarfuncionario.php">
                        <div class="mb-3"> 
                            <label class="form-label">Nome</label>
                            <input class="form-control" type="text" placeholder="Nome" required autofocus name="nome">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Cargo</label>
                            <input class="form-control" type="text" placeholder="Cargo" required name="cargo">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Setor</label>
                            <input class="form-control" type="text" placeholder="Setor" required  name="setor">
                        </div>
                        <div class="float-end">
                            <input  type="submit" value="Salvar">
                            <input type="button" data-bs-dismiss="modal" value="Cancelar">
                        </div>
                    </form>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>
</body>
</html>

<script language="javascript" type="text/javascript" >
    const url = "editar.php?id=";
    const email = document.getElementById("email");
    const nome = document.getElementById("nome");
    const genero = document.getElementById("floatingSelect");
    const form = document.getElementById("form_edit");
    const senha = document.getElementById("senha");
    const btnExcluir = document.getElementById("btn-excluir");
    const exemail = document.getElementById("excluir_email");
    const nomatch = document.getElementById("nomatch");

    document.addEventListener('DOMContentLoaded', function () {
        const input_pesquisar = document.getElementById("pesquisar");
        const table = document.getElementById("table");
        const trList = table.getElementsByTagName('tr');

        input_pesquisar.addEventListener('keyup', function () {
            let txt = input_pesquisar.value;
            txt = txt.toUpperCase();
            let filtroID = false;
            let filtroNome = false;
            let filtroEmail = false;
            let filtroGenero = false;
            let allfalse = true;

            for (let index1 = 1; index1 < trList.length; index1++) {
                let _loc1_ = trList[index1].getElementsByTagName('td');
                //let _loc1_ = trList[index];
                for (let index2 = 0; index2 < _loc1_.length-1; index2++) { 
                    if (index2 == 0) {filtroID = _loc1_[index2].textContent.toUpperCase().match(txt)? true:false; }
                    if (index2 == 1) {filtroNome = txt == _loc1_[index2].textContent.toUpperCase().match(txt)? true:false; }
                    if (index2 == 2) {filtroEmail = txt == _loc1_[index2].textContent.toUpperCase().match(txt)? true:false; }
                    if (index2 == 3) {filtroGenero = txt == _loc1_[index2].textContent.toUpperCase().match(txt)? true:false; }
                }
                if (!filtroID && !filtroNome && !filtroEmail && !filtroGenero) {
                    trList[index1].style.display = 'none';
                } else {
                    trList[index1].style.display = '';
                    allfalse = false;
                }
                
            }

            if (txt == '') {
                for (let index1 = 1; index1 < trList.length; index1++) {
                    trList[index1].style.display = '';
                }
            }
            
            nomatch.style.display = allfalse?'':'none';
            trList[0].style.display = allfalse?'none':'';

        });
    });
</script>