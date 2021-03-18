<?php
// cache management

	//set
function set_login_nic($x)
{
	$_SESSION['login_nic']= $x;
}
function set_login_user_name($x)
{
	$_SESSION['login_user_name']= $x;
}
function set_password_err($x)
{
	$_SESSION['password_err']= $x;
}
function set_login_nic_err($x)
{
	$_SESSION['login_nic_err']= $x;
}
function set_login_user_name_err($x)
{
	$_SESSION['login_user_name_err']= $x;
}
function set_pin_err($x)
{
	$_SESSION['pin_err']=$x;
}


	//get
function get_password_err()
{
	if (isset($_SESSION['password_err'])) {
		return $_SESSION['password_err'];
	}
}
function get_login_nic_err()
{
	if (isset($_SESSION['login_nic_err'])) {
		return $_SESSION['login_nic_err'];
	}
}
function get_login_user_name_err()
{
	if (isset($_SESSION['login_user_name_err'])) {
		return $_SESSION['login_user_name_err'];
	}
}
function get_pin_err()
{
	if (isset($_SESSION['pin_err'])) {
		return $_SESSION['pin_err'];
	}
}

function unset_cache()
{
	if (isset($_SESSION['password_err'])) {
		unset($_SESSION['password_err']);
	}
	if (isset($_SESSION['login_nic_err'])) {
		unset($_SESSION['login_nic_err']);
	}
	if (isset($_SESSION['login_user_name_err'])) {
		unset($_SESSION['login_user_name_err']);
	}
	if (isset($_SESSION['pin_err'])) {
		unset($_SESSION['pin_err']);
	}
	if (isset($_SESSION['login_nic'])) {
		unset($_SESSION['login_nic']);
	}
	if (isset($_SESSION['login_user_name'])) {
		unset($_SESSION['login_user_name']);
	}

}



?>