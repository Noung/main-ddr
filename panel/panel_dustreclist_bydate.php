<!-- Header -->
<?php
session_start();
error_reporting(0); // ปิด error report
?>
<!-- dataTable library-->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css">

<!--<script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.5.1.js"></script>-->

<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.js"></script>

<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.print.min.js"></script>
<!-- dataTable library-->
<style>
    .update-nag {
        display: inline-block;
        font-size: 12px;
        text-align: left;
        background: #7CB5EC;
        height: 100px;
        -webkit-box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .2);
        box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
        margin-bottom: 10px;
        width: -webkit-fill-available;
    }

    .update-temp {
        display: inline-block;
        font-size: 12px;
        text-align: left;
        background: #818183 !important;
        height: 100px;
        -webkit-box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .2);
        box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
        margin-bottom: 10px;
        width: -webkit-fill-available;
    }

    .update-mois {
        display: inline-block;
        font-size: 12px;
        text-align: left;
        background: #90ED7D !important;
        height: 100px;
        -webkit-box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .2);
        box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
        margin-bottom: 10px;
        width: -webkit-fill-available;
    }

    .update-co2 {
        display: inline-block;
        font-size: 12px;
        text-align: left;
        background: #F7A35C !important;
        height: 100px;
        -webkit-box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .2);
        box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
        margin-bottom: 10px;
        width: -webkit-fill-available;
    }

    .update-nag:hover,
    .update-temp:hover,
    .update-mois:hover,
    .update-co2:hover {
        cursor: pointer;
        -webkit-box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .4);
        box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .3);
    }

    .update-split {
        background: #ffffffbf;
        width: 50px;
        float: left;
        color: #fff !important;
        height: 100%;
        text-align: center;
        padding-top: 5px;
    }

    .update-text {
        color: white;
        line-height: 20px;
        padding-top: 5px;
        padding-left: 55px;
        padding-right: 20px;
    }

    .update-textdata {
        padding-top: 15px;
        padding-left: 55px;
        font-size: 32px !important;
    }
</style>
<!-- Header -->

<!-- /////////////////// ฝุ่น /////////////////// -->

