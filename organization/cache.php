<?php
// cache management

	//set errors
function set_hospital_err($x)
{
	$_SESSION['hospital_err']=$x;
}
function set_user_name_err($x)
{
	$_SESSION['user_name_err']=$x;
}
function set_org_name_err($x)
{
	$_SESSION['org_name_err']=$x;
}
function set_camp_name_err($x)
{
	$_SESSION['camp_name_err']=$x;
}
function set_pname_err($x)
{
	$_SESSION['pname_err']=$x;
}
function set_purpose_err($x)
{
	$_SESSION['purpose_err']=$x;
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
function set_location_err($x)
{
	$_SESSION['location_err']=$x;
}
function set_estimate_err($x)
{
	$_SESSION['estimate_err']=$x;
}
function set_camp_date_err($x)
{
	$_SESSION['camp_date_err']=$x;
}
function set_camp_time_err($x)
{
	$_SESSION['camp_time_err']=$x;
}


	//set variables
function set_camp_name($x)
{
	$_SESSION['camp_name']=$x;
}
function set_location($x)
{
	$_SESSION['location']=$x;
}
function set_estimate($x)
{
	$_SESSION['estimate']=$x;
}
function set_camp_date($x)
{
	$_SESSION['camp_date']=$x;
}	
function set_camp_time($x)
{
	$_SESSION['camp_time']=$x;
}
function set_user_name($x)
{
	$_SESSION['user_name']=$x;
}
function set_org_name($x)
{
	$_SESSION['org_name']=$x;
}
function set_pname($x)
{
	$_SESSION['pname']=$x;
}
function set_purpose($x)
{
	$_SESSION['purpose']=$x;
}
function set_email($x)
{
	$_SESSION['email']=$x;
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
function set_telephone($x)
{
	$_SESSION['telephone']=$x;
}
function set_telephone2($x)
{
	$_SESSION['telephone2']=$x;
}
function set_district($x)
{
	$_SESSION['district']=$x;
}


	//get
function get_user_name_err()
{
	if (isset($_SESSION['user_name_err'])) {
		return $_SESSION['user_name_err'];
	}
}
function get_org_name_err()
{
	if (isset($_SESSION['org_name_err'])) {
		return $_SESSION['org_name_err'];
	}
}
function get_camp_name_err()
{
	if (isset($_SESSION['camp_name_err'])) {
		return $_SESSION['camp_name_err'];
	}
}
function get_camp_date_err()
{
	if (isset($_SESSION['camp_date_err'])) {
		return $_SESSION['camp_date_err'];
	}
}
function get_camp_time_err()
{
	if (isset($_SESSION['camp_time_err'])) {
		return $_SESSION['camp_time_err'];
	}
}
function get_pname_err()
{
	if (isset($_SESSION['pname_err'])) {
		return $_SESSION['pname_err'];
	}
}
function get_purpose_err()
{
	if (isset($_SESSION['purpose_err'])) {
		return $_SESSION['purpose_err'];
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
function get_hospital_err()
{
	if (isset($_SESSION['hospital_err'])) {
		return $_SESSION['hospital_err'];
	}
}
function get_location_err()
{
	if (isset($_SESSION['location_err'])) {
		return $_SESSION['location_err'];
	}
}
function get_estimate_err()
{
	if (isset($_SESSION['estimate_err'])) {
		return $_SESSION['estimate_err'];
	}
}


	// unset all
function unset_cache(){
	if (isset($_SESSION['user_name_err'])) {
		unset($_SESSION['user_name_err']);
	}
		
	if(isset($_SESSION['org_name_err'])){
		unset($_SESSION['org_name_err']);
	}
	if(isset($_SESSION['pname_err'])){
		unset($_SESSION['pname_err']);
	}
	if(isset($_SESSION['purpose_err'])){
		unset($_SESSION['purpose_err']);
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
	if(isset($_SESSION['hospital_err'])){
		unset($_SESSION['hospital_err']);
	}
	if(isset($_SESSION['location_err'])){
		unset($_SESSION['location_err']);
	}
	if(isset($_SESSION['estimate_err'])){
		unset($_SESSION['estimate_err']);
	}


	if (isset($_SESSION['user_name'])) {
		unset($_SESSION['user_name']);
	}
		
	if(isset($_SESSION['org_name'])){
		unset($_SESSION['org_name']);
	}
	if(isset($_SESSION['pname'])){
		unset($_SESSION['pname']);
	}
	if(isset($_SESSION['purpose'])){
		unset($_SESSION['purpose']);
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
	if(isset($_SESSION['location'])){
		unset($_SESSION['location']);
	}
	if(isset($_SESSION['estimate'])){
		unset($_SESSION['estimate']);
	}
}				

?>