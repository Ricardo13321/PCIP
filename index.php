<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
</head>
<style>
    body {
        background: whitesmoke;
        height: 100vh;
    }
</style>
<body class="d-flex justify-content-center align-items-center">
    <div class="col-2">
        <form method="POST" action="inicial.php">
            <label class="form-label">Usuário</label>
            <input class="form-control mb-3" type="email" autofocus required placeholder="Escreva o seu usuário">
            <label class="form-label">Senha</label>
            <input class="form-control mb-3" type="password" required placeholder="Escreva a sua senha">
            <input class="float-end" type="submit" value="Entrar">
        </form>
    </div>
</body>
</html>