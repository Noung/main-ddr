<!-- DustRecModal -->
<div id="DustRecModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h3 class="modal-title"><span class='glyphicon glyphicon-pencil'></span> บันทึกปริมาณฝุ่นละออง</h3>
      </div>
      <div class="modal-body">
        <form role="DustRecForm" method="POST" action="include/dustrec_add.php">
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label class='control-label' for='dustrec_position_id'>ตำแหน่ง</label>
                <select class='form-control' id='dustrec_position_id' name='dustrec_position_id' required=''>
                  <option value='' disabled selected>ระบุตำแหน่งที่วัด</option>
                  <option disabled>*อาคาร 22 ชั้น 1</option>
                  <option value='1'>บริการยืม-คืน</option>
                  <option value='2'>บริการตอบคำถามฯ</option>
                  <option value='3'>โถงอ่านหนังสือชั้น 1</option>
                  <!--<option value='4'>ชั้นวารสารใหม่</option>-->
                  <option value='5'>ชั้นวารสารล่วงเวลา</option>
                  <option value='6'>สำนักงานเลขานุการ</option>
                  <option disabled>*อาคาร 22 ชั้น 2</option>
                  <option value='7'>ชั้นหนังสือภาษาไทย</option>
                  <option value='8'>ชั้นหนังสือภาษาอังกฤษ</option>
                  <option value='9'>โถงอ่านหนังสือชั้น 2</option>
                  <option value='10'>ทางเดินหน้าห้องจดหมายเหตุฯ</option>
                  <option value='11'>ทางเดินไปอาคาร 17</option>
                  <option value='12'>ทางเดินโซนห้องประชุม</option>
                  <option disabled>*อาคาร 22 ชั้น 3</option>
                  <option value='13'>IT-Zone</option>
                  <option value='14'>ห้องวิทยานิพนธ์</option>
                  <option value='15'>บริการโสตฯ</option>
                  <option value='16'>American Corner Pattani</option>
                  <option value='17'>ทางเข้าห้องมินิเธียเตอร์</option>
                  <option value='18'>ทางเข้าห้องบริการคอมพิวเตอร์ 1</option>
                  <option disabled>*อาคาร 17 ชั้น 1</option>
                  <option value='19'>งานวิเคราะห์ทรัพยากรฯ</option>
                  <!-- <option value='20'>งานธุรการ</option> -->
                  <option value='21'>งานห้องสมุดดิจิทัล</option>
                  <option value='22'>งานซ่อมฯ</option>
                  <option value='23'>ชั้นหนังสือ</option>
                  <option disabled>*อาคาร 17 ชั้น 2</option>
                  <option value='24'>ชั้นหนังสือภาษาเกาหลี</option>
                  <option value='25'>ชั้นหนังสือภาษาอังกฤษ</option>
                  <option value='26'>ชั้นหนังสือภาษาไทย</option>
                  <option value='27'>ชั้นหนังสือภาษาอิสลาม</option>
                  <option value='28'>ชั้นหนังสือนวนิยาย</option>
                  <option value='29'>ที่นั่งอ่านหนังสือด้านตะวันตก</option>
                  <option value='30'>ที่นั่งอ่านหนังสือด้านตะวันออก</option>
                  <option value='31'>ที่นั่งอ่านหนังสือด้านทิศใต้</option>
                  <option disabled>*อาคาร 16 ชั้น 1</option>
                  <option value='20'>โรงพิมพ์ฝ่ายเทคโนโลยีและนวัตกรรมฯ</option>
                  <option disabled>*อื่นๆ</option>
                  <option value='4'>หน้าอาคารสำนักวิทยบริการ</option>
                </select>

                <label class='control-label' for='dustrec_datetime'>วันและเวลา</label>
                <div class='input-group date' id='datetimepickerLocal'>
                  <input type='text' class='form-control' name='dustrec_datetime' placeholder='ระบุวันและเวลาที่วัด' required='' />
                  <span class="input-group-addon">
                    <span class="glyphicon glyphicon-calendar"></span>
                  </span>
                </div>

                <label class='control-label' for='dustrec_amount_dust'>ปริมาณฝุ่น (µg/m³)</label>
                <input type="number" step="0.001" class='form-control' name='dustrec_amount_dust' placeholder='ปริมาณฝุ่นที่วัด' required='' />

                <label class='control-label' for='dustrec_temp'>อุณหภูมิ (°C)</label>
                <input type="number" step="0.001" class='form-control' name='dustrec_temp' placeholder='อุณหภูมิที่วัด' required='' />

                <label class='control-label' for='dustrec_moistness'>ความชื้น (%)</label>
                <input type="number" step="0.001" class='form-control' name='dustrec_moistness' placeholder='ความชื้นที่วัด' required='' />

                <label class='control-label' for='dustrec_amount_co2'>ปริมาณก๊าชคาร์บอนไดออกไซค์ (PPM.)</label>
                <input type="number" step="0.001" class='form-control' name='dustrec_amount_co2' placeholder='ปริมาณก๊าชคาร์บอนไดออกไซค์ที่วัด' required='' />

                <?php
                $dt = new DateTime($utc);
                $tz = new DateTimeZone('Asia/Bangkok'); // or whatever zone you're after
                $dt->setTimezone($tz);
                $showdate = $dt->format('Y-m-d H:i:s');
                //echo $showdate;
                ?>

                <!--<label class='control-label' for='dustrec_timestamp'>วันที่บันทึกข้อมูล</label>-->
                <input type="hidden" name="dustrec_timestamp" value="<?php echo $showdate; ?>" />
              </div>
            </div>
          </div>

      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-success"><span class='glyphicon glyphicon-floppy-save'></span> บันทึก</button>
        <button type="reset" class="btn btn-danger"><span class='glyphicon glyphicon-remove'></span> ล้างค่า</button>
      </div>
      </form>
    </div>
  </div>
</div>
<!-- DustRecModal -->