<?php

$consulta = $pdo->prepare("
SELECT
(SELECT COUNT(via_id) FROM viajes WHERE MONTH(via_inicio)=1),
(SELECT COUNT(via_id) FROM viajes WHERE MONTH(via_inicio)=2),
(SELECT COUNT(via_id) FROM viajes WHERE MONTH(via_inicio)=3),
(SELECT COUNT(via_id) FROM viajes WHERE MONTH(via_inicio)=4),
(SELECT COUNT(via_id) FROM viajes WHERE MONTH(via_inicio)=5),
(SELECT COUNT(via_id) FROM viajes WHERE MONTH(via_inicio)=6),
(SELECT COUNT(via_id) FROM viajes WHERE MONTH(via_inicio)=7),
(SELECT COUNT(via_id) FROM viajes WHERE MONTH(via_inicio)=8),
(SELECT COUNT(via_id) FROM viajes WHERE MONTH(via_inicio)=9),
(SELECT COUNT(via_id) FROM viajes WHERE MONTH(via_inicio)=10),
(SELECT COUNT(via_id) FROM viajes WHERE MONTH(via_inicio)=11),
(SELECT COUNT(via_id) FROM viajes WHERE MONTH(via_inicio)=12)
");
$consulta->execute();
$datos = $consulta->fetch();

$viajes = "$datos[0], $datos[1], $datos[2], $datos[3], $datos[4], $datos[5], $datos[6], $datos[7], $datos[8], $datos[9], $datos[10], $datos[11]";
?>

<script type="application/javascript">
var options = {
  chart: {
    height: 280,
    type: 'bar',
    stacked: true,
    toolbar: {
      show: false
    },
    zoom: {
      enabled: true
    }
  },
  plotOptions: {
    bar: {
      horizontal: false,
      columnWidth: '30%',
    },
  },
  dataLabels: {
    enabled: true
  },
  series: [
	  {
		name: 'Viajes',
		data: [<?=$viajes;?>]
	  }
  ],
  xaxis: {
    type: 'month',
    categories: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
  },
  legend: {
    offsetY: -7
  },
  fill: {
    opacity: 1
  },
  colors: ['#01902d', '#666666'],
  tooltip: {
    y: {
      formatter: function(val) {
        return  "Suscriptores " + val
      }
    }
  },
}
var chart = new ApexCharts(
  document.querySelector("#visitors"),
  options
);
chart.render();
</script>