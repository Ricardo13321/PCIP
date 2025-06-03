<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load("current", {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Dia', 'Meta', 'Produção'],
          ['Segunda',  1000,      167],
          ['Terça',  1000,      334],
          ['Quarta',  1000,       501],
          ['Quinta',  1000,      668],
          ['Sexta',  1000,      835],
          ['Sábado',  1000,      null]
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
