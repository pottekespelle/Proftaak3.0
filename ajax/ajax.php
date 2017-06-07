<?php
	if($_POST['action'] == 'call_this') {
		require '../SteamAuthentication/steamauth/SteamConfig.php';
		session_unset();
		session_destroy();
		header('Location: '.$steamauth['logoutpage']);
		exit;
	}
?>