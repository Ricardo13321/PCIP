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
    <link type="text/css" rel="stylesheet" href="estilo.css">
</head>
<body>
    <div class="menutopo d-flex align-items-center shadow-lg h-15">
        <h2 class="m-auto" ><b>MENU INICIAL PCIP</b></h2>
    </div>
    <div class="d-flex  h-85">
        <div  class="d-flex shadow-lg navmenu">
            <?php include "menunav.html" ?>
        </div>
        <div class="w-100 h-85">
            <div class="py-3 d-flex justify-content-between" style="background: whitesmoke;">
                <strong><h3>LISTAGEM DO DIA 27/05/2025</h3></strong>
                <input type="search" id="pesquisar" placeholder="Pesquisar">
            </div> 
            <div style="overflow: auto;" class="h-85">         
                <table class="table table-bordered h-auto">
                    <tbody id="table">
                        <tr>
                            <th>Funcionário</th>
                            <th>Modelo</th>
                            <th>Estado</th>
                            <th>Data</th>
                            <th>Hora</th>
                        </tr>
                        <div>
                            <?php include "lista.html"; ?>
                        </div>
                    </tbody>
                </table>
            </div>
            <div class="h-auto" style="background: whitesmoke;">
                <form class="row row-cols-lg-auto d-flex m-0 p-3">
                    <div class="col-12">
                        <input class="form-control" type="text" name="Nome" placeholder="Nome" required>
                    </div>
                    <div>
                        <select class="form-select" id="floatingSelect" aria-label="modelo" name="modelo" required>
                                <option selected disabled>Modelo</option>
                                <option value="Modelo1">Modelo1</option>
                                <option value="Modelo2">Modelo2</option>
                                <option value="Modelo3">Modelo3</option>
                        </select>
                    </div>
                    <div>
                        <select class="form-select" id="floatingSelect" aria-label="estado" name="estado" required>
                                <option selected disabled>Estado</option>
                                <option value="Modelo1">Perfeito</option>
                                <option value="Modelo2">Defeito</option>
                                <option value="Modelo3">Perda</option>
                        </select>
                    </div>
                    <div class="float-end">
                        <input class="btn btn-success" type="submit" value="Salvar">
                    </div>
                </form>
            </div>
        </div>        
    </div>


    <!-- Modal EDITAR-->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title fs-5" id="exampleModalLabel">EDITAR USUARIO</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div id="form" class="modal-body text-start">
                     <form id="form_edit" action="cadastro.php" method="post">
                        <label class="form-label">E-MAIL</label>
                        <input class="form-control" id="email" type="email" name="email" required autofocus placeholder="Digite o seu e-mail">
                        <br>
                        <label class="form-label">NOME</label>
                        <input class="form-control" type="text" id="nome" name="nome" required  placeholder="Digite o seu nome">
                        <br>
                        <label class="form-label">GÊNERO</label>
                        <select class="form-select" id="floatingSelect" aria-label="Selecione um gênero" name="genero" required>
                            <option value="Masculino">Masculino</option>
                            <option value="Feminino">Feminino</option>
                            <option value="Outro">Outro</option>
                        </select>
                        <br>
                        <label class="form-label">SENHA</label>
                        <input class="form-control" id="senha" type="password" name="senha" required  placeholder="**********">
                        <br>
                        <input type="submit" class="btn btn-success" value="SALVAR">
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">CANCELAR</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal EXCLUIR-->
    <div class="modal fade" id="excluirModal" tabindex="-1" aria-labelledby="excluirModallLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title fs-5" id="excluirModallLabel">TEM CERTEZA QUE DESEJA EXCLUIR O USUÁRIO?</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-start">
                    <p>Tem certeza que deseja excluir o usuário <strong id="excluir_email"></strong>? Essa ação não poderá ser revertida.</p>
                </div>
                <div class="modal-footer">
                    <a id="btn-excluir"><button type="button" class="btn btn-danger">EXCLUIR</button></a>
                    <button type="button" class="btn btn-purple" data-bs-dismiss="modal">CANCELAR</button>
                </div>
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
    
    function setBtnExcluir(id, user) {
        btnExcluir.href = "excluir.php?pos="+id;
        exemail.innerHTML = user;
    }

    function atualizarformulario(id, vemail, vnome, vgenero, vsenha) {
        email.value = vemail;
        nome.value = vnome;
        genero.value = vgenero;
        form.action = url+id;
        senha.value = vsenha;
    }

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