<div class="row">
    <div class="col-md-12 table-responsive">

        <script type="text/javascript">
            //var $d = jQuery.noConflict();

            //$d(document).ready(function(){
            $(document).ready(function() {
                $('#dustdatatablebydate_forshow').DataTable({
                    dom: 'Bfrtip',
                    buttons: [
                        'copy', 'excel', 'print'
                    ],
                    order: [0, "asc"], //เรียงข้อมูลตาม
                    pageLength: 10
                    //recordsTotal: 50
                });
            });
        </script>

        <table class="table table-striped table-hover table-responsive" id="dustdatatablebydate" style="display:none;">
            <thead>
                <tr>
                    <!--<th><center>วันที่</center></th>-->
                    <th>
                        <center>เวลา</center>
                    </th>
                    <!--<th><center>ตำแหน่ง</center></th>-->
                    <th>
                        <center>ฝุ่น (µg/m³)</center>
                    </th>
                    <th>
                        <center>อุณหภูมิ (°C)</center>
                    </th>
                    <th>
                        <center>ความชื้น (%)</center>
                    </th>
                    <th>
                        <center>ก๊าชคาร์บอนไดออกไซค์ (PPM.)</center>
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php
                /*  $_SESSION["SEARCHQUERY_POSNAME"] = $_GET['posname'];
                        $_SESSION["SEARCHQUERY_DATE"] = $_GET['date'];
                        $_SESSION["SEARCHWORDCOMP_STDATE"] = $_POST['searchwordcomp_stdate'];
                        $_SESSION["SEARCHWORDCOMP_ENDATE"] = $_POST['searchwordcomp_endate'];
                    */
                //if((!$browsecourse) && (!$tagsearch)){//กรณีไม่มีการป้อนคำค้น
                if ($_SESSION["SEARCHWORDCOMP_STDATE"]) {
                    $sql = "SELECT * from dustrec as a, position as b 
                                    where 
                                    b.position_name = '" . $_SESSION["SEARCHQUERY_POSNAME"] . "' AND
                                    b.position_id = a.dustrec_position_id AND
                                    a.dustrec_date >= '" . $_SESSION["SEARCHWORDCOMP_STDATE"] . "' AND 
                                    a.dustrec_date <= '" . $_SESSION["SEARCHWORDCOMP_ENDATE"] . "'";
                    $subti = "วันที่ " . date("d/m/Y", strtotime($_SESSION["SEARCHWORDCOMP_STDATE"])) . " - " . date("d/m/Y", strtotime($_SESSION["SEARCHWORDCOMP_ENDATE"]));
                } else if (!$_SESSION["SEARCHWORDCOMP_STDATE"] && $_SESSION["SEARCHQUERY_DATE"]) {
                    $sql = "SELECT * from dustrec as a, position as b 
                                    where 
                                    b.position_name = '" . $_SESSION["SEARCHQUERY_POSNAME"] . "' AND
                                    b.position_id = a.dustrec_position_id AND
                                    a.dustrec_date = '" . $_SESSION["SEARCHQUERY_DATE"] . "'"; //กำหนดจำนวนการแสดงผลต่อ 1 หน้า
                    $subti = "วันที่ " . date("d/m/Y", strtotime($_SESSION["SEARCHQUERY_DATE"]));
                } else if (!$_SESSION["SEARCHWORDCOMP_STDATE"] && !$_SESSION["SEARCHQUERY_DATE"]) {
                    $sql = "SELECT * from dustrec as a, position as b 
                                    where 
                                    b.position_name = '" . $_SESSION["SEARCHQUERY_POSNAME"] . "' AND
                                    b.position_id = a.dustrec_position_id AND
                                    a.dustrec_date = '" . $_SESSION["FIXDATE"] . "'"; //กำหนดจำนวนการแสดงผลต่อ 1 หน้า
                    $subti = "วันที่ " . date("d/m/Y", strtotime($_SESSION["FIXDATE"]));
                }
                $query = mysqli_query($connection, $sql);
                $row = mysqli_num_rows($query);

                while ($row_result = mysqli_fetch_array($query, MYSQLI_ASSOC)) {

                ?>
                    <!--<td width="">
                            <a href="/reportbydate.php?posname=<?= $row_result['position_name'] ?>&date=<?= $row_result['dustrec_date'] ?>" target="_blank"><?php echo date('d/m/Y', strtotime($row_result['dustrec_date'])) ?></a>
                        </td>-->
                    <!--<td width="">
                            <?php echo date('d/m/Y', strtotime($row_result['dustrec_date'])) ?>
                        </td>-->
                    <td width="">
                        <center><?php echo date("d/m/Y", strtotime($row_result['dustrec_date'])) . " " . $row_result['dustrec_time'] ?> น.</center>
                    </td>
                    <!--<td width="">
                            <center><?php echo $row_result['position_name'] ?>
                        </td>-->
                    <td width="">
                        <?php echo $row_result['dustrec_amount_dust'] ?>
                    </td>
                    <td width="">
                        <?php echo $row_result['dustrec_temp'] ?>
                    </td>
                    <td width="">
                        <?php echo $row_result['dustrec_moistness'] ?>
                    </td>
                    <td width="">
                        <?php echo $row_result['dustrec_amount_co2'] ?>
                    </td>
                    </tr>
                    <!-- 1 block data -->

                <?php

                }

                ?>

            </tbody>
        </table>

        <table id="dustdatatablebydate2" style="display:none;">
            <thead>
                <tr>
                    <th>เวลา</th>
                    <th>Boys</th>
                    <th>Girls</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th>00:03:28 น.</th>
                    <td><? echo 111; ?></td>
                    <td>28</td>
                </tr>
                <tr>
                    <th>00:08:19 น.</th>
                    <td>29</td>
                    <td>27</td>
                </tr>
                <tr>
                    <th>00:13:11 น.</th>
                    <td>28</td>
                    <td>26</td>
                </tr>
                <tr>
                    <th>00:18:02 น.</th>
                    <td>28</td>
                    <td>26</td>
                </tr>
                <tr>
                    <th>00:22:54 น.</th>
                    <td>27</td>
                    <td>25</td>
                </tr>
                <tr>
                    <th>00:27:45 น.</th>
                    <td>28</td>
                    <td>27</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<!--<script src="http://code.jquery.com/jquery-1.12.0.min.js"></script>-->
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/data.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script>
    $(function() {
        $('#container').highcharts({
            data: {
                table: 'dustdatatablebydate'
            },
            chart: {
                type: 'area'
            },
            title: {
                text: 'กราฟแสดงสถานะสภาพอากาศ ตำแหน่ง <?= $_SESSION["SEARCHQUERY_POSNAME"] ?>'
            },
            subtitle: {
                text: '<?= $subti ?>',
                x: 0
            },
            plotOptions: {
                series: {
                    animation: {
                        duration: 3000,
                        easing: 'easeOutBounce'
                    }
                }
            },
            /*yAxis: {
                allowDecimals: false,
                title: {
                    text: 'ข้อมูล'
                }
            },*/
            yAxis: {
                allowDecimals: false,
                title: {
                    text: 'ข้อมูล'
                },
                plotLines: [{
                        value: 37.5,
                        color: 'red', //#7CB5EC
                        dashStyle: 'shortdash',
                        width: 2,
                        label: {
                            text: 'มาตรฐาน PM = 37.5 µg/m³'
                        }
                    }
                    /*,
                                        {
                                            value: 1000,
                                            color: 'red', //#F7A35C
                                            dashStyle: 'shortdash',
                                            width: 2,
                                            label: {
                                                text: 'มาตรฐาน CO2 = 1000 PPM.'
                                            }
                                        }*/
                ]
            },
            tooltip: {
                /*formatter: function () {
                   return '<b>' + this.series.name + '</b><br/>' +
                      this.point.y + ' ' + this.point.name.toLowerCase();
                }*/
                valueSuffix: ''
            },
            credits: {
                enabled: false
            },
            exporting: {
                enabled: true
            }
        });
    });
