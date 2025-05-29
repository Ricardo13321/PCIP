<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--ajuda o navegador a entender que a linguagem do site é pt-br-->
    <meta http-equiv="content-language" content="pt-br">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
    <link type="text/css"  rel="stylesheet" href="estilo.css">
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
<body class="p-0 m-0 border-0 bd-example m-0 border-0 bd-example-cssgrid">
    <div class="menutopo d-flex align-items-center shadow-lg h-15" style="background:rgb(150, 64, 29)">
        <h2 class="m-auto" ><b>MENU INICIAL PCIP</b></h2>
    </div>
    <div class="d-flex  h-85">
        <div class="d-flex shadow-lg navmenu">
            <?php include "menunav.html" ?>
        </div>
        <div class="w-100" style="border: 1px solid black;">      
    <div class="container text-center">
  <div class="row">
    <div class="col" style="height: 240;">
        <div class="p-1">
      <?php include "grafico1.php"?>
        </div>
    </div>
    <div class="col" style="height: 240;">
        <div class="p-1">
      <?php include "grafico2.php"?>
        </div>
    </div>
    <div class="col" style="height: 240;">
        <div class="p-1">
       <?php include "grafico3.php"?>
        </div>
    </div>
    <div class="col">
        <div class="p-1">
       <?php include "grafico4.php"?>
         </div>
    </div>
  </div>
  <div class="row">
    <div class="col">
     <div class="p-1">
      <?php include "grafico5.php"?>
        </div>
    </div>
    <div class="col">
      <div class="p-1">
      graf6
        </div>
    </div>
</div>
    <div class="row">
        <div class="col">
     <div class="p-1">
      graf7
        </div>
    </div>
    <div class="col">
     <div class="p-1">
      graf8
        </div>
    </div>
  </div>
</div>  
</body>
</html>