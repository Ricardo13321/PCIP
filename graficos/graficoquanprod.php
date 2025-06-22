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
    if ($_SESSION['datas_aceitas'][$key] == $count_dia[$contador]) {
        $count_prod[$contador] += $value;
    } else {
        $contador++;
        array_push($count_dia, $_SESSION['date'][$key]);
        array_push($count_prod, $value);
    }

}

?>

<html>

<head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
    google.charts.load('current', {
        packages: ['corechart', 'bar']
    });
    google.charts.setOnLoadCallback(drawBasic);

    function drawBasic() {

        var data = google.visualization.arrayToDataTable([
            ['Data', 'Total Produzido']
            <?php
            foreach ($count_prod as $key => $value) {
                echo",['".$count_dia[$key]."', ".$value."]";
            }
            ?>
        ]);

        var options = {
            title: 'Produção Diária',
            chartArea: {
                width: '50%'
            },
            vAxis: {
                title: 'Data'
            }
        };

        var chart = new google.visualization.BarChart(document.getElementById('chart_div'));

        chart.draw(data, options);
    }
    </script>
</head>

<body style="overflow: hidden;">
    <div id="chart_div" style="width: 100%; height: 500px;"></div>
</body>
</html>