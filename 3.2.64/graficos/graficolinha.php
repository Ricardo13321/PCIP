<?php
session_start();
$count_dia = [];
$count_prod = [0];
array_push($count_dia,$_SESSION['date'][0]);
$contador = 0;
foreach ($_SESSION["quantidade"] as $key => $value) {
    if ($_SESSION['estado'][$key] == "Produto final" || $_SESSION['estado'] == "Defeito couro" || $_SESSION["estado"] == "Defeito cola") {
        if ($_SESSION['date'][$key] == $count_dia[$contador]) {
            $count_prod[$contador] += $value;
        } else {
            $contador++;
            array_push($count_dia, $_SESSION['date'][$key]);
            array_push($count_prod, $value);
        }
    }
}

?>
<html>
    <head>
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <script type="text/javascript">
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ['Dia',    'Taxa de prdução']
                <?php
                    foreach ($count_prod as $key => $value) {
                        echo",['".$count_dia[$key]."', ".$value."]";
                    }
                ?>
                
            ]);

            var options = {
                title: 'Taxa de produção',
                curveType: 'function',
                legend: { position: 'bottom' }
            };

        var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

        chart.draw(data, options);
    }
    </script>
    </head>
    <body style="overflow: hidden;">
        <div id="curve_chart" style="width: 100%; height: 500px"></div>
    </body>
</html>