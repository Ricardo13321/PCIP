<?php
session_start();
if(!isset($_SESSION['datas_aceitas'][0])) {
    header("Location: ../nodata.html");
    exit();
}

$count_dia = [];
$count_prod = [0];
array_push($count_dia,$_SESSION['datas_aceitas'][0]);
$contador = 0;
foreach ($_SESSION["quantidade_filtro"] as $key => $value) {
    if ($_SESSION['estado_filtro'][$key] == "Produto final" || $_SESSION['estado_filtro'] == "Defeito couro" || $_SESSION["estado_filtro"] == "Defeito cola") {
        if ($_SESSION['datas_aceitas'][$key] == $count_dia[$contador]) {
            $count_prod[$contador] += $value;
        } else {
            $contador++;
            array_push($count_dia, $_SESSION['datas_aceitas'][$key]);
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
        <div id="curve_chart" style="width: 100%; height: 400px"></div>
    </body>
</html>