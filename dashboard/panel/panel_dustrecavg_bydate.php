<!-- Header -->
<?php
session_start();
error_reporting(0); // ปิด error report
?>
<!-- Header -->     


               
                 <?php
                    $date = date("Y-m-d");
                    $sql = "select avg(dustrec_amount_dust),avg(dustrec_temp),avg(dustrec_moistness),avg(dustrec_amount_co2) from dustrec as a, position as b where  b.position_name = '".$_SESSION["SEARCHQUERY_POSNAME"]."' AND
                                    b.position_id = a.dustrec_position_id AND a.dustrec_date = '$date'";

			        $query = mysqli_query($connection, $sql);
			        $row = mysqli_num_rows($query);
		            $row_result = mysqli_fetch_array($query, MYSQLI_ASSOC);
                    
                ?>
                  
           <div class="row">
               <div class="col-md-6">
                  <div class="update-nag"><!--ฝุ่น-->
                    <div class="update-split"><img src="/assets/icons/dust.png" width="25"> </div>
                      <div class="update-text">ฝุ่น (µg/m³)</div>
                      <div class="update-textdata"><?php echo number_format((float)$row_result['avg(dustrec_amount_dust)'], 2, '.', ''); ?></div>
                  </div>
                </div>
               <div class="col-md-6">
                  <div class="update-temp"><!--อุณหภูมิ-->
                    <div class="update-split"><img src="/assets/icons/celsius.png" width="25"> </div>
                    <div class="update-text">อุณหภูมิ (°C)</div>
                    <div class="update-textdata"><?php echo number_format((float)$row_result['avg(dustrec_temp)'], 2, '.', ''); ?>  </div>
                  </div>
                </div>
            </div>
            <div class="row">
               <div class="col-md-6">
                  <div class="update-mois"><!--ความชื้น-->
                    <div class="update-split"><img src="/assets/icons/waterdrop.png" width="25"> </div>
                    <div class="update-text">ความชื้น (%)</div>
                    <div class="update-textdata"><?php echo number_format((float)$row_result['avg(dustrec_moistness)'], 2, '.', ''); ?> </div>
                  </div>
                </div>
               <div class="col-md-6">
                  <div class="update-co2"><!--ก๊าชคาร์บอนไดออกไซค์-->
                    <div class="update-split"><img src="/assets/icons/co2.png" width="25"> </div>
                    <div class="update-text">คาร์บอนฯ (PPM.)</div>
                    <div class="update-textdata"><?php echo number_format((float)$row_result['avg(dustrec_amount_co2)'], 2, '.', ''); ?> </div>
                  </div>
                </div>
            </div>