</script>

<!-- display graph -->
<div class="row" id="container">

</div>
<!-- display graph -->

<div class="row">
    <div class="col-md-6">
        <!-- dustdatatablebydate_forshow forshow -->
        <h4>ตารางข้อมูลสภาพอากาศ</h4>
        <hr>
        <table class="table table-striped table-hover table-responsive" id="dustdatatablebydate_forshow">
            <thead>
                <tr>
                    <th>
                        <center>วันที่</center>
                    </th>
                    <th>
                        <center>เวลา</center>
                    </th>
                    <!--<th><center>ตำแหน่ง</center></th>-->
                    <th>
                        <center>ฝุ่น</center>
                    </th>
                    <th>
                        <center>อุณหภูมิ</center>
                    </th>
                    <th>
                        <center>ความชื้น</center>
                    </th>
                    <th>
                        <center>ก๊าชคาร์บอนไดออกไซค์</center>
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php
                /* $_SESSION["SEARCHQUERY_POSNAME"] = $_GET['posname'];
                                $_SESSION["SEARCHQUERY_DATE"] = $_GET['date'];
                            */
                //if((!$browsecourse) && (!$tagsearch)){//กรณีไม่มีการป้อนคำค้น

                if ($_SESSION["SEARCHWORDCOMP_STDATE"]) {
                    $sql = "SELECT * from dustrec as a, position as b 
                                            where 
                                            b.position_name = '" . $_SESSION["SEARCHQUERY_POSNAME"] . "' AND
                                            b.position_id = a.dustrec_position_id AND
                                            a.dustrec_date >= '" . $_SESSION["SEARCHWORDCOMP_STDATE"] . "' AND 
                                            a.dustrec_date <= '" . $_SESSION["SEARCHWORDCOMP_ENDATE"] . "'";
                } else if (!$_SESSION["SEARCHWORDCOMP_STDATE"] && $_SESSION["SEARCHQUERY_DATE"]) {
                    $sql = "SELECT * from dustrec as a, position as b 
                                            where 
                                            b.position_name = '" . $_SESSION["SEARCHQUERY_POSNAME"] . "' AND
                                            b.position_id = a.dustrec_position_id AND
                                            a.dustrec_date = '" . $_SESSION["SEARCHQUERY_DATE"] . "'"; //กำหนดจำนวนการแสดงผลต่อ 1 หน้า
                    $subti = "วันที่ " . date("d/m/Y", strtotime($_SESSION["SEARCHQUERY_DATE"]));
                } else if (!$_SESSION["SEARCHWORDCOMP_STDATE"] && !$_SESSION["SEARCHQUERY_DATE"]) {
                    $sql = "SELECT * from dustrec as a, position as b 
                                            where 
                                            b.position_name = '" . $_SESSION["SEARCHQUERY_POSNAME"] . "' AND
                                            b.position_id = a.dustrec_position_id AND
                                            a.dustrec_date = '" . $_SESSION["FIXDATE"] . "'"; //กำหนดจำนวนการแสดงผลต่อ 1 หน้า
                    $subti = "วันที่ " . date("d/m/Y", strtotime($_SESSION["FIXDATE"]));
                }

                $query = mysqli_query($connection, $sql);
                $row = mysqli_num_rows($query);

                while ($row_result = mysqli_fetch_array($query, MYSQLI_ASSOC)) {

                    if (($row_result['dustrec_amount_dust'] >= '37.5') || ($row_result['dustrec_amount_co2'] >= '1000')) {
                        if ($row_result['dustrec_amount_dust'] >= '37.5' && $row_result['dustrec_amount_co2'] >= '1000') {
                ?>
                            <!-- 1 block data -->
                            <tr style="color:#E74C3C;font-weight:bold">
                            <?php
                        }
                        if ($row_result['dustrec_amount_dust'] >= '37.5' && $row_result['dustrec_amount_co2'] < '1000') {
                            ?>
                                <!-- 1 block data -->
                            <tr style="color:#EF8B80">
                            <?php
                        }
                        if ($row_result['dustrec_amount_dust'] < '37.5' && $row_result['dustrec_amount_co2'] >= '1000') {
                            ?>
                                <!-- 1 block data -->
                            <tr style="color:#F7BF65">
                            <?php
                        }
                    } else {
                            ?>
                            <!-- 1 block data -->
                            <tr>
                            <?php
                        }
                            ?>
                            <!--<td width="">
                                    <center><a href="/reportbydate.php?posname=<?= $row_result['position_name'] ?>&date=<?= $row_result['dustrec_date'] ?>" target="_blank"><?php echo date('d/m/Y', strtotime($row_result['dustrec_date'])) ?></a></center>
                                </td>-->
                            <td width="">
                                <center><?php echo date('d/m/Y', strtotime($row_result['dustrec_date'])) ?>
                            </td>
                            <td width="">
                                <center><?php echo $row_result['dustrec_time'] ?> น.</center>
                            </td>
                            <!--<td width="">
                                    <center><?php echo $row_result['position_name'] ?></center>
                                </td>-->
                            <td width="">
                                <center><?php echo $row_result['dustrec_amount_dust'] ?> µg/m³</center>
                            </td>
                            <td width="">
                                <center><?php echo $row_result['dustrec_temp'] ?> °C</center>
                            </td>
                            <td width="">
                                <center><?php echo $row_result['dustrec_moistness'] ?> %</center>
                            </td>
                            <td width="">
                                <center><?php echo $row_result['dustrec_amount_co2'] ?> PPM.</center>
                            </td>
                            </tr>
                            <!-- 1 block data -->

                        <?php

                    }

                        ?>

            </tbody>
        </table>

        <div class="row">
            <!--<div class="col-md-12">
                                <h6><span class="btn btn-xs btn-danger">สีแดง</span> หมายถึง มีปริมาณฝุ่นละอองและก๊าชคาร์บอนไดออกไซค์สูงกว่าเกณฑ์ (>=300 Microns, >=1000 PPM.)<br><span class="btn btn-xs btn-danger disabled">สีชมพู</span> หมายถึง มีปริมาณฝุ่นละอองสูงกว่าเกณฑ์ (>=300 Microns)<br><span class="btn btn-xs btn-warning disabled">สีส้ม</span> หมายถึง มีปริมาณก๊าชคาร์บอนไดออกไซค์สูงกว่าเกณฑ์ (>=1000 PPM.)</h6>
                            </div>-->
            <div class="col-md-8" style="font-size: 10px !important;">
                <span class="btn btn-xs btn-danger">สีแดง</span> PM>=37.5 µg/m³, CO2>=1000 PPM. <span class="btn btn-xs btn-danger disabled">สีชมพู</span> PM>=37.5 µg/m³ <span class="btn btn-xs btn-warning disabled">สีส้ม</span> CO2>=1000 PPM.
            </div>
            <div class="col-md-4 text-right" style="font-size: 12px !important;">
                <a data-toggle="modal" data-target="#LoginModal">ข้อมูลทั้งหมด >></a>
            </div>
        </div>

        <!-- dustdatatablebydate_forshow forshow -->
    </div>

    <div class="col-md-6">
        <div class="row">
            <div class="col-md-6">
                <h5>ค่าเฉลี่ยสภาพอากาศวันนี้</h5>
                <hr>
                <?php
                include "panel_dustrecavg_bydate.php";
                ?>
            </div>
            <div class="col-md-6">

                <?php
                if (!$_SESSION["SEARCHWORDCOMP_STDATE"]) {
                ?>
                    <h5>ค่าเฉลี่ยสภาพอากาศตามช่วงเวลา</h5>
                    <hr>
                    <div class="alert alert-dismissible alert-danger fade in">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <span class="glyphicon glyphicon-warning-sign"></span> กรุณาระบุตำแหน่ง วันเริ่มต้นและสิ้นสุด
                    </div>
                <?php
                } else {
                    echo "<h5>ค่าเฉลี่ยสภาพอากาศวันที่ " . date("d/m/Y", strtotime($_SESSION["SEARCHWORDCOMP_STDATE"])) . " - " . date("d/m/Y", strtotime($_SESSION["SEARCHWORDCOMP_ENDATE"])) . "</h5><hr>";
                    include "panel_dustrecavg_bydateperd.php";
                }
                ?>
            </div>
        </div>
        <?php
        if (!$_SESSION["SEARCHWORDCOMP_STDATE"]) {
        ?>
            <h5>กราฟเปรียบเทียบสภาพอากาศ</h5>
            <hr>
            <div class="alert alert-dismissible alert-danger fade in">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <span class="glyphicon glyphicon-warning-sign"></span> กรุณาระบุตำแหน่ง วันเริ่มต้นและสิ้นสุด
            </div>
            <table id="dustdatatablecomp" style="display:none;">
                <thead>
                    <tr>
                        <th>
                            <center>ช่วงข้อมูล</center>
                        </th>
                        <th>
                            <center>ฝุ่น (µg/m³)</center>
                        </th>
                        <th>
                            <center>อุณหภูมิ (°C)</center>
                        </th>
                        <th>
                            <center>ความชื้น (%)</center>
                        </th>
                        <th>
                            <center>ก๊าชคาร์บอนไดออกไซค์ (PPM.)</center>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>วันนี้</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>ช่วงเวลา</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                </tbody>
            </table>
            <script>
                $(function() {
                    $('#dustcomp').highcharts({
                        data: {
                            table: 'dustdatatablecomp'
                        },
                        chart: {
                            type: 'bar'
                        },
                        title: {
                            text: 'กราฟเปรียบเทียบสภาพอากาศ'
                        },
                        subtitle: {
                            text: 'ระหว่างวันนี้ กับช่วงเวลาวันที่ - ',
                            x: 0
                        },
                        plotOptions: {
                            series: {
                                animation: {
                                    duration: 3000,
                                    easing: 'easeOutBounce'
                                }
                            }
                        },
                        yAxis: {
                            allowDecimals: false,
                            title: {
                                text: 'ข้อมูล'
                            },
                            plotLines: [{
                                value: 37.5,
                                color: 'red', //#7CB5EC
                                dashStyle: 'shortdash',
                                width: 2,
                                label: {
                                    text: 'มาตรฐาน PM = 37.5 µg/m³'
                                }
                            }]
                        },
                        tooltip: {
                            /*formatter: function () {
                               return '<b>' + this.series.name + '</b><br/>' +
                                  this.point.y + ' ' + this.point.name.toLowerCase();
                            }*/
                            valueSuffix: ''
                        },
                        credits: {
                            enabled: false
                        },
                        exporting: {
                            enabled: true
                        }
                    });
                });
            </script>
            <!-- display graph -->
            <div class="row" id="dustcomp">

            </div>
            <!-- display graph -->
        <?php
        } else {
        ?>
            <div class="row col-md-12">
                <h5>กราฟเปรียบเทียบสภาพอากาศ</h5>
                <hr>
                <table id="dustdatatablecomp" style="display:none;">
                    <thead>
                        <tr>
                            <th>
                                <center>ช่วงข้อมูล</center>
                            </th>
                            <th>
                                <center>ฝุ่น (µg/m³)</center>
                            </th>
                            <th>
                                <center>อุณหภูมิ (°C)</center>
                            </th>
                            <th>
                                <center>ความชื้น (%)</center>
                            </th>
                            <th>
                                <center>ก๊าชคาร์บอนไดออกไซค์ (PPM.)</center>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>วันนี้</td>
                            <td><?php echo number_format((float)$row_result['avg(dustrec_amount_dust)'], 2, '.', ''); ?></td>
                            <td><?php echo number_format((float)$row_result['avg(dustrec_temp)'], 2, '.', ''); ?></th>
                            <td><?php echo number_format((float)$row_result['avg(dustrec_moistness)'], 2, '.', ''); ?></td>
                            <td><?php echo number_format((float)$row_result['avg(dustrec_amount_co2)'], 2, '.', ''); ?></td>
                        </tr>
                        <tr>
                            <td>วันที่ <? echo date("d/m/Y", strtotime($_SESSION["SEARCHWORDCOMP_STDATE"])) . " - " . date("d/m/Y", strtotime($_SESSION["SEARCHWORDCOMP_ENDATE"])) ?></td>
                            <td><?php echo number_format((float)$row_result_dayperd['avg(dustrec_amount_dust)'], 2, '.', ''); ?></td>
                            <td><?php echo number_format((float)$row_result_dayperd['avg(dustrec_temp)'], 2, '.', ''); ?></th>
                            <td><?php echo number_format((float)$row_result_dayperd['avg(dustrec_moistness)'], 2, '.', ''); ?></td>
                            <td><?php echo number_format((float)$row_result_dayperd['avg(dustrec_amount_co2)'], 2, '.', ''); ?></td>
                        </tr>
                    </tbody>
                </table>
                <script>
                    $(function() {
                        $('#dustcomp').highcharts({
                            data: {
                                table: 'dustdatatablecomp'
                            },
                            chart: {
                                type: 'bar'
                            },
                            title: {
                                text: 'กราฟเปรียบเทียบสภาพอากาศ'
                            },
                            subtitle: {
                                text: 'ระหว่างวันนี้ กับช่วงเวลาวันที่ <? echo date("d/m/Y", strtotime($_SESSION["SEARCHWORDCOMP_STDATE"])) . " - " . date("d/m/Y", strtotime($_SESSION["SEARCHWORDCOMP_ENDATE"])) ?>',
                                x: 0
                            },
                            plotOptions: {
                                series: {
                                    animation: {
                                        duration: 3000,
                                        easing: 'easeOutBounce'
                                    }
                                }
                            },
                            yAxis: {
                                allowDecimals: false,
                                title: {
                                    text: 'ข้อมูล'
                                },
                                plotLines: [{
                                    value: 37.5,
                                    color: 'red', //#7CB5EC
                                    dashStyle: 'shortdash',
                                    width: 2,
                                    label: {
                                        text: 'มาตรฐาน PM = 37.5 µg/m³'
                                    }
                                }]
                            },
                            tooltip: {
                                /*formatter: function () {
                                   return '<b>' + this.series.name + '</b><br/>' +
                                      this.point.y + ' ' + this.point.name.toLowerCase();
                                }*/
                                valueSuffix: ''
                            },
                            credits: {
                                enabled: false
                            },
                            exporting: {
                                enabled: true
                            }
                        });
                    });
                </script>
                <!-- display graph -->
                <div class="row" id="dustcomp">

                </div>
                <!-- display graph -->
            </div>
        <?php
        }
        ?>

    </div>
</div>