    <!-- Modal CADASTRAR-->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title fs-5" id="exampleModalLabel">CADASTRAR ENTREGA</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div id="form" class="modal-body text-start">
                    <form method="get" action="controle/cadastrarentrega.php">
                        <div class="mb-3">
                            <label class="form-label">Produto Final</label>
                            <input class="form-control" type="number" placeholder="0" required autofocus min="0" name="Produto_final">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Defeito Couro</label>
                            <input class="form-control" type="number" placeholder="0" required autofocus min="0" name="Defeito_couro">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Defeito Cola</label>
                            <input class="form-control" type="number" placeholder="0" required autofocus min="0" name="Defeito_cola">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Perda</label>
                            <input class="form-control" type="number" placeholder="0" required autofocus min="0" name="Perda">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Código</label>
                            <select class="form-select" id="floatingSelect" aria-label="codigo" name="codigo" required>
                                <option selected disabled>Selecione</option>
                                <option value="31351">31351</option>
                            </select>
                        </div>
                        <div class="float-end">
                            <input class="btn btn-success" type="submit" value="Salvar">
                            <input class="btn btn-danger" type="button" data-bs-dismiss="modal" value="Cancelar">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>