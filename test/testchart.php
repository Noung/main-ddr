<?php
	//ตั้งค่าการเชื่อมต่อฐานข้อมูล
	$database_host 			= 'localhost';
	$database_username 		= '';
	$database_password 		= '';
	$database_name 			= '';

	$mysqli = new mysqli($database_host, $database_username, $database_password, $database_name);
    //กำหนด charset ให้เป็น utf8 เพื่อรองรับภาษาไทย
	$mysqli->set_charset("utf8");

    //กรณีมี Error เกิดขึ้น
	if ($mysqli->connect_error) {
		die('Error : ('. $mysqli->connect_errno .') '. $mysqli->connect_error);
	}
    
    $sql = " 
                    SELECT 
                        dustrec_date,
                        dustrec_time,
                        dustrec_position_id,
                        dustrec_amount_dust 
                    
                    FROM 
                        dustrec
                    
                    WHERE 
                        (dustrec_date like '%2016-05-04%' or  dustrec_date like '%2016-05-11%' or dustrec_date like '%2016-05-18%' or  dustrec_date like '%2016-05-25%') and
                        dustrec_position_id = '1'                    
                    
                    ORDER BY 
                        dustrec_time asc"; //เลือกดูผลลัพธ์ในตำแหน่ง A1 วันที่ 4/11/18/25.05.2016
		//เรียกข้อมูลจาก ตาราง chart 
		$get_data = $mysqli->query($sql);
		
		while($data = $get_data->fetch_assoc()){
			
			$result[] = $data;
		}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>การใช้งาน Highcharts JS With PHP MySQL</title>

    <!-- Bootstrap -->
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <h1>Hello, world! ข้อมูลทดสอบ</h1>

		<div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
		
		<table class="table table-striped table-hover table-responsive" id="datatable">
                  <thead>
                    <tr>
                        <th>วันที่</th>
                        <th>ปริมาณฝุ่น</th>
                    </tr>
                  </thead>
                  <tbody>
				<?php
					foreach($result as $result_tb){
						echo"<tr>";
							echo "<td>".$result_tb['dustrec_date']."</td>";
							echo "<td>".$result_tb['dustrec_amount_dust']."</td>";
							
						echo"</tr>";
					}
				?>
			
			</tbody>
		</table>

		
	<script src="http://code.jquery.com/jquery-1.12.0.min.js"></script>
	<script src="https://code.highcharts.com/highcharts.js"></script>
	<script src="https://code.highcharts.com/modules/data.js"></script>
	<script src="https://code.highcharts.com/modules/exporting.js"></script>
	
	<script>
	
	$(function () {
				
		$('#container').highcharts({
			data: {
				//กำหนดให้ ตรงกับ id ของ table ที่จะแสดงข้อมูล
				table: 'datatable'
			},
			chart: {
				type: 'bar'
			},
			title: {
				text: 'กราฟแสดงปริมาณฝุ่นละออง'
			     },
            subtitle: {
                text: 'ตำแหน่ง _ ระหว่างวันที่ _ ถึง _ ',
                x: 0
                 },
			yAxis: {
				allowDecimals: false,
				title: {
					text: 'ปริมาณฝุ่นละออง (Microns)'
				}
			},
			
			tooltip: {
				/*formatter: function () {
					return '<b>' + this.series.name + '</b><br/>' +
						this.point.y; + ' ' + this.point.name.toLowerCase();
				},*/
                valueSuffix: ' Microns'
			}
		});
	});
	
	</script>
	
  </body>
</html>
