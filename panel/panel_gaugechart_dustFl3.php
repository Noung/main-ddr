<?php
$sql = "SELECT dustrec_amount_dust FROM dustrec WHERE dustrec_position_id = '13' ORDER BY dustrec_id desc LIMIT 1"; //dustrec_position_id 13 IT-Zone
$query = mysqli_query($connection, $sql);
//$row = mysqli_num_rows($query);
$row_result = mysqli_fetch_array($query, MYSQLI_ASSOC);
$pm = $row_result['dustrec_amount_dust'];
?>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/highcharts-more.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>

<figure class="highcharts-figure">
  <div id="containerFl3"></div>
  <p class="highcharts-description text-center">
    ตำแหน่ง IT-Zone
  </p>
</figure>

<style>
#containerFl3 {
  height: 400px;
}

.highcharts-figure,
.highcharts-data-table table {
  min-width: 310px;
  max-width: 500px;
  margin: 1em auto;
}

.highcharts-data-table table {
  font-family: Verdana, sans-serif;
  border-collapse: collapse;
  border: 1px solid #ebebeb;
  margin: 10px auto;
  text-align: center;
  width: 100%;
  max-width: 500px;
}

.highcharts-data-table caption {
  padding: 1em 0;
  font-size: 1.2em;
  color: #555;
}

.highcharts-data-table th {
  font-weight: 600;
  padding: 0.5em;
}

.highcharts-data-table td,
.highcharts-data-table th,
.highcharts-data-table caption {
  padding: 0.5em;
}

.highcharts-data-table thead tr,
.highcharts-data-table tr:nth-child(even) {
  background: #f8f8f8;
}

.highcharts-data-table tr:hover {
  background: #f1f7ff;
}

.pmval{
    font-size: 14px;
    border: 1px solid red;
    padding: 10px;
}
</style>

<script>
Highcharts.chart('containerFl3', {

  chart: {
    type: 'gauge',
    plotBackgroundColor: null,
    plotBackgroundImage: null,
    plotBorderWidth: 0,
    plotShadow: false
  },

  title: {
    text: 'อาคารสำนักวิทยบริการ ชั้น 3<br><span class="pmval">[<?=$pm?> µg/m³]</span>'
  },
    
  credits: {
     enabled: false,
  },
  
  exporting: {
    enabled: false,
  },


  pane: {
    startAngle: -150,
    endAngle: 150,
    background: [{
      backgroundColor: {
        linearGradient: { x1: 0, y1: 0, x2: 0, y2: 1 },
        stops: [
          [0, '#FFF'],
          [1, '#333']
        ]
      },
      borderWidth: 0,
      outerRadius: '109%'
    }, {
      backgroundColor: {
        linearGradient: { x1: 0, y1: 0, x2: 0, y2: 1 },
        stops: [
          [0, '#333'],
          [1, '#FFF']
        ]
      },
      borderWidth: 1,
      outerRadius: '107%'
    }, {
      // default background
    }, {
      backgroundColor: '#DDD',
      borderWidth: 0,
      outerRadius: '105%',
      innerRadius: '103%'
    }]
  },

  // the value axis
  yAxis: {
    min: 0,
    max: 100,

    minorTickInterval: 'auto',
    minorTickWidth: 1,
    minorTickLength: 10,
    minorTickPosition: 'inside',
    minorTickColor: '#666',

    tickPixelInterval: 30,
    tickWidth: 2,
    tickPosition: 'inside',
    tickLength: 10,
    tickColor: '#666',
    labels: {
      step: 2,
      rotation: 'auto'
    },
    title: {
      text: 'µg/m³'
    },
    plotBands: [{
      from: 0,
      to: 10,
      color: '#00B0F0' // ดีมาก
    },{
      from: 11,
      to: 20,
      color: '#00B050' // ดี
    },{
      from: 21,
      to: 30,
      color: '#FFFF00' // ปานกลาง
    }, {
      from: 31,
      to: 40,
      color: '#FFC000' // เริ่มมีผลต่อสุขภาพ
    }, {
      from: 41,
      to: 100,
      color: '#DF5353' // มีผลต่อสุขภาพมาก
    }]
  },

  series: [{
    name: 'PM2.5',
    data: [<?=$pm?>],
    tooltip: {
      valueSuffix: ' µg/m³'
    }
  }]

},
// Add some life
function (chart) {
  /*if (!chart.renderer.forExport) {
    setInterval(function () {
      var point = chart.series[0].points[0],
        newVal,
        inc = Math.round((Math.random() - 0.5) * 20);

      newVal = point.y + inc;
      if (newVal < 0 || newVal > 200) {
        newVal = point.y - inc;
      }

      point.update(newVal);

    }, 3000);
  }*/
});
</script>