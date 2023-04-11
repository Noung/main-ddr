<?php
                            // แจ้งเตือนทางไลน์ให้ จนท.

                
                            if($row_result['dustrec_amount_dust'] >= '37.5' && $row_result['dustrec_amount_co2'] >= '1000'){
                                    $messageline .= "\n\nขณะนี้ระบบตรวจวัดปริมาณฝุ่นละอองสำนักวิทยบริการพบค่าความผิดปกติระดับสีแดง (PM และ CO2 สูงกว่าค่ามาตรฐาน >=37.5 µg/m³, >=1000 PPM.) ณ ตำแหน่ง ".$row_result['position_name']." วันที่ ".date('d/m/Y', strtotime($row_result['dustrec_date']))." เวลา ".$row_result['dustrec_time']." น. (PM=".$row_result['dustrec_amount_dust']." µg/m³, CO2=".$row_result['dustrec_amount_co2']." PPM.)\n\nตรวจสอบรายละเอียดได้ที่ https://ddr.oas.psu.ac.th";
                              }
                            if($row_result['dustrec_amount_dust'] >= '37.5' && $row_result['dustrec_amount_co2'] < '1000'){
                                    $messageline .= "\n\nขณะนี้ระบบตรวจวัดปริมาณฝุ่นละอองสำนักวิทยบริการพบค่าความผิดปกติระดับสีชมพู (PM สูงกว่าค่ามาตรฐาน >=37.5 µg/m³) ณ ตำแหน่ง ".$row_result['position_name']." วันที่ ".date('d/m/Y', strtotime($row_result['dustrec_date']))." เวลา ".$row_result['dustrec_time']." น. (PM=".$row_result['dustrec_amount_dust']." µg/m³, CO2=".$row_result['dustrec_amount_co2']." PPM.)\n\nตรวจสอบรายละเอียดได้ที่ https://ddr.oas.psu.ac.th";
                              }
                            if($row_result['dustrec_amount_dust'] < '37.5' && $row_result['dustrec_amount_co2'] >= '1000'){
                                    $messageline .= "\n\nขณะนี้ระบบตรวจวัดปริมาณฝุ่นละอองสำนักวิทยบริการพบค่าความผิดปกติระดับสีส้ม (CO2 สูงกว่าค่ามาตรฐาน >=1000 PPM.) ณ ตำแหน่ง ".$row_result['position_name']." วันที่ ".date('d/m/Y', strtotime($row_result['dustrec_date']))." เวลา ".$row_result['dustrec_time']." น. (PM=".$row_result['dustrec_amount_dust']." µg/m³, CO2=".$row_result['dustrec_amount_co2']." PPM.)\n\nตรวจสอบรายละเอียดได้ที่ https://ddr.oas.psu.ac.th";
                              }
                      
                            //$messageline .= "\n\nขณะนี้ระบบตรวจวัดปริมาณฝุ่นละอองสำนักวิทยบริการพบค่าความผิดปกติระดับสีส้ม (CO2 สูงกว่าค่ามาตรฐาน >=1000 PPM.) ณ ตำแหน่ง ".$row_result['position_name']." วันที่ ".date('d/m/Y', strtotime($row_result['dustrec_date']))." เวลา ".$row_result['dustrec_time']." น. (PM=".$row_result['dustrec_amount_dust']." µg/m³, CO2=".$row_result['dustrec_amount_co2']." PPM.)\n\nตรวจสอบรายละเอียดได้ที่ https://ddr.oas.psu.ac.th";
                          
                            function notify_message($messageline,$token){
                                $queryData = array('message' => $messageline);
                                $queryData = http_build_query($queryData,'','&');
                                $headerOptions = array( 
                                    'http'=>array(
                                        'method'=>'POST',
                                        'header'=> "Content-Type: application/x-www-form-urlencoded\r\n"
                                            ."Authorization: Bearer ".$token."\r\n"
                                            ."Content-Length: ".strlen($queryData)."\r\n",
                                        'content' => $queryData
                                    ),
                                );
                                $context = stream_context_create($headerOptions);
                                $result = file_get_contents(LINE_API,FALSE,$context);
                                $res = json_decode($result);
                                return $res;
                            } 

                            $massage1=iconv('utf-8','utf-8',$messageline);

                            define('LINE_API',"https://notify-api.line.me/api/notify");
                            $token = "h7GbD4ac0qMXgx6YYqCR4Zt6niD1If0fPJzjOea1Z2t"; //ใส่ Token ของ group line ที่จะแจ้ง
                            $str = $massage1; //ข้อความที่ต้องการส่ง สูงสุด 1000 ตัวอักษร
                            $res = notify_message($str,$token);
                            //print_r($res);
                            
                             // แจ้งเตือนทางไลน์ให้ จนท.
             
?>