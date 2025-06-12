<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
          ['Produto Final',    <?php echo $_SESSION['porcentagem_produto_final'] ?> ],
          ['Perda',      <?php echo $_SESSION['porcentagem_perda'] ?>],
          ['Refugo',  <?php echo $_SESSION['taxa_refugo'] ?>]
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
