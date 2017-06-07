<?php 
	//error_reporting(0);
	session_start();
	//made by niels van laarhoven	

	/*if (!isset($_POST['steamid64Input'])) {
		location("location: index.php");
		die();
	}*/

	$api_key = "D0C68A4E5F57A048312D534258583751"; 
	$steamid = " "; 
	$steamidNiels = "76561198312027283";
	$steamidQuinten ='76561198344278706';
	$steamidMax = '76561198068832867';
	$game_id = "730";

	if (isset($_POST['destroy'])) {
		//session_clear();
		session_destroy();
	}
	if (isset($_POST['SteamIdInputButton'])) {
		$_SESSION['steamid64'] = $_POST['steamid64Input'];
	}

	$steamid = $_SESSION['steamid64'];

	//echo "steamiD: ". $steamid. " dat is m ";

	//$CSGOapi_url = "http://api.steampowered.com/ISteamUserStats/GetUserStatsForGame/v0002/?appid=730&key=D0C68A4E5F57A048312D534258583751&steamid=$steamidMax";

	$steamUserStats = "http://api.steampowered.com/ISteamUser/GetPlayerSummaries/v0002/?key=D0C68A4E5F57A048312D534258583751&steamids=$steamid";

	$CSGOapi_url = "http://api.steampowered.com/ISteamUserStats/GetUserStatsForGame/v0002/?appid=730&key=D0C68A4E5F57A048312D534258583751&steamid=$steamid";

	$json = file_get_contents($CSGOapi_url);

	$decoded = json_decode($json);

	$jsonS = file_get_contents($steamUserStats);

	$decodedS = json_decode($jsonS);

	if (!isset($decodedS->response->players[0]->personaname)) {
		echo "is not set the player";
		//die();
	}
