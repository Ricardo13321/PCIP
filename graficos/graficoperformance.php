<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load("current", {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Semana', 'Produção', 'Refugo-Cola', 'Refugo-Couro', 'Perda'],
          ['Semana 1',  650,       100,            100,            150],
          ['Semana 2',  1300,       200,            200,            300],
          ['Semana 3',  1950,        300,           300,            450],
          ['Semana 4',  null,       null,            null,            null],
        ]);

        var options = {
          height: 300,
          hAxis: {title: 'Semanas',  titleTextStyle: {color: '#333'}},
          legend: {position: 'top', maxLines: 4},
          vAxis: {
            minValue: 0,
            title: 'Quantidade',
            titleTextStyle: {color: '#333'}
          },
          interpolateNulls: false,
        };

        var view = new google.visualization.DataView(data);
        view.setColumns([0,1,
            {
              calc: "stringify",
              sourceColumn: 2,
              type: "string",
              role: "annotation" 
            }
        ]);

        var chart = new google.visualization.AreaChart(document.getElementById('chart_div'));
        chart.draw(data, options);
      }
    </script>
  </head>
  <body style="overflow: hidden;">
    <div id="chart_div"  style="width: 100%; height: 500px;"></div>
  </body>
</html>
