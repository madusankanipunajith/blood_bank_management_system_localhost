<?php

function is_valid_serial($serial_num)
{
	$result= true;
	$s_num= trim($serial_num);

	if (strlen($s_num)!=8) {
			$result= false;
	}
	if (is_numeric($s_num[0]) || is_numeric($s_num[1]) || ($s_num[2]==" ") || ($s_num[5]!=" ")) {
			$result=false;
	}

	if (!is_numeric($s_num[2]) || !is_numeric($s_num[3]) || !is_numeric($s_num[4])) {
			$result=false;
	}

	$ser_2= substr($s_num,6,2);
	if (!is_numeric($ser_2)) {
			$result=false;
	}

	return $result;	
}

function is_valid_bag($bag_num)
{	
	$result=true;
	$b_num= trim($bag_num);

	if (strlen($b_num)==10) {
		if (!is_numeric($b_num[0]) || ($b_num[1]!=" ") || ($b_num[7]!=" ") || is_numeric($b_num[8]) || is_numeric($b_num[9])) {
			$result= false;
		}

		$bag_5= substr($b_num, 2,5);
		if (!is_numeric($bag_5)) {
			$result=false;
		}

	}elseif (strlen($b_num)==7) {
		if (!is_numeric($b_num[0]) || ($b_num[1]!=" ")) {
			$result= false;
		}

		$bag_5= substr($b_num, 2,5);
		if (!is_numeric($bag_5)) {
			$result=false;
		}
	}else{
		$result= false;
	}


	return $result;
}

?>