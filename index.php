<?php 
?>

<!DOCTYPE html>

<html>

<head>

	<title>Proftaak</title>

	<link rel="stylesheet" type="text/css" href="http://meyerweb.com/eric/tools/css/reset/reset.css">

	<link rel="stylesheet" type="text/css" href="css/style.css">

	<script type="text/javascript" src="js/main.js"></script>

</head>

<body>

<div>

	<div class="header">
		<form method="post">
        <a href="protect.php"><img type="submit" name="destroy" src="img/logo.png" class="logo"></a>

        <div class="loggedinstats-index">
        	<label> <?php echo $steamprofile['personaname']; ?> </label>
        	<img src="<?php echo $steamprofile['avatar']; ?>">

        	<?php 
        		if ($steamprofile['steamid'] == '76561198312027283'){
        			?><a href="gsi/index.php">naar de gsi pagina</a>
        			<?php
        		}
        	?>
        </div>

        <label class="login">
	        <?php
				logoutbutton();
			?>	
		</label>

        </form>

    </div>



	<div class="home-content">

    	<h2>CSHUB</h2>

    	<p>Gag ipsum dolar sit amet read pokeman all the things no grey drink lose. Russia easter bra like a boss mom no bad female morbi. Genius really? People jackie chan pizza pikachu 9000 nap bart cat good guy i dont get it. Top party sit viverra clinton vegan bear iron man loki. Superhero in class bacon in cereal guy troll hehexd laptop tank thor cuteness overload collection. Happy left luke blizzard cellphone hac yao rainbow a feel like a sir. Not bad humor note amnesia mother le girlfriend derp movie right why angry birds. Money close enough high school ipsum facebook cool brother win le derp y u no.</p>

    </div>

	<div class="wrapper">

		<div class="form-input">
			<form method="post" action="stats/index.php">
				<label class="icon glyphicon glyphicon-pencil"></label>

				<button type="submit" id="convert" class="button glyphicon glyphicon-search" name="SteamIdInputButton"></button>
<!-- 
				<input type="submit" id="convert" name="SteamIdInputButton" class="input glyphicon glyphicon-search"> -->

				<input type="text" class="input"  name="steamid64Input" />
			</form>
		</div>

	</div>

</div>

	<div class="footer">

		<label class="copyright-footer">Copyright 2017 &copy; CSHUB</label>

		<label class="madeby-footer">Made by: Niels v. Laarhoven &amp; Quinten Vis</label>

	</div>
</body>

</html>