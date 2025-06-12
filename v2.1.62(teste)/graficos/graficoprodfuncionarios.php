<script type="text/javascript">
    function _init() {
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ["Funcionário", "Produto Final", "Defeito", "Refugo"],
          <?php

          foreach ($_SESSION["nomes"] as $key => $value) {
            echo '["'.$value.'", '.$_SESSION['produto_final_funcionario'][$key].', '.$_SESSION['descarte_funcionario'][$key].', '.$_SESSION['refugo_funcionario'][$key].'],';
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