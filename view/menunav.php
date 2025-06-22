<div id="menu-lateral" class=" navmenu w-100">
    <nav class="navbar navbar-expand-xl">
        <div class="navbar-collapse w-auto offcanvas offcanvas-start collapse" aria-labelledby="uwulabel" tabindex="-1" id="uwu">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="uwulabel">MENU</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="uwu" aria-label="Close">x</button>
            </div>
            <style>
                span:hover {
                    cursor: pointer;
                }
            </style>
            <div class="offcanvas-body w-100">
                <ul class="navbar-nav flex-xl-column mt-0 w-100">
                    <li class="nav-item bg-primary">
                        <span class="nav-link active" style="color: white; cursor:default;"><?php echo $_SESSION['usuario']; ?></></span>
                    </li>
                    <li id="dashboard" class="nav-item">
                        <span class="nav-link" aria-current="page" >DASHBOARD</span>
                    </li>
                    <li id="listagem" class="nav-item">
                        <span class="nav-link" aria-current="page">LISTA</span>
                    </li>
                    <li id="funcionarios" class="nav-item">
                        <span class="nav-link" aria-current="page">FUNCIONÁRIOS</span>
                    </li>
                    <li id="dados" class="nav-item">
                        <span class="nav-link" aria-current="page">DADOS</span>
                    </li>
                    <li id="teste" class="nav-item d-none">
                        <span class="nav-link" aria-current="page">TESTE</span>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link bg-danger" aria-current="page" href="controle/sair.php">SAIR</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</div>