/*
	//$getSteamIDurl = "http://api.steampowered.com/ISteamUser/ResolveVanityURL/v0001/?key=D0C68A4E5F57A048312D534258583751&vanityurl=pottekespelle";

	$json = file_get_contents($getSteamIDurl);

	$decoded = json_decode($json);

	print_r($decoded->response->steamid);
*/	
	$values = array();	

	for ($i=0; $i < sizeof($decoded->playerstats->stats); $i++) { 
		if ($decoded->playerstats->stats[$i]->name == "total_shots_fired") {
			$totalShotsFired = $decoded->playerstats->stats[$i]->value;
		}
	
		if ($decoded->playerstats->stats[$i]->name == "total_kills_headshot") {
			$totalHeadshots = $decoded->playerstats->stats[$i]->value;
		}
	 
		if ($decoded->playerstats->stats[$i]->name == "total_mvps") {
			$totalMvps = $decoded->playerstats->stats[$i]->value;
		}

		if ($decoded->playerstats->stats[$i]->name == "total_shots_hit") {
			$totalShotsHit = $decoded->playerstats->stats[$i]->value;
		}

		if ($decoded->playerstats->stats[$i]->name == "total_matches_played") {
			$totalMatchesPlayed = $decoded->playerstats->stats[$i]->value;
		}

		if ($decoded->playerstats->stats[$i]->name == "total_matches_won") {
			$totalMatchWins = $decoded->playerstats->stats[$i]->value;
		}
	}

	$totalkills = $decoded->playerstats->stats[0]->value;
	$totalDeaths = $decoded->playerstats->stats[1]->value;

	$accuracy = $totalShotsHit / $totalShotsFired * 100;
	$KDR = $totalkills / $totalDeaths;
	$WinRco = $totalMatchWins / $totalMatchesPlayed * 100;

	$Seconds = $decoded->playerstats->stats[2]->value;
	$HRs = $Seconds / 3600;

	for ($i=0; $i < sizeof($decoded->playerstats->stats); $i++) { 
		if (!isset($decoded->playerstats->stats[$i]->name)) {
			echo "notset ". $i. " jskldfjsldf";
		}

		if ($decoded->playerstats->stats[$i]->name == "total_rounds_map_cs_assault") {
			$totalRoundsMap_assault = $decoded->playerstats->stats[$i]->value;
		}

		else if ($decoded->playerstats->stats[$i]->name == "total_rounds_map_cs_italy") {
			$totalRoundsMap_italy = $decoded->playerstats->stats[$i]->value;		
		}

		else if ($decoded->playerstats->stats[$i]->name == "total_rounds_map_cs_office") {
			$totalRoundsMap_office = $decoded->playerstats->stats[$i]->value;
		}

		else if ($decoded->playerstats->stats[$i]->name == "total_rounds_map_de_aztec") {
			$totalRoundsMap_aztec = $decoded->playerstats->stats[$i]->value;
		}

		else if ($decoded->playerstats->stats[$i]->name == "total_rounds_map_de_cbble") {
			$totalRoundsMap_cbble = $decoded->playerstats->stats[$i]->value;
		}

		else if ($decoded->playerstats->stats[$i]->name == "total_rounds_map_de_dust2") {
			$totalRoundsMap_dust2 = $decoded->playerstats->stats[$i]->value;
		}

		else if ($decoded->playerstats->stats[$i]->name == "total_rounds_map_de_dust") {
			$totalRoundsMap_dust = $decoded->playerstats->stats[$i]->value;
		}

		else if ($decoded->playerstats->stats[$i]->name == "total_rounds_map_de_inferno") {
			$totalRoundsMap_inferno = $decoded->playerstats->stats[$i]->value;
		}

		else if ($decoded->playerstats->stats[$i]->name == "total_rounds_map_de_nuke") {
			$totalRoundsMap_nuke = $decoded->playerstats->stats[$i]->value;
		}

		else if ($decoded->playerstats->stats[$i]->name == "total_rounds_map_de_train") {
			$totalRoundsMap_train = $decoded->playerstats->stats[$i]->value;
		}

		else if ($decoded->playerstats->stats[$i]->name == "total_rounds_map_de_lake") {
			$totalRoundsMap_lake = $decoded->playerstats->stats[$i]->value;
		}

		else if ($decoded->playerstats->stats[$i]->name == "total_rounds_map_de_safehouse") {
			$totalRoundsMap_safehouse = $decoded->playerstats->stats[$i]->value;
		}

		else if ($decoded->playerstats->stats[$i]->name == "total_rounds_map_de_bank") {
			$totalRoundsMap_bank = $decoded->playerstats->stats[$i]->value;
		}

		else if ($decoded->playerstats->stats[$i]->name == "total_rounds_map_ar_shoots") {
			$totalRoundsMap_shoots = $decoded->playerstats->stats[$i]->value;
		}

		else if ($decoded->playerstats->stats[$i]->name == "total_rounds_map_ar_baggage") {
			$totalRoundsMap_baggage = $decoded->playerstats->stats[$i]->value;
		}

		else if ($decoded->playerstats->stats[$i]->name == "total_rounds_map_ar_monastery") {
			$totalRoundsMap_monastery = $decoded->playerstats->stats[$i]->value;
		}

		else if ($decoded->playerstats->stats[$i]->name == "total_rounds_map_de_vertigo") {
			$totalRoundsMap_vertigo = $decoded->playerstats->stats[$i]->value;
		}
	}

	for ($i=0; $i < sizeof($decoded->playerstats->stats); $i++) { 
		$witchWeaponInArray = $decoded->playerstats->stats[$i]->name;

		switch ($witchWeaponInArray) {
			case 'total_kills_knife':
				$totalKills_Knife = $decoded->playerstats->stats[$i]->value;	
				break;

			case 'total_kills_hegrenade':
				$totalKills_Hegranade = $decoded->playerstats->stats[$i]->value;	
				break;

			case 'total_kills_glock':
				$totalKills_Glock = $decoded->playerstats->stats[$i]->value;	
				break;	
			
			case 'total_kills_deagle':
				$totalKills_Deagle = $decoded->playerstats->stats[$i]->value;	
				break;
				
			case 'total_kills_fiveseven':
				$totalKills_Fivesever = $decoded->playerstats->stats[$i]->value;	
				break;
				
			case 'total_kills_xm1014':
				$totalKills_Xm1014 = $decoded->playerstats->stats[$i]->value;	
				break;
				
			case 'total_kills_mac10':
				$totalKills_Mac10 = $decoded->playerstats->stats[$i]->value;	
				break;
				
			case 'total_kills_ump45':
				$totalKills_Ump45 = $decoded->playerstats->stats[$i]->value;	
				break;

			case 'total_kills_p90':
				$totalKills_P90 = $decoded->playerstats->stats[$i]->value;
				break;

			case 'total_kills_awp':
				$totalKills_Awp = $decoded->playerstats->stats[$i]->value;
				break;
				
			case 'total_kills_ak47':
				$totalKills_Ak47 = $decoded->playerstats->stats[$i]->value;
				break;
				
			case 'total_kills_aug':
				$totalKills_Aug = $decoded->playerstats->stats[$i]->value;
				break;
			
			case 'total_kills_famas':
				$totalKills_Famas = $decoded->playerstats->stats[$i]->value;
				break;

			case 'total_kills_g3sg1':
				$totalKills_G3sg1 = $decoded->playerstats->stats[$i]->value;
				break;
				
			case 'total_kills_m249':
				$totalKills_M249 = $decoded->playerstats->stats[$i]->value;
				break;
				
			case 'total_kills_hkp2000':
				$totalKills_P2000 = $decoded->playerstats->stats[$i]->value;
				break;
				
			case 'total_kills_p250':
				$totalKills_P250 = $decoded->playerstats->stats[$i]->value;
				break;
				
			case 'total_kills_sg556':
				$totalKills_Sg556 = $decoded->playerstats->stats[$i]->value;
				break;
				
			case 'total_kills_scar20':
				$totalKills_Scar20 = $decoded->playerstats->stats[$i]->value;
				break;
				
			case 'total_kills_ssg08':
				$totalKills_Ssg08 = $decoded->playerstats->stats[$i]->value;
				break;
				
			case 'total_kills_mp7':
				$totalKills_Mp7 = $decoded->playerstats->stats[$i]->value;
				break;
				
			case 'total_kills_mp9':
				$totalKills_mp9 = $decoded->playerstats->stats[$i]->value;
				break;

			case 'total_kills_nova':
				$totalKills_Nova = $decoded->playerstats->stats[$i]->value;
				break;
				
			case 'total_kills_negev':
				$totalkills_Negev = $decoded->playerstats->stats[$i]->value;
				break;
				
			case 'total_kills_sawedoff':
				$totalKills_Saweoff = $decoded->playerstats->stats[$i]->value;
				break;
				
			case 'total_kills_bizon':
				$totalKills_Bizon = $decoded->playerstats->stats[$i]->value;
				break;
				
			case 'total_kills_tec9':
				$totalKills_Teg9 = $decoded->playerstats->stats[$i]->value;
				break;
			
			case 'total_kills_mag7':
				$totalKills_Mac7 = $decoded->playerstats->stats[$i]->value;
				break;

			case 'total_kills_m4a1':
				$totalKills_M4a1 = $decoded->playerstats->stats[$i]->value;
				break;
				
			case 'total_kills_galilar':
				$totalKills_Galilar = $decoded->playerstats->stats[$i]->value;
				break;
				
			case 'total_kills_molotov':
				$totalKills_Molotov = $decoded->playerstats->stats[$i]->value;
				break;
				
			case 'total_kills_taser':
				$totalKills_Taser = $decoded->playerstats->stats[$i]->value;
				break;																													

			default:
				# code...
				break;
		}

	}
	
	$Highest = max($totalRoundsMap_assault , $totalRoundsMap_italy , $totalRoundsMap_office , $totalRoundsMap_aztec , $totalRoundsMap_cbble , $totalRoundsMap_dust2 , $totalRoundsMap_dust , $totalRoundsMap_inferno , $totalRoundsMap_nuke , $totalRoundsMap_train ,$totalRoundsMap_lake , $totalRoundsMap_safehouse , $totalRoundsMap_bank , $totalRoundsMap_shoots , $totalRoundsMap_baggage ,$totalRoundsMap_monastery , $totalRoundsMap_vertigo);

	$highestgun = max($totalKills_Knife , $totalKills_Taser , $totalKills_Molotov , $totalKills_Galilar , $totalKills_M4a1 , $totalKills_Mac7 , $totalKills_Teg9 , $totalKills_Bizon , $totalKills_Saweoff , $totalKills_Nova , $totalKills_Mp7 , $totalKills_Ssg08 , $totalKills_Scar20 , $totalKills_Sg556 , $totalKills_P250 , $totalKills_P2000 , $totalKills_M249 , $totalKills_G3sg1 , $totalKills_Famas , $totalKills_Aug , $totalKills_Ak47 , $totalKills_Awp , $totalKills_P90 , $totalKills_Ump45 , $totalKills_Mac10 , $totalKills_Xm1014 , $totalKills_Fivesever , $totalKills_Deagle , $totalKills_Glock , $totalKills_Hegranade , $totalKills_mp9 , $totalkills_Negev);




	for ($i=0; $i < sizeof($decoded->playerstats->stats); $i++) { 
		if ($decoded->playerstats->stats[$i]->value == $Highest) {
			$MostPlayed = $decoded->playerstats->stats[$i]->name;
		}
	}

	for ($i=0; $i < sizeof($decoded->playerstats->stats); $i++) { 
		if ($decoded->playerstats->stats[$i]->value == $highestgun) {
			$MostPlayedGun = $decoded->playerstats->stats[$i]->name;
		}
	}

	switch ($MostPlayed) {
			case 'total_rounds_map_cs_assault':
				$MostplayedMap = "assault";
				break;

			case 'total_rounds_map_cs_italy':
				$MostplayedMap = "italy";
				break;

			case 'total_rounds_map_cs_office':
				$MostplayedMap = "assault";
				break;

			case 'total_rounds_map_de_aztec':
				$MostplayedMap = "aztec";
				break;

			case 'total_rounds_map_de_cbble':
				$MostplayedMap = "cbble";
				break;

			case 'total_rounds_map_de_dust2':
				$MostplayedMap = "dust2";
				break;

			case 'total_rounds_map_de_dust':
				$MostplayedMap = "dust";
				break;

			case 'total_rounds_map_de_inferno':
				$MostplayedMap = "inferno";
				break;

			case 'total_rounds_map_de_nuke':
				$MostplayedMap = "nuke";
				break;

			case 'total_rounds_map_de_train':
				$MostplayedMap = "train";
				break;

			case 'total_rounds_map_de_lake':
				$MostplayedMap = "lake";
				break;

			case 'total_rounds_map_de_safehouse':
				$MostplayedMap = "safehouse";
				break;

			case 'total_rounds_map_de_bank':
				$MostplayedMap = "bank";
				break;

			case 'total_rounds_map_ar_shoots':
				$MostplayedMap = "shoots";
				break;

			case 'total_rounds_map_ar_baggage':
				$MostplayedMap = "baggage";
				break;

			case 'total_rounds_map_ar_monastery':
				$MostplayedMap = "monastery";
				break;

			case 'total_rounds_map_de_vertigo':
				$MostplayedMap = "vertigo";
				break;
		
		default:
			
			break;
	}

	switch ($MostPlayedGun) {
		case 'total_kills_knife':
			$FavGun = "knife";
			$FavGunIcon = "http://vignette2.wikia.nocookie.net/cswikia/images/4/4b/Knife_ct_hud_outline_csgo.png/revision/latest/scale-to-width-down/400";
			break;

		case 'total_kills_taser':
			$FavGun = "Zeus";
			$FavGunIcon = "";
			break;
			
		case 'total_kills_molotov':
			$FavGun = "molotov";
			$FavGunIcon = "http://vignette3.wikia.nocookie.net/cswikia/images/f/fc/Molotov_hud_csgo.png/revision/latest/scale-to-width-down/400";
			break;
			
		case 'total_kills_galilar':
			$FavGun = "galil";
			$FavGunIcon = "http://vignette1.wikia.nocookie.net/cswikia/images/4/4a/Galilar_hud.png/revision/latest/scale-to-width-down/400";
			break;
			
		case 'total_kills_m4a1':
			$FavGun = "m4a1";
			$FavGunIcon = "http://vignette2.wikia.nocookie.net/cswikia/images/d/d9/M4a4_hud.png/revision/latest/scale-to-width-down/400";
			break;
			
		case 'total_kills_mag7':
			$FavGun = "mag7";
			$FavGunIcon = "http://vignette2.wikia.nocookie.net/cswikia/images/2/2e/Mag7_hud_csgo.png/revision/latest/scale-to-width-down/400";
			break;
			
		case 'total_kills_tec9':
			$FavGun = "teg9";
			$FavGunIcon = "http://vignette3.wikia.nocookie.net/cswikia/images/5/55/Tec9_hud_csgo.png/revision/latest/scale-to-width-down/400";
			break;
			
		case 'total_kills_bizon':
			$FavGun = "bp-bizon";
			$FavGunIcon = "http://vignette1.wikia.nocookie.net/cswikia/images/d/d5/Bizon_hud_csgo.png/revision/latest/scale-to-width-down/400";
			break;
			
		case 'total_kills_sawedoff':
			$FavGun = "sawedoff";
			$FavGunIcon = "http://vignette1.wikia.nocookie.net/cswikia/images/9/94/Sawedoff_hud_csgo.png/revision/latest/scale-to-width-down/400";
			break;
			
		case 'total_kills_negev':
			$FavGun = "negev";
			$FavGunIcon = "http://vignette2.wikia.nocookie.net/cswikia/images/b/be/Negev_hud.png/revision/latest/scale-to-width-down/400";
			break;
			
		case 'total_kills_nova':
			$FavGun = "nova";
			$FavGunIcon = "http://vignette4.wikia.nocookie.net/cswikia/images/c/c8/Nova_hud_csgo.png/revision/latest/scale-to-width-down/400";
			break;
			
		case 'total_kills_mp9':
			$FavGun = "mp9";
			$FavGunIcon = "http://vignette2.wikia.nocookie.net/cswikia/images/1/14/Mp9_hud_csgo.png/revision/latest/scale-to-width-down/400";
			break;
			
		case 'total_kills_mp7':
			$FavGun = "mp7";
			$FavGunIcon = "http://vignette4.wikia.nocookie.net/cswikia/images/8/8d/Mp7_hud_csgo.png/revision/latest/scale-to-width-down/400";
			break;
			
		case 'total_kills_ssg08':
			$FavGun = "ssg08";
			$FavGunIcon = "http://vignette4.wikia.nocookie.net/cswikia/images/3/3c/Ssg08_hud_csgo.png/revision/latest/scale-to-width-down/400";
			break;
			
		case 'total_kills_scar20':
			$FavGun = "scar20";
			$FavGunIcon = "http://vignette4.wikia.nocookie.net/cswikia/images/c/c9/Scar20_hud_csgo.png/revision/latest/scale-to-width-down/400";
			break;
			
		case 'total_kills_sg556':
			$FavGun = "sg556";
			$FavGunIcon = "http://vignette1.wikia.nocookie.net/cswikia/images/9/9b/Sg556_hud_csgo.png/revision/latest/scale-to-width-down/400";
			break;
			
		case 'total_kills_p250':
			$FavGun = "p250";
			$FavGunIcon = "http://vignette2.wikia.nocookie.net/cswikia/images/5/57/P250_hud.png/revision/latest/scale-to-width-down/400";
			break;
			
		case 'total_kills_hkp2000':
			$FavGun = "p2000";
			$FavGunIcon = "http://vignette1.wikia.nocookie.net/cswikia/images/6/67/Hkp2000_hud.png/revision/latest/scale-to-width-down/400";
			break;
			
		case 'total_kills_m249':
			$FavGun = "m249";
			$FavGunIcon = "http://vignette2.wikia.nocookie.net/cswikia/images/e/ea/M249_hud_csgo.png/revision/latest/scale-to-width-down/400";
			break;
			
		case 'total_kills_g3sg1':
			$FavGun = "g3sg1";
			$FavGunIcon = "http://vignette4.wikia.nocookie.net/cswikia/images/4/4a/G3sg1_hud_csgo.png/revision/latest/scale-to-width-down/400";
			break;
			
		case 'total_kills_famas':
			$FavGun = "famas";
			$FavGunIcon = "http://vignette2.wikia.nocookie.net/cswikia/images/8/8f/Famas_hud_csgo.png/revision/latest/scale-to-width-down/400";
			break;

		case 'total_kills_aug':
			$FavGun = "aug";
			$FavGunIcon = "http://vignette2.wikia.nocookie.net/cswikia/images/6/6f/Aug_hud_csgo.png/revision/latest/scale-to-width-down/400";
			break;
			
		case 'total_kills_ak47':
			$FavGun = "ak47";
			$FavGunIcon = "http://vignette1.wikia.nocookie.net/cswikia/images/7/76/Ak47_hud_csgo.png/revision/latest/scale-to-width-down/400";
			break;
			
		case 'total_kills_awp':
			$FavGun = "awp";
			$FavGunIcon = "http://vignette3.wikia.nocookie.net/cswikia/images/e/eb/Awp_hud_csgo.png/revision/latest/scale-to-width-down/400";
			break;
			
		case 'total_kills_p90':
			$FavGun = "p90";
			$FavGunIcon = "http://vignette3.wikia.nocookie.net/cswikia/images/b/bd/P90_hud_csgo.png/revision/latest/scale-to-width-down/400";
			break;

		case 'total_kills_ump45':
			$FavGun = "ump45";
			$FavGunIcon = "http://vignette3.wikia.nocookie.net/cswikia/images/c/c4/Ump45_hud_csgo.png/revision/latest/scale-to-width-down/400";
			break;
			
		case 'total_kills_mac10':
			$FavGun = "mac10";
			$FavGunIcon = "http://vignette2.wikia.nocookie.net/cswikia/images/f/f7/Mac10_hud_csgo.png/revision/latest/scale-to-width-down/400";
			break;
			
		case 'total_kills_xm1014':
			$FavGun = "mx1014";
			$FavGunIcon = "http://vignette2.wikia.nocookie.net/cswikia/images/a/ad/Xm1014_hud_csgo.png/revision/latest/scale-to-width-down/400";
			break;
			
		case 'total_kills_fiveseven':
			$FavGun = "fiveseven";
			$FavGunIcon = "http://vignette2.wikia.nocookie.net/cswikia/images/9/9c/Fiveseven_hud_csgo.png/revision/latest/scale-to-width-down/400";
			break;
			
		case 'total_kills_deagle':
			$FavGun = "deagle";
			$FavGunIcon = "http://vignette2.wikia.nocookie.net/cswikia/images/7/7d/Deagle_hud_go.png/revision/latest/scale-to-width-down/400";
			break;
			
		case 'total_kills_glock':
			$FavGun = "glock";
			$FavGunIcon = "http://vignette2.wikia.nocookie.net/cswikia/images/3/33/Glock18_hud_csgo.png/revision/latest/scale-to-width-down/400";
			break;

		case 'total_kills_hegrenade':
			$FavGun = "granade";
			$FavGunIcon = "http://vignette1.wikia.nocookie.net/cswikia/images/6/60/Ammo_hegrenade_css.png/revision/latest/scale-to-width-down/400";
			break;
			
		default:
			# code...
			break;
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>stats</title>
	<link rel="stylesheet" type="text/css" href="http://meyerweb.com/eric/tools/css/reset/reset.css">
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	<link rel="stylesheet" type="text/css" href="../css/statsStyle.css">
	
	<script type="text/javascript" src="../js/main.js"></script>
</head>
<body>
<!-- <pre> 
	<?php 
		//print_r($decodedS);
	?>
		
</pre> -->
<div>
	<div class="header">
		<form method="post" action="../index.php">
	        <a href="../protect.php" name="destroy"><img src="../img/logo.png" class="logo"></a>
	        <a><img src="../img/login.png" class="login"></a>
        </form>
    </div>
    
    <div class="stats-Container">
    <div class="StatsOffName">
		<label id="StatsOffNameL" style="font-size: 60px; color: #008aff;  text-shadow: -1px 0 black, 0 1px black, 1px 0 black, 0 -1px black;"><?php echo $decodedS->response->players[0]->personaname; ?></label>	
	</div>	
    	<div id="overall-stats-container">
    		<section class="player-stats-summary"> 
    		<div class="columns"> 

    			<ul class="column first"> 
    				<li class="kills"> 
    					<h4>Kills</h4> 
    					<div class="value"> 
    						<p class="current"><?php
    						echo $totalkills;
    						?></p> 
    					</div> 
					</li> 

					<li class="time_played" data-tip="Gameplay time only"> 
						<h4>Time played</h4> 
						<div class="value"> 
						<p class="current long"><?php
    						echo (round($HRs))." Hr.";
    						?></p> 
						</div> 
					</li> 
				</ul> 

				<div class="chart kdr" data-tip="" data-kills="5718" data-deaths="5792"> 
					<h4>K/D Ratio</h4> 
					<p class="current">

					<?php echo(round($KDR,2));?>

					</p> 
					<!-- <div data-tip-content="" class="chart-more"> 
						<div class="column"> 
							<h5>Kills</h5> 
							<p class="kills">5718</p> 
						</div> 

						<div class="column"> 
							<h5>Deaths</h5> 
							<p class="deaths">5792</p> 
						</div> 
					</div>  -->
				</div> 

				<ul class="column"> 
					<li class="accuracy">  
						<h4>Accuracy</h4> 
						<div class="value"> 
						<p class="current">
						<?php 
							echo(round($accuracy,1)). "%";
						?>

						</p> 
						</div> 
					</li> 

					<li class="headshot_percentage">
						<h4>Headshot %</h4> 
						<div class="value"> 
						<p class="current">
							<?php 
							echo round(($totalHeadshots / $totalkills * 100)). "%";
							?>
						</p> 
						</div> 
					</li> 
				</ul> 

				<ul class="column last"> 
					<li class="mvps"> 
						<h4>MVP</h4> 
						<div class="value"> 
						<p class="current">
						<?php 
							echo $totalMvps;
						?>
						</p> 
						</div> 
					</li> 

					<li class="win_perc"> 
						<h4>Win %</h4> 
						<div class="value"> 
						<p class="current">
						<?php  
							echo(round($WinRco));
						?>
						</p> 
						</div> 
					</li> 
				</ul> 
			</div> 
			</section>
    	</div>

    	<div id="stats-maps">
    		<!-- <label>MAPS</label> -->
    		<h1>favorite map</h1>

    		<div id="stats-maps-mostPlayed">
    			<img src="../img/<?php echo $MostplayedMap; ?>_map_ForStats.jpg">
    		</div>

    		<div id="stats-maps-index">
    			<table>

					<tr>
						<td>1 <?php echo $MostplayedMap;?>  </td>
					</tr>
	
    			</table>
    		</div>
    		
    	</div>

    	<div id="stats-guns">
    		<h1>favorite gun</h1>

    		<div id="stats-maps-mostPlayed">
    			<img src="<?php echo $FavGunIcon; ?>">
    		</div>

    		<div id="stats-maps-index">
    			<table>

	    			<tr>
	    				<td>1 <?php echo $FavGun; ?></td>
	    			</tr>
    			
    			</table>
    		</div>
    	</div>
    </div>
<script src="https://dff2h0hbfv6w4.cloudfront.net/scripts/embed-stanzacal-v1.js"></script>
</div>
	<div class="footer">
		<!-- left copyright right made by -->
		<label class="copyright-footer">Copyright 2017 &copy; CSHUB</label>
		<label class="madeby-footer">Made by: Niels v. Laarhoven</label>
	</div>
</body>
</html>