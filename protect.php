<?php
require 'SteamAuthentication/steamauth/steamauth.php';

if(isset($_SESSION['steamid'])) {
	include ('SteamAuthentication/steamauth/userInfo.php');
	require ("index.php");
	

}  else {
	
    require ("IndexNotLoggedin.php");
}

?>