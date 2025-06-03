<?php

$nomes = array ("Juan", "Juan", "Juan", "Juan", "Calos", "Silvano", "Jason", "Victor");
$produto_final = array ( 100, 90, 110, 130, 140, 80, 50, 97);
$refugo = array (20, 20, 20, 20, 20, 20, 20, 20);
$descarte = array (15, 15, 15, 15, 15, 15, 15, 15);

?>
<script type="text/javascript">
    function _init() {
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ["Funcionário", "Produto Final", "Refugo", "Defeito"],
          <?php
          for ($i = 0; $i < count($nomes); $i++) {
            echo '["'.$nomes[$i].'", '.$produto_final[$i].', '.$refugo[$i].', '.$descarte[$i].'],';
          }
          ?>
        ]);

        var view = new google.visualization.DataView(data);
        view.setColumns([0, 1, 
                          { calc: "stringify",
                          sourceColumn: 2,
                          type: "string",
                          role: "annotation" },
                          2,
                        { calc: "stringify",
                          sourceColumn: 2,
                          type: "string",
                          role: "annotation" },
                        3,
                        { calc: "stringify",
                          sourceColumn: 3,
                          type: "string",
                          role: "annotation" },
                      ]);
        var options = {
          bar: {groupWidth: "95%"},
          legend: { position: "top" },
        };
        var chart = new google.visualization.BarChart(document.getElementById("barchart_values"));
        chart.draw(view, options);
    }
  }
  
  _init();
  </script>
<div id="barchart_values" style="width: 100%; height: 300px;"></div>