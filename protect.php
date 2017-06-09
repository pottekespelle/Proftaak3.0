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

<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
<script type="text/javascript" src="js/main.js"></script>