<div class="border d-flex">
    <nav class="navbar justify-content-start">
        <input type="button" id="burguer" class="m-1 btn btn-secondary d-xl-none" value="MENU">
        <input type="button" id="max_min" class="m-1 btn btn-secondary d-none d-xl-flex" value="MAXIMIZAR">
        <input type="button" id="imprimir" class="m-1 btn btn-secondary" value="IMPRIMIR">
        <b><input class="m-1 btn btn-secondary" data-bs-toggle="modal" data-bs-target="#exampleModal" type="button" value="CADASTRAR"></b>
        <input class="m-1 btn btn-success" data-bs-toggle="modal" data-bs-target="#modal_salvar" type="button" value="SALVAR">
        <form method="get" action="controle/filtrardados.php" target="panel" class="d-flex">
            <div class="input-group m-1">
                <label name="data_inicial" class="input-group-text">Data Inicial</label>
                <input name="data_inicial" type="date" class="form-control " min="<?php echo $datesplit[2] . '-' . $datesplit[0] . '-' . $datesplit[1] ?>" max="<?php echo date("Y-m-d") ?>" value="<?php echo $_loc4_[0]."-".$_loc4_[1]."-".$_loc4_[2]; ?>">
            </div>
            <div class="input-group m-1">
                <label name="data_final" class="input-group-text">Data Final</label>
                <input name="data_final" type="date" class="form-control" min="<?php echo $datesplit[2] . '-' . $datesplit[0] . '-' . $datesplit[1] ?>" max="<?php echo date("Y-m-d") ?>" value="<?php echo $_loc2_[0]."-".$_loc2_[1]."-".$_loc2_[2]; ?>">
            </div>
            <input type="hidden" id="input_url" name="url" value="../view/dashboard.php">
            <input id="btn-atualizar" type="submit" value="ATUALIZAR" class="btn btn-primary m-1">
        </form>
    </nav>
</div>