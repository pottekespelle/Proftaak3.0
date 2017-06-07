<?php
require 'SteamAuthentication/steamauth/steamauth.php';

if(!isset($_SESSION['steamid'])) {
	require ("IndexNotLoggedin.php");
	echo "you must login";
	//loginbutton();

}  else {
	include ('SteamAuthentication/steamauth/userInfo.php');
	echo "you are logged in";
	echo $steamprofile['personaname'];
	logoutbutton();
	require ("index.php");
}

?>