<?php
// cache management

	//set
function set_serch_volume_err($x)
{
	$_SESSION['svolume_err']=$x;
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
function set_first_name_err($x)
{
	$_SESSION['first_name_err']=$x;
}
function set_last_name_err($x)
{
	$_SESSION['last_name_err']=$x;
}
function set_nic_err($x)
{
	$_SESSION['nic_err']=$x;
}
function set_email_err($x)
{
	$_SESSION['email_err']=$x;
}
function set_district_err($x)
{
	$_SESSION['district_err']=$x;
}
function set_blood_type_err($x)
{
	$_SESSION['blood_type_err']=$x;
}
function set_blood_amount_err($x)
{
	$_SESSION['blood_amount_err']=$x;
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

	
	//get
function get_search_volume_err()
{
	if (isset($_SESSION['svolume_err'])) {
		return $_SESSION['svolume_err'];
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
function get_district_err()
{
	if (isset($_SESSION['district_err'])) {
		return $_SESSION['district_err'];
	}
}
function get_blood_type_err()
{
	if (isset($_SESSION['blood_type_err'])) {
		return $_SESSION['blood_type_err'];
	}
}
function get_blood_amount_err()
{
	if (isset($_SESSION['blood_amount_err'])) {
		return $_SESSION['blood_amount_err'];
	}
}
function get_hosname_err()
{
	if (isset($_SESSION['hosname_err'])) {
		return $_SESSION['hosname_err'];
	}
}
function get_telephone2_err()
{
	if (isset($_SESSION['telephone2_err'])) {
		return $_SESSION['telephone2_err'];
	}
}
function get_telephone_err()
{
	if (isset($_SESSION['telephone_err'])) {
		return $_SESSION['telephone_err'];
	}
}

	
	//unset cache

function unset_cache(){
	if (isset($_SESSION['svolume_err'])) {
		unset($_SESSION['svolume_err']);
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
	if (isset($_SESSION['first_name_err'])) {
		unset($_SESSION['first_name_err']);
	}
		
	if(isset($_SESSION['last_name_err'])){
		unset($_SESSION['last_name_err']);
	}
	if(isset($_SESSION['nic_err'])){
		unset($_SESSION['nic_err']);
	}
	if(isset($_SESSION['email_err'])){
		unset($_SESSION['email_err']);
	}
	if(isset($_SESSION['district_err'])){
		unset($_SESSION['district_err']);
	}
	if(isset($_SESSION['blood_type_err'])){
		unset($_SESSION['blood_type_err']);
	}
	if(isset($_SESSION['blood_amount_err'])){
		unset($_SESSION['blood_amount_err']);
	}
	if(isset($_SESSION['hosname_err'])){
		unset($_SESSION['hosname_err']);
	}
	if(isset($_SESSION['telephone_err'])){
		unset($_SESSION['telephone_err']);
	}
	if(isset($_SESSION['telephone2_err'])){
		unset($_SESSION['telephone2_err']);
	}

}	


?>