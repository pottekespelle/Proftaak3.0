<?php
require 'SteamAuthentication/steamauth/steamauth.php';
include ('SteamAuthentication/steamauth/userInfo.php');

if(isset($_SESSION['steamid'])) {
	require ("index.php");

}  else {
	include ('SteamAuthentication/steamauth/userInfo.php');
    require ("IndexNotLoggedin.php");
}

?>