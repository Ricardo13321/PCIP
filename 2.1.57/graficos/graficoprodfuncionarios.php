<?php
$produto_final = [];
$refugo = [];
$descarte = [];
foreach ($_SESSION["nomes"] as $key_1 => $value_1) {
  array_push($produto_final, 0);
  array_push($refugo, 0);
  array_push($descarte, 0);
  foreach ($_SESSION["nome_entrega"] as $key_2 => $value_2) {
    if ($value_1 == $value_2) {
      if($_SESSION["estado"][$key_2] == "Produto final") {
        $produto_final[$key_1] += $_SESSION["quantidade"][$key_2];
      }
      if ($_SESSION["estado"][$key_2] == "Defeito couro" || $_SESSION["estado"][$key_2] == "Defeito cola") {
        $refugo[$key_1] += $_SESSION["quantidade"][$key_2];
      }
      if ($_SESSION["estado"][$key_2] == "Perda") {
        $descarte[$key_1] += $_SESSION["quantidade"][$key_2];
      }
    }
  }
}

?>
<script type="text/javascript">
    function _init() {
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ["Funcionário", "Produto Final", "Refugo", "Defeito"],
          <?php

          foreach ($_SESSION["nomes"] as $key => $value) {
            echo '["'.$value.'", '.$produto_final[$key].', '.$refugo[$key].', '.$descarte[$key].'],';
          }
          ?>
        ]);

        var view = new google.visualization.DataView(data);
        view.setColumns([0, 1, 
                          { calc: "stringify",
                          sourceColumn: 1,
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
<div id="barchart_values" style="width: 100%; height: 600px;"></div>