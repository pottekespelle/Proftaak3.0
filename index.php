<?php
require 'SteamAuthentication/steamauth/steamauth.php';

if(!isset($_SESSION['steamid']))
{
	require ("IndexNotLoggedin.php");
}

else {
	include ('SteamAuthentication/steamauth/userInfo.php');
	require ("IndexLoggedin.php");
}

?>

