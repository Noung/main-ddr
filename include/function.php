<?php
function time_now(){return date("H:i:s");}

function date_now(){return date("d")."/".date("m")."/".(date("Y")+543);}

function time2_now(){return date("His");}

function date2_now(){return date("d").date("m").(date("Y")+543);}

function time3_now($timestamp){return date("H:i:s", $timestamp);}

function date3_now($timestamp){return date('d/m/Y', $timestamp);}

function date4_now($timestamp){
	if($timestamp){
		return $timestamp[6].$timestamp[7]."/".$timestamp[4].$timestamp[5]."/".(($timestamp[0].$timestamp[1].$timestamp[2].$timestamp[3])+543);
	}else{
		return "--/--/---";
	}
	
}

function date5_now(){return (date("Y")+543)."/".date("m")."/".date("d");}

function time_elapsed_A($secs){
	$bit = array(
		'y' => $secs / 31556926 % 12,
		'w' => $secs / 604800 % 52,
		'd' => $secs / 86400 % 7,
		'h' => $secs / 3600 % 24,
		'm' => $secs / 60 % 60,
		's' => $secs % 60
	);

	foreach($bit as $k => $v) if($v > 0)$ret[] = $v . $k;
	return join(' ', $ret);
}
   
function time_elapsed_B($secs){
	$bit = array(
		' year'        => $secs / 31556926 % 12,
		' week'        => $secs / 604800 % 52,
		' day'        => $secs / 86400 % 7,
		' hour'        => $secs / 3600 % 24,
		' minute'    => $secs / 60 % 60,
		' second'    => $secs % 60
	);
       
	foreach($bit as $k => $v){
		if($v > 1)$ret[] = $v . $k . 's';
		if($v == 1)$ret[] = $v . $k;
	}
	array_splice($ret, count($ret)-1, 0, 'and');
	$ret[] = 'ago.';

	return join(' ', $ret);
}

function db_conn($host,$user,$password,$db){
	$mysqli = @new mysqli($host,$user,$password,$db);  
	$mysqli->set_charset('utf8');
	return $mysqli;
};

function user_login($username,$password){
	$client=new SoapClient("https://passport.psu.ac.th/authentication/authentication.asmx?WSDL");
	$login=array("username"=>$username,"password"=>$password);
	$result = $client->GetStaffDetails($login);
	$result =  (array) $result;
	$result =  (array) $result[GetStaffDetailsResult];
	$result=$result[string];
//	$result[0]=true;
	if($result[0]){
		$return=array(
			"login"=>1,
			"name"=>$result[1]." ".$result[2]
		);
		$return=array(
			"login"=>1,
			"name"=>"ภัทธ์ เอมวัฒน์"
		);

		return $return;
	}else{
		return 0;
	}
	return $result;
}

function lib_psulogin_wsdl($id,$password){
	$client = new soapclient1('https://passport.psu.ac.th/authentication/authentication.asmx?WSDL', true);
	$err = $client->getError();
	echo $err;
	if ($err) {
			$str_return =  $err ;
	  }
	$proxy = $client->getProxy();
	$person = array('username' => $id,'password' => $password);
	$result = $proxy->Authenticate($person);
	$xxxresult = $proxy->GetStaffDetails($person);
	$xxxxxxxxresult = $proxy->GetUserDetails($person); 

	if ($proxy->fault) {
			$str_return = $result;
	}else{
		  $err = $proxy->getError();
		 if($err){
			   $str_return =  $err ;
		 }else{
			   $str_return = $result;
		 }
	}
	list($login,$name,$sname,$staff_id,$sex,$per_id,$a7,$a8,$fac_name,$a10,$campus_name,$a12,$title_name,$email,$a15) = $xxxxxxxxresult;
	return array($str_return,$login,$name,$sname,$staff_id,$sex,$per_id,$a7,$a8,$fac_name,$a10,$campus_name,$a12,$title_name,$email,$a15);
}

function cut_empty($MyArray){
	$clen=count($MyArray);
	$j=0;
	for($i=0;$i<$clen;$i++){
		if($MyArray[$i]!=''){
			$return[$j++]=$MyArray[$i];
		}
	}
	return $return;
}

function cut_repeate($MyArray){
	$clen=count($MyArray);
	$j=0;
	$tmp='';
	for($i=0;$i<$clen;$i++){
		if($MyArray[$i]!=$tmp){
			$return[$j++]=$MyArray[$i];
			$tmp=$MyArray[$i];
		}
	}
	return $return;
}

function aqiCal($pm){
	// if ($pm <= 12.0) {
	// 	return ((50 - 0) / (12.0 - .0) * ($pm - .0) + 0);
	// } else if ($pm <= 35.4) {
	// 	return ((100 - 50) / (35.4 - 12.0) * ($pm - 12.0) + 50);
	// } else if ($pm <= 55.4) {
	// 	return ((150 - 100) / (55.4 - 35.4) * ($pm - 35.4) + 100);
	// } else if ($pm <= 150.4) {
	// 	return ((200 - 150) / (150.4 - 55.4) * ($pm - 55.4) + 150);
	// } else if ($pm <= 250.4) {
	// 	return ((300 - 200) / (250.4 - 150.4) * ($pm - 150.4) + 200);
	// } else if ($pm <= 350.4) {
	// 	return ((400 - 300) / (350.4 - 250.4) * ($pm - 250.4) + 300);
	// } else if ($pm <= 500.4) {
	// 	return ((500 - 400) / (500.4 - 350.4) * ($pm - 350.4) + 400);
	// } else
	// 	return 500;
	if ($pm <= 12.0) 
		return ((50 - 0) / (12.0 - .0) * ($pm - .0) + 0);
	else if (
		$pm <= 35.4
	) return ((100 - 50) / (35.4 - 12.0) * ($pm - 12.0) + 50);
	else if (
		$pm <= 55.4
	) return ((150 - 100) / (55.4 - 35.4) * ($pm - 35.4) + 100);
	else if (
		$pm <= 150.4
	) return ((200 - 150) / (150.4 - 55.4) * ($pm - 55.4) + 150);
	else if (
		$pm <= 250.4
	) return ((300 - 200) / (250.4 - 150.4) * ($pm - 150.4) + 200);
	else if (
		$pm <= 350.4
	) return ((400 - 300) / (350.4 - 250.4) * ($pm - 250.4) + 300);
	else if (
		$pm <= 500.4
	) return ((500 - 400) / (500.4 - 350.4) * ($pm - 350.4) + 400);
	else return 500;
}
?>