<?php

// cache management

	//set
function set_first_name_err($x)
{
	$_SESSION['first_name_err']=$x;
}
function set_last_name_err($x)
{
	$_SESSION['last_name_err']=$x;
}
function set_email_err($x)
{
	$_SESSION['email_err']=$x;
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
function set_telephone_err($x)
{
	$_SESSION['telephone_err']=$x;
}
function set_telephone2_err($x)
{
	$_SESSION['telephone2_err']=$x;
}
function set_district_err($x)
{
	$_SESSION['district_err']=$x;
}
function set_nic_err($x)
{
	$_SESSION['nic_err']=$x;
}
function set_gender_err($x)
{
	$_SESSION['gender_err']=$x;
}
function set_group_err($x)
{
	$_SESSION['group_err']=$x;
}
function set_address_err($x)
{
	$_SESSION['address_err']=$x;
}
function set_hospital_err($x)
{
	$_SESSION['hospital_err']=$x;
}
function set_date_err($x)
{
	$_SESSION['date_err']=$x;
}
function set_time_err($x)
{
	$_SESSION['time_err']=$x;
}

	// set variables
function set_hospital($x)
{
	$_SESSION['hospital']=$x;
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
function set_district($x)
{
	$_SESSION['district']=$x;
}
function set_first_name($x)
{
	$_SESSION['first_name']=$x;
}
function set_last_name($x)
{
	$_SESSION['last_name']=$x;
}
function set_email($x)
{
	$_SESSION['email']=$x;
}	
function set_nic($x)
{
	$_SESSION['dnic']=$x;
}
function set_gender($x)
{
	$_SESSION['gender']=$x;
}
function set_group($x)
{
	$_SESSION['group']=$x;
}
function set_address($x)
{
	$_SESSION['address']=$x;
}
function set_address2($x)
{
	$_SESSION['address2']=$x;
}
function set_telephone($x)
{
	$_SESSION['telephone']=$x;
}
function set_telephone2($x)
{
	$_SESSION['telephone2']=$x;
}


	//get
function get_first_name_err()
{
	if (isset($_SESSION['first_name_err'])) {
		return $_SESSION['first_name_err'];
	}
}
function get_last_name_err()
{
	if (isset($_SESSION['last_name_err'])) {
		return $_SESSION['last_name_err'];
	}
}
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
function get_nic_err()
{
	if (isset($_SESSION['nic_err'])) {
		return $_SESSION['nic_err'];
	}
}
function get_gender_err()
{
	if (isset($_SESSION['gender_err'])) {
		return $_SESSION['gender_err'];
	}
}
function get_group_err()
{
	if (isset($_SESSION['group_err'])) {
		return $_SESSION['group_err'];
	}
}
function get_address_err()
{
	if (isset($_SESSION['address_err'])) {
		return $_SESSION['address_err'];
	}
}
function get_hospital_err()
{
	if (isset($_SESSION['hospital_err'])) {
		return $_SESSION['hospital_err'];
	}
}
function get_date_err()
{
	if (isset($_SESSION['date_err'])) {
		return $_SESSION['date_err'];
	}
}
function get_time_err()
{
	if (isset($_SESSION['time_err'])) {
		return $_SESSION['time_err'];
	}
}

	// unset all
function unset_cache(){

	if (isset($_SESSION['first_name_err'])) {
		unset($_SESSION['first_name_err']);
	}
		
	if(isset($_SESSION['last_name_err'])){
		unset($_SESSION['last_name_err']);
	}

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
	if(isset($_SESSION['nic_err'])){
		unset($_SESSION['nic_err']);
	}
	if(isset($_SESSION['gender_err'])){
		unset($_SESSION['gender_err']);
	}
	if(isset($_SESSION['group_err'])){
		unset($_SESSION['group_err']);
	}
	if(isset($_SESSION['address_err'])){
		unset($_SESSION['address_err']);
	}

	if(isset($_SESSION['hospital_err'])){
		unset($_SESSION['hospital_err']);
	}
	if(isset($_SESSION['date_err'])){
		unset($_SESSION['date_err']);
	}
	if(isset($_SESSION['time_err'])){
		unset($_SESSION['time_err']);
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
	if(isset($_SESSION['hospital'])){
		unset($_SESSION['hospital']);
	}
	if (isset($_SESSION['first_name'])) {
		unset($_SESSION['first_name']);
	}
		
	if(isset($_SESSION['last_name'])){
		unset($_SESSION['last_name']);
	}

	if(isset($_SESSION['email'])){
		unset($_SESSION['email']);
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
	if(isset($_SESSION['dnic'])){
		unset($_SESSION['dnic']);
	}
	if(isset($_SESSION['gender'])){
		unset($_SESSION['gender']);
	}
	if(isset($_SESSION['group'])){
		unset($_SESSION['group']);
	}
	if(isset($_SESSION['address'])){
		unset($_SESSION['address']);
	}
	if(isset($_SESSION['address2'])){
		unset($_SESSION['address2']);
	}

}

// password pattern for organization
$_SESSION['password_pattern']= '/^(?=.*[!@#$%^&*-])(?=.*[0-9])(?=.*[A-Z]).{8,20}$/';

?>