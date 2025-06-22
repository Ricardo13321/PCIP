<!-- Modal Salvar-->
<div class="modal fade" id="modal_salvar" tabindex="-1" aria-labelledby="modal_salvar" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
               <h3 class="modal-title fs-5" id="atualizardata"> <strong>SALVAR</strong></h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <divl class="modal-body">
                <iframe name="iframe_salvar" style="display: none;" src="view/questionsalvar.html" style="width: 100%;"></iframe>
                <h5><strong>Tem certeza que deseja salvar as alterações? Está ação não poderá ser desfeita!</strong></h5>
            </divl>
            <div class="modal-footer">
                <a href="controle/salvar.php" data-bs-dismiss="modal" aria-label="Close" target="iframe_salvar"><input class="m-1 btn btn-success" type="button"  value="SALVAR"></a>
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal" aria-label="Close">Cancelar</button>
            </div> 
        </div>
    </div>
</div>