<?php

function is_valid_nic($nic){
$result = true;

if(strlen($nic) == 10){

	$nic_9 = substr($nic,0,9);

	if (!is_numeric ($nic_9)){
		$result =false;
	}

	$nic_v = substr($nic,9,1);
	if (is_numeric ($nic_v)){
		$result =false;
	}


	return $result;

}

if (strlen($nic) == 12) {
	$nic_12 = substr($nic,0,12);

	if (!is_numeric ($nic_12)){
		$result =false;
	}

	return $result;

}

if (strlen($nic) != 12 && strlen($nic) != 10) {
	$result= false;
	return $result;
}


}



?>