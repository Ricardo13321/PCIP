
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--ajuda o navegador a entender que a linguagem do site é pt-br-->
    <meta http-equiv="content-language" content="pt-br">
    <title>PHP / Array</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>
<style>
    body {
        background-color:rgb(231, 231, 231);
        height: 100vh;
    }

    a {
        text-decoration: none;
        color: black;
    }

    a:hover {
        text-decoration: none;
        color: black;
    }

    li {
        list-style: none;
    }

    .navmenu {
        background: #f2f2f2;
    }

    .menutopo {
        height: 10vh;
    }

    .h-85 {
        height: 85%;
    }

    .h-15 {
        height: 15%;
    }

</style>
<body>
    <div class="menutopo d-flex align-items-center shadow-lg h-15" style="background:rgb(150, 64, 29)">
        <h2 class="m-auto" ><b>MENU INICIAL PCIP</b></h2>
    </div>
    <div class="d-flex  h-85">
        <div class="d-flex shadow-lg navmenu">
            <?php include "menunav.html" ?>
        </div>
        <div class="w-100" style="border: 1px solid black;">
            
        </div>
    </div>
</body>
</html>