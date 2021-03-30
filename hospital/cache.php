<?php
// cache management

	//set

function set_email_err($x)
{
	$_SESSION['email_err']=$x;
}
function set_district_err($x)
{
	$_SESSION['district_err']=$x;
}
function set_username_err($x)
{
	$_SESSION['username_err']=$x;
}
function set_doctor_err($x)
{
	$_SESSION['doctor_err']=$x;
}
function set_address_err($x)
{
	$_SESSION['address_err']=$x;
}
function set_hosname_err($x)
{
	$_SESSION['hosname_err']=$x;
}
function set_telephone2_err($x)
{
	$_SESSION['telephone2_err']=$x;
}
function set_telephone_err($x)
{
	$_SESSION['telephone_err']=$x;
}
function set_old_password_err($x)
{
	$_SESSION['old_password_err']=$x;
}
function set_new_password_err($x)
{
	$_SESSION['new_password_err']=$x;
}
function set_confirm_password_err($x)
{
	$_SESSION['confirm_password_err']=$x;
}
function set_report_start_date_err($x)
{
	$_SESSION['start_date']=$x;
}
function set_report_end_date_err($x)
{
	$_SESSION['end_date']=$x;
}
function set_blood_type_err($x)
{
	$_SESSION['blood_type']=$x;
}
function set_blood_volume_err($x)
{
	$_SESSION['blood_volume']=$x;
}


	//set variables
function set_email($x)
{
	$_SESSION['email']=$x;
}
function set_district($x)
{
	$_SESSION['district']=$x;
}
function set_username($x)
{
	$_SESSION['username']=$x;
}
function set_doctor($x)
{
	$_SESSION['doctor']=$x;
}
function set_address($x)
{
	$_SESSION['address']=$x;
}
function set_hosname($x)
{
	$_SESSION['hosname']=$x;
}
function set_telephone2($x)
{
	$_SESSION['telephone2']=$x;
}
function set_telephone($x)
{
	$_SESSION['telephone']=$x;
}
function set_old_password($x)
{
	$_SESSION['old_password']=$x;
}
function set_new_password($x)
{
	$_SESSION['new_password']=$x;
}
function set_confirm_password($x)
{
	$_SESSION['confirm_password']=$x;
}
function set_blood_type($x)
{
	$_SESSION['blood']=$x;
}
function set_blood_volume($x)
{
	$_SESSION['volume']=$x;
}


	//get

function get_email_err()
{
	if (isset($_SESSION['email_err'])) {
		return $_SESSION['email_err'];
	}
}
function get_old_password_err()
{
	if (isset($_SESSION['old_password_err'])) {
		return $_SESSION['old_password_err'];
	}
}
function get_new_password_err()
{
	if (isset($_SESSION['new_password_err'])) {
		return $_SESSION['new_password_err'];
	}
}
function get_confirm_password_err()
{
	if (isset($_SESSION['confirm_password_err'])) {
		return $_SESSION['confirm_password_err'];
	}
}
function get_telephone_err()
{
	if (isset($_SESSION['telephone_err'])) {
		return $_SESSION['telephone_err'];
	}
}
function get_telephone2_err()
{
	if (isset($_SESSION['telephone2_err'])) {
		return $_SESSION['telephone2_err'];
	}
}
function get_district_err()
{
	if (isset($_SESSION['district_err'])) {
		return $_SESSION['district_err'];
	}
}
function get_hosname_err()
{
	if (isset($_SESSION['hosname_err'])) {
		return $_SESSION['hosname_err'];
	}
}
function get_username_err()
{
	if (isset($_SESSION['username_err'])) {
		return $_SESSION['username_err'];
	}
}
function get_doctor_err()
{
	if (isset($_SESSION['doctor_err'])) {
		return $_SESSION['doctor_err'];
	}
}
function get_address_err()
{
	if (isset($_SESSION['address_err'])) {
		return $_SESSION['address_err'];
	}
}
function get_report_start_date_err()
{
	if(isset($_SESSION['start_date'])){
		return $_SESSION['start_date'];
	}
}
function get_report_end_date_err()
{
	if(isset($_SESSION['end_date'])){
        return $_SESSION['end_date'];
	}
}
function get_blood_type_err()
{
	if(isset($_SESSION['blood_type'])){
		return $_SESSION['blood_type'];
	}
}
function get_blood_volume_err()
{
	if(isset($_SESSION['blood_volume'])){
		return $_SESSION['blood_volume'];
	}
}
function get_blood_type()
{
	if(isset($_SESSION['blood'])){
		return $_SESSION['blood'];
	}
}
function get_blood_volume()
{
	if(isset($_SESSION['volume'])){
		return $_SESSION['volume'];
	}
}

	// unset all
function unset_cache()
{
	if(isset($_SESSION['email_err'])){
		unset($_SESSION['email_err']);
	}
	if(isset($_SESSION['old_password_err'])){
		unset($_SESSION['old_password_err']);
	}
	if(isset($_SESSION['new_password_err'])){
		unset($_SESSION['new_password_err']);
	}
	if(isset($_SESSION['confirm_password_err'])){
		unset($_SESSION['confirm_password_err']);
	}
	if(isset($_SESSION['telephone_err'])){
		unset($_SESSION['telephone_err']);
	}
	if(isset($_SESSION['telephone2_err'])){
		unset($_SESSION['telephone2_err']);
	}
	if(isset($_SESSION['district_err'])){
		unset($_SESSION['district_err']);
	}
	if(isset($_SESSION['hosname_err'])){
		unset($_SESSION['hosname_err']);
	}
	if(isset($_SESSION['doctor_err'])){
		unset($_SESSION['doctor_err']);
	}
	if(isset($_SESSION['address_err'])){
		unset($_SESSION['address_err']);
	}
	if(isset($_SESSION['username_err'])){
		unset($_SESSION['username_err']);
	}



	if(isset($_SESSION['email'])){
		unset($_SESSION['email']);
	}
	if(isset($_SESSION['old_password'])){
		unset($_SESSION['old_password']);
	}
	if(isset($_SESSION['new_password'])){
		unset($_SESSION['new_password']);
	}
	if(isset($_SESSION['confirm_password'])){
		unset($_SESSION['confirm_password']);
	}
	if(isset($_SESSION['telephone'])){
		unset($_SESSION['telephone']);
	}
	if(isset($_SESSION['telephone2'])){
		unset($_SESSION['telephone2']);
	}
	if(isset($_SESSION['district'])){
		unset($_SESSION['district']);
	}
	if(isset($_SESSION['hosname'])){
		unset($_SESSION['hosname']);
	}
	if(isset($_SESSION['doctor'])){
		unset($_SESSION['doctor']);
	}
	if(isset($_SESSION['address'])){
		unset($_SESSION['address']);
	}
	if(isset($_SESSION['username'])){
		unset($_SESSION['username']);
	}
	if(isset($_SESSION['start_date'])){
		unset($_SESSION['start_date']);
	}
	if(isset($_SESSION['end_date'])){
		unset($_SESSION['end_date']);
	}
	if(isset($_SESSION['blood_type'])){
		unset($_SESSION['blood_type']);
	}
	if(isset($_SESSION['blood_volume'])){
		unset($_SESSION['blood_volume']);
	}
	if(isset($_SESSION['blood'])){
		unset($_SESSION['blood']);
	}
	if(isset($_SESSION['volume'])){
		unset($_SESSION['volume']);
	}

}



// password pattern for organization
$_SESSION['password_pattern']= '/^(?=.*[!@#$%^&*-])(?=.*[0-9])(?=.*[A-Z]).{8,20}$/';

?>
