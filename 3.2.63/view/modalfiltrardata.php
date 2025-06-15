<!-- Modal Filtrar Data-->
<div class="modal fade" id="atualizardata" tabindex="-1" aria-labelledby="atualizardata" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title fs-5" id="atualizardata">Mostrar a lista dos dias</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <divl class="modal-body">
                <form method="post" action="listagem.php" class="form">
                    <div>
                        <label>Data Inicial</label>
                        <div class="input-group my-2">
                            <label name="data-inicial" class="input-group-text">Inicial</label>
                            <input name="data-inicial" type="date" class="form-control" min="<?php echo $datesplit[2] . '-' . $datesplit[1] . '-' . $datesplit[0] ?>" max="<?php echo date("Y-m-d") ?>" value="<?php echo $datesplit[2] . '-' . $datesplit[1] . '-' . $datesplit[0] ?>">
                        </div>
                        <label>Data Final</label>
                        <div class="input-group my-2">
                            <span class="input-group-text">Final</span>
                            <input type="date" class="form-control" min="<?php echo $datesplit[2] . '-' . $datesplit[1] . '-' . $datesplit[0] ?>" max="<?php echo date("Y-m-d") ?>" value="<?php echo date("Y-m-d") ?>">
                        </div>
                    </div>
                    <div>
                        <input type="submit" class="btn btn-primary" value="ATUALIZAR">
                        <input type="button" class="btn btn-danger" data-bs-dismiss="modal" value="CANCELAR">
                    </div>
                </form>
            </divl>
        </div>
    </div>
</div>