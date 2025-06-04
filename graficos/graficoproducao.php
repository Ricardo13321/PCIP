<?php
$porcentagem_produto_final = ($_SESSION["produto_final"]/$_SESSION["producao_total"])*100;
$porcentagem_perda = ($_SESSION["perda"]/$_SESSION["producao_total"])*100;
$porcentagem_defeito = (($_SESSION["retrabalho_couro"]+$_SESSION["retrabalho_cola"])/$_SESSION["producao_total"])*100;
?>

<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
          ['Produto Final',    <?php echo $porcentagem_produto_final; ?>],
          ['Perda',      <?php echo $porcentagem_perda ?>],
          ['Refugo',  <?php echo $porcentagem_defeito ?>]
        ]);

        var options = {
          legend: {position: 'top', maxLines: '3'}
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>
  </head>
  <body>
    <div id="piechart"></div>
  </body>
</html>
