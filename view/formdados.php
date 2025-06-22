<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
</head>
<body>
    <form method="get" action="../controle/cadastrarentrega.php">
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
        <input type="hidden" id="input_url2" name="url2" value="../view/dashboard.php">
        <div class="float-end">
            <input class="btn btn-success" type="submit" value="Salvar">
        </div>
    </form>
</body>
</html>