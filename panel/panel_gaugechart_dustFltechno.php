<?php
$sql = "SELECT dustrec_amount_dust FROM dustrec WHERE dustrec_position_id = '23' ORDER BY dustrec_id desc LIMIT 1"; //dustrec_position_id 23 ห้องกราฟิกและสื่อสิ่งพิมพ์ดิจิทัล
$query = mysqli_query($connection, $sql);
//$row = mysqli_num_rows($query);
$row_result = mysqli_fetch_array($query, MYSQLI_ASSOC);
$pm = $row_result['dustrec_amount_dust'];
//คำนวน AQI
$aqiVal = number_format((float)(aqiCal($pm)), 2, '.', '');
if ($aqiVal <= 50) {
  $aqiClass = 'aqi_god';
  $aqiDcrt = 'อากาศดี';
} else if ($aqiVal <= 100) {
  $aqiClass = 'aqi_mod';
  $aqiDcrt = 'อากาศปานกลาง';
} else if ($aqiVal <= 150) {
  $aqiClass = 'aqi_unh';
  $aqiDcrt = 'อากาศไม่ดีต่อกลุ่มเสี่ยง';
} else if ($aqiVal <= 200) {
  $aqiClass = 'aqi_mun';
  $aqiDcrt = 'อากาศไม่ดี';
} else if ($aqiVal <= 300) {
  $aqiClass = 'aqi_vuh';
  $aqiDcrt = 'อากาศไม่ดีอย่างยิ่ง';
} else {
  $aqiClass = 'aqi_haz';
  $aqiDcrt = 'อากาศอันตราย';
}
//คำนวน AQI
?>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/highcharts-more.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>

<figure class="highcharts-figure">
  <div id="containerFltechno"></div>
  <p class="highcharts-description text-center">
    ตำแหน่ง ห้องกราฟิกและสื่อสิ่งพิมพ์ดิจิทัล<br>[34:9X:XX:XX:XB:C2]
    <br>
  <div class="<?= $aqiClass ?>">AQI <?= $aqiVal ?> <?= $aqiDcrt ?></div>
  </p>
</figure>

<style>
  #containerFltechno {
    /* height: 400px; */
  }

  .aqi_down {
    padding: 10px;
    text-align: center;
    color: black;
    background-color: #ccc;
    border-radius: 25px;
    font-size: 18px;
    margin: 15px 35px 15px 35px;
  }

  .aqi_god {
    padding: 10px;
    text-align: center;
    color: white;
    background-color: #ABD162;
    border-radius: 25px;
    font-size: 18px;
    margin: 15px 35px 15px 35px;
  }

  .aqi_mod {
    padding: 10px;
    text-align: center;
    color: white;
    background-color: #F7D460;
    border-radius: 25px;
    font-size: 18px;
    margin: 15px 35px 15px 35px;
  }

  .aqi_unh {
    padding: 10px;
    text-align: center;
    color: white;
    background-color: #FA9B4B;
    border-radius: 25px;
    font-size: 18px;
    margin: 15px 35px 15px 35px;
  }

  .aqi_mun {
    padding: 10px;
    text-align: center;
    color: white;
    background-color: #F6666E;
    border-radius: 25px;
    font-size: 18px;
    margin: 15px 35px 15px 35px;
  }

  .aqi_vuh {
    padding: 10px;
    text-align: center;
    color: white;
    background-color: #A27DB6;
    border-radius: 25px;
    font-size: 18px;
    margin: 15px 35px 15px 35px;
  }

  .aqi_haz {
    padding: 10px;
    text-align: center;
    color: white;
    background-color: #A07684;
    border-radius: 25px;
    font-size: 18px;
    margin: 15px 35px 15px 35px;
  }

  .highcharts-description {
    font-size: 12px;
  }

  .highcharts-figure,
  .highcharts-data-table table {
    min-width: 100px;
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
</style>

<!-- <script>
  Highcharts.chart('containerFltechno', {

      chart: {
        type: 'gauge',
        plotBackgroundColor: null,
        plotBackgroundImage: null,
        plotBorderWidth: 0,
        plotShadow: false
      },

      title: {
        text: 'อาคารฝ่ายเทคโนโลยีและนวัตกรรมฯ ชั้น 1<br><span class="pmval">[<?= $pm ?> µg/m³]</span>'
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
            linearGradient: {
              x1: 0,
              y1: 0,
              x2: 0,
              y2: 1
            },
            stops: [
              [0, '#FFF'],
              [1, '#333']
            ]
          },
          borderWidth: 0,
          outerRadius: '109%'
        }, {
          backgroundColor: {
            linearGradient: {
              x1: 0,
              y1: 0,
              x2: 0,
              y2: 1
            },
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
        }, {
          from: 11,
          to: 20,
          color: '#00B050' // ดี
        }, {
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
        //data: [186],
        data: [<?= $pm ?>],
        tooltip: {
          valueSuffix: ' µg/m³'
        }
      }]

    },
    // Add some life
    function(chart) {
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
</script> -->
<script>
  Highcharts.chart('containerFltechno', {

    chart: {
      type: 'gauge',
      plotBackgroundColor: null,
      plotBackgroundImage: null,
      plotBorderWidth: 0,
      plotShadow: false,
      height: '80%'
    },

    title: {
      text: 'อาคารฝ่ายเทคโนโลยีและนวัตกรรมฯ ชั้น 1<!--<br><span class="pmval">[<?= $pm ?> µg/m³]</span>-->'
    },

    credits: {
      enabled: false,
    },

    exporting: {
      enabled: false,
    },

    pane: {
      startAngle: -90,
      endAngle: 90,
      background: null,
      center: ['50%', '75%'],
      size: '80%'
    },

    // the value axis
    yAxis: {
      min: 0,
      max: 100,
      tickPixelInterval: 72,
      tickPosition: 'inside',
      tickColor: Highcharts.defaultOptions.chart.backgroundColor || '#FFFFFF',
      tickLength: 20,
      tickWidth: 2,
      minorTickInterval: null,
      labels: {
        distance: 20,
        style: {
          fontSize: '14px'
        }
      },
      lineWidth: 0,
      plotBands: [{
        from: 0,
        to: 10,
        color: '#00B0F0' // ดีมาก
      }, {
        from: 11,
        to: 20,
        color: '#00B050' // ดี
      }, {
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
      //data: [186],
      data: [<?= $pm ?>],
      tooltip: {
        valueSuffix: ' µg/m³'
      },
      dataLabels: {
        format: 'PM {y} µg/m³',
        borderWidth: 0,
        color: (
          Highcharts.defaultOptions.title &&
          Highcharts.defaultOptions.title.style &&
          Highcharts.defaultOptions.title.style.color
        ) || '#333333',
        style: {
          fontSize: '16px'
        }
      },
      dial: {
        radius: '80%',
        backgroundColor: 'gray',
        baseWidth: 12,
        baseLength: '0%',
        rearLength: '0%'
      },
      pivot: {
        backgroundColor: 'gray',
        radius: 6
      }

    }]

  });
</script>