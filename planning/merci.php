<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>

<?php
$servername="localhost";
$username="root";
$password="";
$dbname="stagepme";
$strcch="mysql:host=$servername;
dbname=$dbname";


try {
$con=new PDO($strcch,$username,$password);

$req="insert into utilisateur (identifiant,motdepasse,nom,prenom,telephone,daten,salaire,nombreheure,score,adresse,type) values ('$_POST[username]','$_POST[password]','$_POST[nom]','$_POST[prenom]','$_POST[telephone]','$_POST[daten]','$_POST[salaire]','$_POST[nbr]','$_POST[score]','$_POST[adresse]','$_POST[type]')";
$con->exec($req);
}
catch (PDOException $e)
{echo $e->Get_Message();}

?>
<head>

<!--META-->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Login Form</title>

<!--STYLESHEETS-->
<link href="css/style.css" rel="stylesheet" type="text/css" />

<!--SCRIPTS-->
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.2.6/jquery.min.js"></script>
<!--Slider-in icons-->
<script type="text/javascript">
$(document).ready(function() {
	$(".username").focus(function() {
		$(".user-icon").css("left","-48px");
	});
	$(".username").blur(function() {
		$(".user-icon").css("left","0px");
	});
	
	$(".password").focus(function() {
		$(".pass-icon").css("left","-48px");
	});
	$(".password").blur(function() {
		$(".pass-icon").css("left","0px");
	});
});
</script>

</head>
<body>

<!--WRAPPER-->
<div id="wrapper">

	<!--SLIDE-IN ICONS-->
    <div class="user-icon"></div>
    <div class="pass-icon"></div>
    <!--END SLIDE-IN ICONS-->

<!--LOGIN FORM-->
<form name="login-form" class="login-form" action="index.html" method="post">

	<!--HEADER-->
    <div class="header">
    <!--TITLE--><h1>Bienvenue au Section d'ajout de notre entreprise </h1><!--END TITLE-->
    <!--DESCRIPTION--><span>Les Donnees du nouveau utilisateur sont ajouteés avec succes .</span><!--END DESCRIPTION-->
    </div>
  
    
    <!--FOOTER-->
    <div class="footer">
    <!--LOGIN BUTTON--><input type="submit" name="submit" value="S'Identifier" class="button" /><!--END LOGIN BUTTON-->
    
    </div>
    <!--END FOOTER-->

</form>
<!--END LOGIN FORM-->

</div>
<!--END WRAPPER-->

<!--GRADIENT--><div class="gradient"></div><!--END GRADIENT-->

</body>
</html>