<html>
  <head>
   <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
   <script type="text/javascript">
      google.charts.load('current', {'packages':['gauge']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Label', 'Value'],
          ['Retrabalho', 200],
        ]);

        var options = {
          max: 1000,
          width: 500, height: 130,
          greenFrom: 0, greenTo: 20,
          yellowFrom: 20, yellowTo: 100,
          redFrom: 100, redTo: 1000,
        };

        var chart = new google.visualization.Gauge(document.getElementById('medidor'));

        chart.draw(data, options);
      }
    </script>
  </head>
  <body style="overflow: hidden;">
    <div id="medidor" style="width: 400px; height: 120px;"></div>
  </body>
</html>
