<!-- Header -->
<?php
session_start();
error_reporting(0); // ปิด error report
$_SESSION["LOGIN"];
if($_SESSION["LOGIN"]!=1){
?>

	<script>
		location='http://ddr.oas.psu.ac.th'
	</script>
	
<?php
}else{
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
    <?php
?>
<!-- Header -->     

<?php
	  //เรียงข้อมูล
	  $sort = $_GET[sort];
	  if(!$sort){
		  $sort = 'dustrec_timestamp';
	  }
	  //เรียงข้อมูล
      
      ///แบ่งหน้า///
			$sqlrownum = "select * from dustrec";//คำนวณหาจำนวนเรคคอร์ดทั้งหมดเพื่อใช้คิดจำนวนหน้า
			$queryrownum = mysqli_query($connection, $sqlrownum);
			$rownum = mysqli_num_rows($queryrownum);
			//echo $rownum;
			//exit();

			$Per_Page = 15;// จำนวนที่แสดงต่อ 1 หน้า
			$Page = $_GET["Page"];
			if(!$_GET["Page"])
				{
					$Page = 1;
				}
			$Prev_Page = $Page - 1;
			$Next_Page = $Page + 1;
			$Page_Start = (($Per_Page * $Page) - $Per_Page);
			if($rownum <= $Per_Page)
				{
					$Num_Pages = 1;
				}
			else if(($rownum % $Per_Page) == 0)
				{
					$Num_Pages = ($rownum / $Per_Page);
				}
			else
				{
					$Num_Pages = ($rownum / $Per_Page) + 1;
					$Num_Pages = (int)$Num_Pages;
				}
		///แบ่งหน้า///
  ?>
       
       <script type="text/javascript">
            //var $d = jQuery.noConflict();

                //$d(document).ready(function(){
                $(document).ready(function(){
                    $('#dustdatatable').DataTable({
                        dom: 'Bfrtip',
                        buttons: [
                            'copy', 'excel', 'print'
                        ],
                        order: [ 0, "desc" ],//เรียงข้อมูลตาม
                        pageLength: 15
                        //recordsTotal: 50
                    });
                });
        </script>
        
        <div class="row">
            <div class="col-md-4"><h4>ตารางแสดงปริมาณฝุ่นละออง</h4></div>
            <!--<div class="col-md-8">
				<div class="text-right"><br><small><span class="glyphicon glyphicon-sort-by-attributes"></span> เรียงตาม: <a href="?sort=dustrec_date">วันที่</a> | <a href="?sort=dustrec_position_id">ตำแหน่ง</a> | <a href="?sort=dustrec_amount_dust">ฝุ่น</a> | <a href="?sort=dustrec_temp">อุณหภูมิ</a> | <a href="?sort=dustrec_moistness">ความชื้น</a> | <a href="?sort=dustrec_amount_co2">ก๊าชคาร์บอนไดออกไซค์</a></small></div>
            </div>-->
        </div>
        <hr>
        <div class="row">
            <div class="col-md-12 table-responsive">
                <table class="table table-striped table-hover table-responsive" id="dustdatatable">
                  <thead>
                    <tr>
                        <th style="display:none"><center>#</center></th>
                        <th><center>วันที่</center></th>
                        <th><center>เวลา</center></th>
                        <th><center>ตำแหน่ง</center></th>
                        <th><center>ฝุ่น</center></th>
                        <th><center>อุณหภูมิ</center></th>
                        <th><center>ความชื้น</center></th>
                        <th><center>ก๊าชคาร์บอนไดออกไซค์</center></th>
                    </tr>
                  </thead>
                  <tbody>
                 <?php
                    //if((!$browsecourse) && (!$tagsearch)){//กรณีไม่มีการป้อนคำค้น
                    if($sort == 'dustrec_id' || $sort == 'dustrec_date'){
                        $sql = "SELECT * from dustrec as a, position as b where a.dustrec_position_id = b.position_id order by $sort desc LIMIT 5000";//กำหนดจำนวนการแสดงผลต่อ 1 หน้า
                    }else{
                        $sql = "SELECT * from dustrec as a, position as b where a.dustrec_position_id = b.position_id order by $sort desc LIMIT 5000";//กำหนดจำนวนการแสดงผลต่อ 1 หน้า
                    }
                    
			        $query = mysqli_query($connection, $sql);
			        $row = mysqli_num_rows($query);

			        while($row_result = mysqli_fetch_array($query, MYSQLI_ASSOC)){ 
                        
                    if(($row_result['dustrec_amount_dust'] >= '37.5') || ($row_result['dustrec_amount_co2'] >= '1000')){
                      if($row_result['dustrec_amount_dust'] >= '37.5' && $row_result['dustrec_amount_co2'] >= '1000'){
                      ?>
                        <!-- 1 block data -->
			            <tr style="color:#E74C3C;font-weight:bold">
                      <?php
                      }
                      if($row_result['dustrec_amount_dust'] >= '37.5' && $row_result['dustrec_amount_co2'] < '1000'){
                      ?>
                        <!-- 1 block data -->
			            <tr style="color:#EF8B80">
                      <?php
                      }
                      if($row_result['dustrec_amount_dust'] < '37.5' && $row_result['dustrec_amount_co2'] >= '1000'){ 
                       ?>
                        <!-- 1 block data -->
			            <tr style="color:#F7BF65">
                   <?php 
                      }
                    }else{
                    ?>
                        <!-- 1 block data -->
			             <tr>
                    <?php
                     }
                        ?>
                        <!--<td width="">
                            <center><?php echo date('d/m/Y', strtotime($row_result['dustrec_date'])) ?></center>
                        </td>-->
                        <td width=""  style="display:none">
                            <center><?php echo $row_result['dustrec_id'] ?></center>
                        </td>
                        <td width="">
                            <center><a href="/dashboard/reportbydate.php?posname=<?=$row_result['position_name']?>&date=<?=$row_result['dustrec_date']?>" target="_blank"><?php echo date('d/m/Y', strtotime($row_result['dustrec_date'])) ?></a></center>
                        </td>
                        <td width="">
                            <center><?php echo $row_result['dustrec_time'] ?> น.</center>
                        </td>
                        <td width="">
                            <center><?php echo $row_result['position_name'] ?></center>
                        </td>
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
		    </div>
	    </div>
	    
	    <!-- ///แบ่งหน้า/// -->
		<!--<div class="row">
			<div class="col-md-12">
				<?php// echo $Num_Pages;?>
				<?php
				/*if($Prev_Page){
					echo " <ul class='pagination'><li><a href='$_SERVER[SCRIPT_NAME]?Page=$Prev_Page'><< ก่อนหน้า</a></li></ul> ";
				}

				for($i=1; $i<=$Num_Pages; $i++){
					if($i != $Page){
						echo "<ul class='pagination'><li><a href='$_SERVER[SCRIPT_NAME]?Page=$i'>$i</a></li></ul> ";
					}else{
						echo "<ul class='pagination'><li class='active'><a href='#'>$i</a></li></ul> ";
					}
				}

				if($Page!=$Num_Pages){
					echo " <ul class='pagination'><li><a href ='$_SERVER[SCRIPT_NAME]?Page=$Next_Page'>ถัดไป >></a></li></ul>  ";
				}*/
				?>
			</div>
		</div>-->
		<!-- ///แบ่งหน้า/// -->
		<div class="row">
            <div class="col-md-12">
                <h6><span class="btn btn-xs btn-danger">สีแดง</span> หมายถึง มีปริมาณฝุ่นละอองและก๊าชคาร์บอนไดออกไซค์สูงกว่าเกณฑ์ (>=37.5 µg/m³, >=1000 PPM.)<br><span class="btn btn-xs btn-danger disabled">สีชมพู</span> หมายถึง มีปริมาณฝุ่นละอองสูงกว่าเกณฑ์ (>=37.5 µg/m³)<br><span class="btn btn-xs btn-warning disabled">สีส้ม</span> หมายถึง มีปริมาณก๊าชคาร์บอนไดออกไซค์สูงกว่าเกณฑ์ (>=1000 PPM.)</h6>
            </div>
        </div>
	
<?php 
}
?> 
<div class="text-right"><a href="/dashboard/dustreclist.php"><span class="glyphicon glyphicon-eye-open"></span>&nbsp;ดูทั้งหมด >></span></a></div>
