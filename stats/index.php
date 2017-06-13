<?php 
	require ('../SteamAuthentication/steamauth/steamauth.php');
	include ('../SteamAuthentication/steamauth/userInfo.php');
	
	if ($_POST['steamid64Input'] == "") {
		header("location: ../protect.php");
	}

	echo ($_POST['steamid64Input']);

	error_reporting(0);
	//session_start();
	//made by niels van laarhoven	

	/*if (!isset($_POST['steamid64Input'])) {
		location("location: index.php");
		die();
	}*/

	// if ($_POST['SteamIdInputButton'] == 0) {
	// 	echo "nothing in input";
	// 	header('location: ../protect.php');
	// }

	$api_key = "D0C68A4E5F57A048312D534258583751"; 
	$steamid = " "; 
	$steamidNiels = "76561198312027283";
	$steamidQuinten ='76561198344278706';
	$steamidMax = '76561198068832867';
	$game_id = "730";

	if ($_GET['$id'] == 2) {
		$steamid = $steamprofile['steamid'];
	}

	else{
		if (isset($_POST['SteamIdInputButton'])) {
		$_SESSION['steamid64'] = $_POST['steamid64Input'];
	}

		$steamid = $_SESSION['steamid64'];
	}



	

	if (isset($_POST['destroy'])) {
		//session_clear();
		session_destroy();
	}
	

	//echo "steamiD: ". $steamid. " dat is m ";

	//$CSGOapi_url = "http://api.steampowered.com/ISteamUserStats/GetUserStatsForGame/v0002/?appid=730&key=D0C68A4E5F57A048312D534258583751&steamid=$steamidMax";

	$steamUserStats = "http://api.steampowered.com/ISteamUser/GetPlayerSummaries/v0002/?key=D0C68A4E5F57A048312D534258583751&steamids=$steamid";
	

	$CSGOapi_url = "http://api.steampowered.com/ISteamUserStats/GetUserStatsForGame/v0002/?appid=730&key=D0C68A4E5F57A048312D534258583751&steamid=$steamid";

	$json = file_get_contents($CSGOapi_url);

	$decoded = json_decode($json);

	$jsonS = file_get_contents($steamUserStats);

	$decodedS = json_decode($jsonS);

	if (!isset($decodedS->response->players[0]->personaname)) {
		}

	else
	{
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
				$MostplayedMap = "Assault";
				$FavMapIcon = "https://vignette1.wikia.nocookie.net/cswikia/images/0/00/Cs_assault_go.png/revision/latest/scale-to-width-down/250?cb=20140819095651";
				break;

			case 'total_rounds_map_cs_italy':
				$MostplayedMap = "Italy";
				$FavMapIcon = "https://vignette2.wikia.nocookie.net/cswikia/images/2/2c/Cs_italy_csgo.png/revision/latest/scale-to-width-down/250?cb=20140819100829";
				break;

			case 'total_rounds_map_cs_office':
				$MostplayedMap = "Office";
				$FavMapIcon = "https://vignette1.wikia.nocookie.net/cswikia/images/f/f7/Csgo-cs-office.png/revision/latest/scale-to-width-down/250?cb=20140820132335";
				break;

			case 'total_rounds_map_de_aztec':
				$MostplayedMap = "Aztec ♥";
				$FavMapIcon = "https://vignette1.wikia.nocookie.net/cswikia/images/f/fd/Csgo-de-aztec.png/revision/latest/scale-to-width-down/250?cb=20140820131837";
				break;

			case 'total_rounds_map_de_cbble':
				$MostplayedMap = "Cobblestone";
				$FavMapIcon = "https://vignette3.wikia.nocookie.net/cswikia/images/e/ed/Csgo-de-cbble.png/revision/latest/scale-to-width-down/250?cb=20140820131432";
				break;

			case 'total_rounds_map_de_dust2':
				$MostplayedMap = "Dust 2";
				$FavMapIcon = "https://vignette1.wikia.nocookie.net/cswikia/images/6/6f/Csgo-de-dust2.png/revision/latest/scale-to-width-down/250?cb=20140820131233";
				break;

			case 'total_rounds_map_de_dust':
				$MostplayedMap = "Dust";
				$FavMapIcon = "https://vignette1.wikia.nocookie.net/cswikia/images/6/6d/Csgo-de-dust.png/revision/latest/scale-to-width-down/250?cb=20140820131343";
				break;

			case 'total_rounds_map_de_inferno':
				$MostplayedMap = "Inferno";
				$FavMapIcon = "https://vignette3.wikia.nocookie.net/cswikia/images/f/f0/Inferno.jpg/revision/latest/scale-to-width-down/250?cb=20161014013320";
				break;

			case 'total_rounds_map_de_nuke':
				$MostplayedMap = "Nuke";
				$FavMapIcon = "https://vignette3.wikia.nocookie.net/cswikia/images/e/e5/Csgo-nuke-2016feb17.png/revision/latest/scale-to-width-down/250?cb=20160219144345";
				break;

			case 'total_rounds_map_de_train':
				$MostplayedMap = "Train";
				$FavMapIcon = "https://vignette1.wikia.nocookie.net/cswikia/images/4/4a/De_train_thumbnail.png/revision/latest/scale-to-width-down/250?cb=20160110213749";
				break;

			case 'total_rounds_map_de_lake':
				$MostplayedMap = "Lake";
				$FavMapIcon = "https://vignette2.wikia.nocookie.net/cswikia/images/0/08/Csgo-de-lake.png/revision/latest/scale-to-width-down/250?cb=20140820130934";
				break;

			case 'total_rounds_map_de_safehouse':
				$MostplayedMap = "Safehouse";
				$FavMapIcon = "https://vignette3.wikia.nocookie.net/cswikia/images/2/27/Csgo-de-safehouse.png/revision/latest/scale-to-width-down/250?cb=20140820130431";
				break;

			case 'total_rounds_map_de_bank':
				$MostplayedMap = "Bank";
				$FavMapIcon = "https://vignette3.wikia.nocookie.net/cswikia/images/a/a9/Csgo-de-bank.png/revision/latest/scale-to-width-down/250?cb=20140820131729";
				break;

			case 'total_rounds_map_ar_shoots':
				$MostplayedMap = "Shoots";
				$FavMapIcon = "https://vignette2.wikia.nocookie.net/cswikia/images/5/5d/Ar_shoots.png/revision/latest/scale-to-width-down/250?cb=20140819094937";
				break;

			case 'total_rounds_map_ar_baggage':
				$MostplayedMap = "Baggage";
				$FavMapIcon = "https://vignette2.wikia.nocookie.net/cswikia/images/c/c4/Ar_baggage.png/revision/latest/scale-to-width-down/250?cb=20140819012337";
				break;

			case 'total_rounds_map_ar_monastery':
				$MostplayedMap = "Monastery";
				$FavMapIcon = "https://vignette4.wikia.nocookie.net/cswikia/images/e/e1/Ar_monastery.png/revision/latest/scale-to-width-down/250?cb=20140819030928";
				break;

			case 'total_rounds_map_de_vertigo':
				$MostplayedMap = "Vertigo";
				$FavMapIcon = "https://vignette3.wikia.nocookie.net/cswikia/images/d/df/Csgo-de-vertigo.png/revision/latest/scale-to-width-down/250?cb=20140820125311";
				break;
		
		default:
			
			break;
	}

	switch ($MostPlayedGun) {
		case 'total_kills_knife':
			$FavGun = "Knife";
			$FavGunIcon = "http://vignette2.wikia.nocookie.net/cswikia/images/4/4b/Knife_ct_hud_outline_csgo.png/revision/latest/scale-to-width-down/400";
			break;

		case 'total_kills_taser':
			$FavGun = "Zeus x27";
			$FavGunIcon = "";
			break;
			
		case 'total_kills_molotov':
			$FavGun = "Molotov";
			$FavGunIcon = "http://vignette3.wikia.nocookie.net/cswikia/images/f/fc/Molotov_hud_csgo.png/revision/latest/scale-to-width-down/400";
			break;
			
		case 'total_kills_galilar':
			$FavGun = "Galil AR";
			$FavGunIcon = "http://vignette1.wikia.nocookie.net/cswikia/images/4/4a/Galilar_hud.png/revision/latest/scale-to-width-down/400";
			break;
			
		case 'total_kills_m4a1':
			$FavGun = "M4A1";
			$FavGunIcon = "http://vignette2.wikia.nocookie.net/cswikia/images/d/d9/M4a4_hud.png/revision/latest/scale-to-width-down/400";
			break;
			
		case 'total_kills_mag7':
			$FavGun = "SWAG-7";
			$FavGunIcon = "http://vignette2.wikia.nocookie.net/cswikia/images/2/2e/Mag7_hud_csgo.png/revision/latest/scale-to-width-down/400";
			break;
			
		case 'total_kills_tec9':
			$FavGun = "Tec-9";
			$FavGunIcon = "http://vignette3.wikia.nocookie.net/cswikia/images/5/55/Tec9_hud_csgo.png/revision/latest/scale-to-width-down/400";
			break;
			
		case 'total_kills_bizon':
			$FavGun = "PP-Boizan";
			$FavGunIcon = "http://vignette1.wikia.nocookie.net/cswikia/images/d/d5/Bizon_hud_csgo.png/revision/latest/scale-to-width-down/400";
			break;
			
		case 'total_kills_sawedoff':
			$FavGun = "Sawed-Off";
			$FavGunIcon = "http://vignette1.wikia.nocookie.net/cswikia/images/9/94/Sawedoff_hud_csgo.png/revision/latest/scale-to-width-down/400";
			break;
			
		case 'total_kills_negev':
			$FavGun = "Negev";
			$FavGunIcon = "http://vignette2.wikia.nocookie.net/cswikia/images/b/be/Negev_hud.png/revision/latest/scale-to-width-down/400";
			break;
			
		case 'total_kills_nova':
			$FavGun = "Nova";
			$FavGunIcon = "http://vignette4.wikia.nocookie.net/cswikia/images/c/c8/Nova_hud_csgo.png/revision/latest/scale-to-width-down/400";
			break;
			
		case 'total_kills_mp9':
			$FavGun = "MP9";
			$FavGunIcon = "http://vignette2.wikia.nocookie.net/cswikia/images/1/14/Mp9_hud_csgo.png/revision/latest/scale-to-width-down/400";
			break;
			
		case 'total_kills_mp7':
			$FavGun = "MP7";
			$FavGunIcon = "http://vignette4.wikia.nocookie.net/cswikia/images/8/8d/Mp7_hud_csgo.png/revision/latest/scale-to-width-down/400";
			break;
			
		case 'total_kills_ssg08':
			$FavGun = "SSG 08";
			$FavGunIcon = "http://vignette4.wikia.nocookie.net/cswikia/images/3/3c/Ssg08_hud_csgo.png/revision/latest/scale-to-width-down/400";
			break;
			
		case 'total_kills_scar20':
			$FavGun = "SCAR-20";
			$FavGunIcon = "http://vignette4.wikia.nocookie.net/cswikia/images/c/c9/Scar20_hud_csgo.png/revision/latest/scale-to-width-down/400";
			break;
			
		case 'total_kills_sg556':
			$FavGun = "SG 553";
			$FavGunIcon = "http://vignette1.wikia.nocookie.net/cswikia/images/9/9b/Sg556_hud_csgo.png/revision/latest/scale-to-width-down/400";
			break;
			
		case 'total_kills_p250':
			$FavGun = "P250";
			$FavGunIcon = "http://vignette2.wikia.nocookie.net/cswikia/images/5/57/P250_hud.png/revision/latest/scale-to-width-down/400";
			break;
			
		case 'total_kills_hkp2000':
			$FavGun = "P2000";
			$FavGunIcon = "http://vignette1.wikia.nocookie.net/cswikia/images/6/67/Hkp2000_hud.png/revision/latest/scale-to-width-down/400";
			break;
			
		case 'total_kills_m249':
			$FavGun = "The Missclick";
			$FavGunIcon = "http://vignette2.wikia.nocookie.net/cswikia/images/e/ea/M249_hud_csgo.png/revision/latest/scale-to-width-down/400";
			break;
			
		case 'total_kills_g3sg1':
			$FavGun = "G3SG1";
			$FavGunIcon = "http://vignette4.wikia.nocookie.net/cswikia/images/4/4a/G3sg1_hud_csgo.png/revision/latest/scale-to-width-down/400";
			break;
			
		case 'total_kills_famas':
			$FavGun = "Famas";
			$FavGunIcon = "http://vignette2.wikia.nocookie.net/cswikia/images/8/8f/Famas_hud_csgo.png/revision/latest/scale-to-width-down/400";
			break;

		case 'total_kills_aug':
			$FavGun = "AUG";
			$FavGunIcon = "http://vignette2.wikia.nocookie.net/cswikia/images/6/6f/Aug_hud_csgo.png/revision/latest/scale-to-width-down/400";
			break;
			
		case 'total_kills_ak47':
			$FavGun = "AK-47";
			$FavGunIcon = "http://vignette1.wikia.nocookie.net/cswikia/images/7/76/Ak47_hud_csgo.png/revision/latest/scale-to-width-down/400";
			break;
			
		case 'total_kills_awp':
			$FavGun = "AWP";
			$FavGunIcon = "http://vignette3.wikia.nocookie.net/cswikia/images/e/eb/Awp_hud_csgo.png/revision/latest/scale-to-width-down/400";
			break;
			
		case 'total_kills_p90':
			$FavGun = "PRO90";
			$FavGunIcon = "http://vignette3.wikia.nocookie.net/cswikia/images/b/bd/P90_hud_csgo.png/revision/latest/scale-to-width-down/400";
			break;

		case 'total_kills_ump45':
			$FavGun = "UMP-45";
			$FavGunIcon = "http://vignette3.wikia.nocookie.net/cswikia/images/c/c4/Ump45_hud_csgo.png/revision/latest/scale-to-width-down/400";
			break;
			
		case 'total_kills_mac10':
			$FavGun = "MAC-10";
			$FavGunIcon = "http://vignette2.wikia.nocookie.net/cswikia/images/f/f7/Mac10_hud_csgo.png/revision/latest/scale-to-width-down/400";
			break;
			
		case 'total_kills_xm1014':
			$FavGun = "XM1024";
			$FavGunIcon = "http://vignette2.wikia.nocookie.net/cswikia/images/a/ad/Xm1014_hud_csgo.png/revision/latest/scale-to-width-down/400";
			break;
			
		case 'total_kills_fiveseven':
			$FavGun = "Five-SeveN";
			$FavGunIcon = "http://vignette2.wikia.nocookie.net/cswikia/images/9/9c/Fiveseven_hud_csgo.png/revision/latest/scale-to-width-down/400";
			break;
			
		case 'total_kills_deagle':
			$FavGun = "Desert Eagle";
			$FavGunIcon = "http://vignette2.wikia.nocookie.net/cswikia/images/7/7d/Deagle_hud_go.png/revision/latest/scale-to-width-down/400";
			break;
			
		case 'total_kills_glock':
			$FavGun = "Glock-18";
			$FavGunIcon = "http://vignette2.wikia.nocookie.net/cswikia/images/3/33/Glock18_hud_csgo.png/revision/latest/scale-to-width-down/400";
			break;

		case 'total_kills_hegrenade':
			$FavGun = "HE Grenade";
			$FavGunIcon = "http://vignette1.wikia.nocookie.net/cswikia/images/6/60/Ammo_hegrenade_css.png/revision/latest/scale-to-width-down/400";
			break;
			
		default:
			# code...
			break;
		}
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
	        <div class="loggedinstats-index">

	        	<ul class="nav">
					<li class="button-dropdown">
						<a href="javascript:void(0)" class="dropdown-toggle"><?php echo $steamprofile['personaname']; ?> <img src="<?php echo $steamprofile['avatar']; ?>"></a>
						<ul class="dropdown-menu">
							<li>
								<?php 
					        		if ($steamprofile['steamid'] == '76561198312027283' || '76561198344278706')
					        		{
					        			echo '<a href="http://localhost:8081" target="_blank">GSI</a>';
									}
					        	?>

							</li>
							<li>
								<a href="protect.php" onclick="myAjaxStats()">Logout</a>
							</li>
							<li>
								<a href="index.php?$id=2">My Stats</a>
							</li>
						</ul>
					</li>
				</ul>
	        	
	        </div>
        </form>
    </div>
    
    <div class="stats-Container">
    <?php if (!isset($decodedS->response->players[0]->personaname)) {
    	echo "<label id='StatsOffNameL' style='font-size: 60px; color: #008aff;  text-shadow: -1px 0 black, 0 1px black, 1px 0 black, 0 -1px black;'>player is not set</label>";
	} 

	else
		{?>
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

    	<div id="statsFavThingsContainer">
	    	<div id="stats-maps">
	    		<h1>Favorite Map</h1>

	    		<div id="stats-maps-mostPlayed">
	    			<img src="<?php echo $FavMapIcon; ?>">
	    		</div>

	    		<div id="stats-maps-index">
	    			<table>

						<tr>
							<td><?php echo $MostplayedMap;?>  </td>
						</tr>
		
	    			</table>
	    		</div>
	    		
	    	</div>

	    	<div id="stats-guns">
	    		<h1>Favorite Gun</h1>

	    		<div id="stats-maps-mostPlayed">
	    			<img src="<?php echo $FavGunIcon; ?>">
	    		</div>

	    		<div id="stats-maps-index">
	    			<table>

		    			<tr>
		    				<td><?php echo $FavGun; ?></td>
		    			</tr>
	    			
	    			</table>
	    		</div>
	    	</div>
	    </div>
    </div>
    <?php } ?>
<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
<script type="text/javascript" src="../js/main.js"></script>
</div>
	<div class="footer">
		<!-- left copyright right made by -->
		<label class="copyright-footer">Copyright 2017 &copy; CSHUB</label>
		<label class="madeby-footer">Made by: Niels v. Laarhoven</label>
	</div>
</body>
</html>