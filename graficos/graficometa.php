<?php
date_default_timezone_set('America/Sao_Paulo');
$count_sem = [0, 0, 0, 0, 0, 0];
$semana = ["Mon", "Tue", "Wed", "Thu", "Fri", "Sat"];

for ($x=0; $x < 6; $x++) { 
  foreach ($_SESSION["quantidade"] as $key => $value) {
    if ($_SESSION['estado'][$key] == "Produto final") {
      $count_sem[$x] += $_SESSION["quantidade"][$key];
    }
  }
}


?>

<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load("current", {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Dia', 'Meta',       'Produção'],
          ['Segunda',  1000,    <?php echo $count_sem[0] ?>],
          ['Terça',  1000,      <?php echo $count_sem[1] ?>],
          ['Quarta',  1000,     <?php echo $count_sem[2] ?>],
          ['Quinta',  1000,     <?php echo $count_sem[3] ?>],
          ['Sexta',  1000,      <?php echo $count_sem[4] ?>],
          ['Sábado',  1000,     <?php echo $count_sem[5] ?>]
        ]);

        var options = {
          legend: {position: 'top'},
          hAxis: {title: 'Dia',  titleTextStyle: {color: '#333'}},
          vAxis: {minValue: 0,
            title: 'Quantidade', titleTextStyle: {color: '#333'}
          }
        };
        var chart = new google.visualization.AreaChart(document.getElementById('chart_divb'));
        chart.draw(data, options);
      }
    </script>
  </head>
  <body>
    <div id="chart_divb"></div>
  </body>
</html>
