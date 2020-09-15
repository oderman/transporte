<?php
$male = "45, 55, 41, 67, 22, 43, 21, 33, 49, 15, 26, 55";
$female = "13, 23, 20, 8, 13, 27, 36, 22, 54, 28, 31, 26";
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
  series: [{
    name: 'Male',
    data: [<?=$male;?>]
  },{
    name: 'Female',
    data: [<?=$female;?>]
  }],
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
        return  "Visitors " + val + "k"
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