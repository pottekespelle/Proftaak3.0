<!DOCTYPE html>
<html>
<head>
	<title>Proftaak</title>
	<link rel="stylesheet" type="text/css" href="http://meyerweb.com/eric/tools/css/reset/reset.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>

<body>
<div>
	<div class="header">
		<form method="post">
        <a href="index.php"><img type="submit" name="destroy" src="img/logo.png" class="logo"></a>
        

        </form>
        <label class="login">
	        <?php
				loginbutton();
			?>	
		</label>
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
				<input type="text" class="input"  name="steamid64Input" />
			</form>
		</div>
	</div>
</div>

<div class="footer">
	<label class="copyright-footer">Copyright 2017 &copy; CSHUB</label>
	<label class="madeby-footer">Made by: Niels v. Laarhoven</label>
</div>

<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
<script type="text/javascript" src="js/main.js"></script>

</body>
</html>