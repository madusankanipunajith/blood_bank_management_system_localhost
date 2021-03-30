<?php

// cache management

	//set functions
function set_first_name_err($x)
{
	$_SESSION['first_name_err']=$x;
}
function set_last_name_err($x)
{
	$_SESSION['last_name_err']=$x;
}
function set_hospital_err($x)
{
	$_SESSION['hospital_err']=$x;
}
function set_nic_err($x)
{
	$_SESSION['nic_err']=$x;
}
function set_email_err($x)
{
	$_SESSION['email_err']=$x;
}
function set_password_err($x)
{
	$_SESSION['password_err']=$x;
}
function set_confirm_err($x)
{
	$_SESSION['confirm_err']=$x;
}
function set_telephone_err($x)
{
	$_SESSION['telephone_err']=$x;
}
function set_district_err($x)
{
	$_SESSION['district_err']=$x;
}
function set_cap_err($x)
{
	$_SESSION['cap_err']=$x;
}
function set_address_err($x)
{
	$_SESSION['address_err']=$x;
}
function set_telephone2_err($x)
{
	$_SESSION['telephone2_err']=$x;
}
function set_setting_email_err($x)
{
	$_SESSION['setting_email_err']=$x;
}
function set_setting_user_err($x)
{
	$_SESSION['setting_user_err']=$x;
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

	// set variables

function set_first_name($x)
{
	$_SESSION['first_name']=$x;
}
function set_last_name($x)
{
	$_SESSION['last_name']=$x;
}
function set_hospital($x)
{
	$_SESSION['hospital']=$x;
}
function set_nic($x)
{
	$_SESSION['nic']=$x;
}
function set_email($x)
{
	$_SESSION['email']=$x;
}
function set_password($x)
{
	$_SESSION['password']=$x;
}
function set_confirm($x)
{
	$_SESSION['confirm']=$x;
}
function set_telephone($x)
{
	$_SESSION['telephone']=$x;
}
function set_district($x)
{
	$_SESSION['district']=$x;
}
function set_cap($x)
{
	$_SESSION['cap']=$x;
}
function set_address($x)
{
	$_SESSION['address']=$x;
}
function set_telephone2($x)
{
	$_SESSION['telephone2']=$x;
}
function set_setting_email($x)
{
	$_SESSION['setting_email']=$x;
}
function set_setting_user($x)
{
	$_SESSION['setting_user']=$x;
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


	//get functions
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
function get_hospital_err()
{
	if (isset($_SESSION['hospital_err'])) {
		return $_SESSION['hospital_err'];
	}
}
function get_nic_err()
{
	if (isset($_SESSION['nic_err'])) {
		return $_SESSION['nic_err'];
	}
}
function get_email_err()
{
	if (isset($_SESSION['email_err'])) {
		return $_SESSION['email_err'];
	}
}
function get_password_err()
{
	if (isset($_SESSION['password_err'])) {
		return $_SESSION['password_err'];
	}
}
function get_confirm_err()
{
	if (isset($_SESSION['confirm_err'])) {
		return $_SESSION['confirm_err'];
	}
}	
function get_telephone_err()
{
	if (isset($_SESSION['telephone_err'])) {
		return $_SESSION['telephone_err'];
	}
}
function get_district_err()
{
	if (isset($_SESSION['district_err'])) {
		return $_SESSION['district_err'];
	}
}
function get_cap_err()
{
	if (isset($_SESSION['cap_err'])) {
		return $_SESSION['cap_err'];
	}
}	
function get_address_err()
{
	if (isset($_SESSION['address_err'])) {
		return $_SESSION['address_err'];
	}
}
function get_telephone2_err()
{
	if (isset($_SESSION['telephone2_err'])) {
		return $_SESSION['telephone2_err'];
	}
}
function get_setting_email_err()
{
	if (isset($_SESSION['setting_email_err'])) {
		return $_SESSION['setting_email_err'];
	}
}
function get_setting_user_err()
{
	if (isset($_SESSION['setting_user_err'])) {
		return $_SESSION['setting_user_err'];
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




	// unset all
function unset_cache(){
	// errors
	if (isset($_SESSION['first_name_err'])) {
		unset($_SESSION['first_name_err']);
	}
		
	if(isset($_SESSION['last_name_err'])){
		unset($_SESSION['last_name_err']);
	}
	if(isset($_SESSION['hospital_err'])){
		unset($_SESSION['hospital_err']);
	}
	if(isset($_SESSION['nic_err'])){
		unset($_SESSION['nic_err']);
	}
	if(isset($_SESSION['email_err'])){
		unset($_SESSION['email_err']);
	}
	if(isset($_SESSION['password_err'])){
		unset($_SESSION['password_err']);
	}
	if(isset($_SESSION['confirm_err'])){
		unset($_SESSION['confirm_err']);
	}
	if(isset($_SESSION['telephone_err'])){
		unset($_SESSION['telephone_err']);
	}
	if(isset($_SESSION['district_err'])){
		unset($_SESSION['district_err']);
	}
	if(isset($_SESSION['cap_err'])){
		unset($_SESSION['cap_err']);
	}
	if(isset($_SESSION['address_err'])){
		unset($_SESSION['address_err']);
	}
	if(isset($_SESSION['telephone2_err'])){
		unset($_SESSION['telephone2_err']);
	}
	if(isset($_SESSION['setting_email_err'])){
		unset($_SESSION['setting_email_err']);
	}
	if(isset($_SESSION['setting_user_err'])){
		unset($_SESSION['setting_user_err']);
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

	// variables
	if (isset($_SESSION['first_name'])) {
		unset($_SESSION['first_name']);
	}
		
	if(isset($_SESSION['last_name'])){
		unset($_SESSION['last_name']);
	}
	if(isset($_SESSION['hospital'])){
		unset($_SESSION['hospital']);
	}
	if(isset($_SESSION['nic'])){
		unset($_SESSION['nic']);
	}
	if(isset($_SESSION['email'])){
		unset($_SESSION['email']);
	}
	if(isset($_SESSION['password'])){
		unset($_SESSION['password']);
	}
	if(isset($_SESSION['confirm'])){
		unset($_SESSION['confirm']);
	}
	if(isset($_SESSION['telephone'])){
		unset($_SESSION['telephone']);
	}
	if(isset($_SESSION['district'])){
		unset($_SESSION['district']);
	}
	if(isset($_SESSION['cap'])){
		unset($_SESSION['cap']);
	}
	if(isset($_SESSION['address'])){
		unset($_SESSION['address']);
	}
	if(isset($_SESSION['telephone2'])){
		unset($_SESSION['telephone2']);
	}
	if(isset($_SESSION['setting_email'])){
		unset($_SESSION['setting_email']);
	}
	if(isset($_SESSION['setting_user'])){
		unset($_SESSION['setting_user']);
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
	
}

?>