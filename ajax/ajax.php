<?php
session_start();
if($_POST['action'] == 'call_this')
{
	require '../SteamAuthentication/steamauth/SteamConfig.php';
	session_unset();
	session_destroy();
	header('Refresh: 1; url=../'.$steamauth['logoutpage']);
}

if($_POST['action'] == 'call_this2')
{
	require '../SteamAuthentication/steamauth/SteamConfig.php';
	session_unset();
	session_destroy();
	header('Location: ../'.$steamauth['logoutpage']);
	exit;
	}
?>