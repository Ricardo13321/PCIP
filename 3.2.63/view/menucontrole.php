<div class="border d-flex">
    <nav class="navbar align-items-start">
        <button id="max_min" class="m-1 btn btn-secondary">MAXIMIZAR</button>
        <button id="imprimir" class="m-1 btn btn-secondary">IMPRIMIR</button>
        <b><input class="m-1 btn btn-secondary" data-bs-toggle="modal" data-bs-target="#exampleModal" type="button" value="CADASTRAR"></b>
        <a href="controle/salvar.php"><input class="m-1 btn btn-success" type="button" value="SALVAR"></a>
        <form method="get" action="controle/init.php" class="d-flex">
            <div class="input-group m-1">
                <label name="data-inicial" class="input-group-text">Data Inicial</label>
                <input name="data-inicial" type="date" class="form-control" min="<?php echo $datesplit[2] . '-' . $datesplit[1] . '-' . $datesplit[0] ?>" max="<?php echo date("Y-m-d") ?>" value="<?php echo $datesplit[2] . '-' . $datesplit[1] . '-' . $datesplit[0] ?>">
            </div>
            <div class="input-group m-1">
                <span class="input-group-text">Data Final</span>
                <input type="date" class="form-control" min="<?php echo $datesplit[2] . '-' . $datesplit[1] . '-' . $datesplit[0] ?>" max="<?php echo date("Y-m-d") ?>" value="<?php echo date("Y-m-d") ?>">
            </div>
            <input type="submit" value="ATUALIZAR" class="btn btn-primary m-1">
        </form>
    </nav>
</div>